<?php

namespace App\View\Livewire\User\Onboarding;

use App\Notifications\Onboarding\Completed;
use App\Notifications\Onboarding\Skipped;
use App\Traits\WithSteps;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Http\Controllers\Attachments\AttachmentUploadController as Upload;
use App\Models\Admin;
use App\Models\Attachment;
use App\Models\User;
use App\Rules\CheckNIN;
use Illuminate\Support\Facades\Storage;

class Main extends Component
{
    use WithSteps, WithFileUploads;

    public $user;
    public $photo = [];
    public $nin = [];
    public $internationalPassport = [];
    public $driversLicense = [];
    public $proofOfAddress = [];
    public $files = [];
    /**
     * Determine if the verification email was sent.
     *
     * @var bool
     */
    public $verificationLinkSent = false;


    public function mount()
    {
        $this->user = getUser();
        $this->defineStoreData();
        $this->defineSteps();
        $this->defineStore();
        $this->checkSteps();

        // Load file details from the JSON file
        $this->files = $this->getStoredData()['files'] ?? null;
        $this->photo['file'] = $this->files['photo'] ?? null;
        $this->nin['file'] = $this->files['nin'] ?? null;
        $this->internationalPassport['file'] = $this->files['passport'] ?? null;
        $this->driversLicense['file'] = $this->files['drivers_license'] ?? null;
        $this->proofOfAddress['file'] = $this->files['proof_of_address'] ?? null;
    }

    public function defineStoreData()
    {
        // $this->storeData['phone'] = (array) $this->user->phone;
        $this->storeData['date_of_birth'] = $this->user->date_of_birth;
        $this->storeData['gender'] = $this->user->gender;
        // $this->storeData['address'] = (array) $this->user->address; causes error This synth doesn't support unsetting properties: Livewire\Mechanisms\HandleComponents\Synthesizers\StdClassSynth
        $this->storeData['social'] = (array) $this->user->social;
        $this->storeData['nin'] = $this->user->nin;
        $this->storeData['drive'] = false;
        $this->storeData['role'] = $this->user->role;
        $this->storeData['status'] = $this->user->status;
    }

    /**
     * Define the steps for the onboarding process.
     *
     * @return void
     */
    public function defineSteps()
    {
        $this->stepNames = [
            0 => 'Introduction',
            1 => 'Your Goal',
            2 => 'Personal Details',
            3 => 'Verification',
            4 => 'KYC',
            5 => 'Review and Submit',
        ];
        $this->totalSteps = count($this->stepNames) - 1;
    }

    /**
     * Define the storage path and load stored data for the onboarding process.
     *
     * @return void
     */
    public function defineStore()
    {
        $this->storePath = getUserStorage('private') . "/data/onboarding.json";
        $this->storeData = $this->getStoredData() ?? $this->storeData;
        $this->currentStep = $this->storeData['current_step'] ?? 0;
    }

    /**
     * Check and update the current step based on the user's role.
     *
     * @return void
     */
    public function checkSteps()
    {

        if ($this->user->role !== 'subscriber' && ($this->currentStep == 0 || $this->currentStep == 1)) {
            if (!isset($this->storeData['role'])) {
                $this->storeData['role'] = $this->user->role;
            }
            $this->currentStep = 2;
        }
    }
    /**
     * Generate validation rules, messages, and attribute names for the current onboarding step.
     *
     * This function defines the validation rules, custom messages, and attribute names
     * for each step of the onboarding process based on the current step.
     *
     * @param array $rules An array to hold validation rules for the current step.
     * @param array $messages An array to hold custom validation messages for the current step.
     * @param array $names An array to hold custom attribute names for the current step.
     * @param bool $validate A flag indicating whether to perform validation (default is true).
     * @return array An associative array containing 'rules', 'messages', and 'names' for the current step.
     */
    protected function rulesForStep($rules = [], $messages = [], $names = [], $validate = true): array
    {
        $rules = [];
        $names = [];
        $messages = [];

        switch ($this->currentStep) {
            case 0:
                // Validation rules for step 0
                break;
            case 1:
                $rules = [
                    'storeData.role' => 'required|string|exists:roles,name,guard,web',
                ];
                $messages = [
                    'storeData.role.required' => 'Please select a goal.',
                    'storeData.role.string' => 'The selected goal is invalid.',
                    'storeData.role.exists' => 'The selected goal does not exist.',
                ];
                $names = [
                    'storeData.role' => 'Role',
                ];

                break;
            case 2:
                $rules = [
                    'storeData.phone.*.country_code' => 'required|string|regex:/^\+\d+$/',
                    'storeData.phone.*.number' => 'required|digits_between:4,11',
                    'storeData.date_of_birth' => [
                        'required',
                        'string',
                        'date_format:m/d/Y',
                    ],
                    'storeData.gender' => 'required|string|in:male,female',

                    'storeData.address.*.full' => [
                        'required',
                        'string',
                        function ($attribute, $value, $fail) {
                            // Custom validation logic to check if the location exists using Google Maps API
                            $response = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($value) . "&key=" . getGoogleMapKey());
                            $response = json_decode($response, true);

                            if (empty($response['results'])) {
                                $fail('The ' . $attribute . ' is not a valid location.');
                            }
                        },
                    ],
                    'storeData.social.*' => [
                        'required',
                        'url',
                        function ($attribute, $value, $fail) {
                            $patterns = [
                                'instagram' => '/^https:\/\/(www\.)?instagram\.com\/[A-Za-z0-9._%+-]+$/',
                                'facebook' => '/^https:\/\/(www\.)?facebook\.com\/[A-Za-z0-9._%+-]+$/',
                                // 'linkedin' => '/^https:\/\/(www\.)?linkedin\.com\/in\/[A-Za-z0-9._%+-]+$/',
                                // Add more patterns for other social media platforms if needed
                            ];

                            foreach ($patterns as $platform => $pattern) {
                                if (strpos($attribute, $platform) !== false && !preg_match($pattern, $value)) {
                                    $fail("The {$platform} URL is not valid.");
                                }
                            }
                        },
                    ],
                ];

                $messages = [
                    'storeData.phone.*.country_code.required' => 'Please enter the country code for the phone number.',
                    'storeData.phone.*.number.required' => 'Please enter the phone number.',
                    'storeData.phone.*.number.numeric' => 'The phone number must be a numeric value.',
                    //
                    'storeData.date_of_birth.required' => 'Please enter your date of birth.',
                    'storeData.date_of_birth.string' => 'The date of birth must be in the format MM/DD/YYYY.',
                    //
                    'storeData.gender.required' => 'Please select your gender.',
                    'storeData.gender.string' => 'The selected gender is invalid.',
                    'storeData.gender.in' => 'The selected gender is invalid.',
                    'storeData.address.*.full.required' => 'Please enter the location.',
                    'storeData.address.*.full.string' => 'The location must be a valid address.',
                    'storeData.address.*.full.exists' => 'The location does not exist.',
                ];

                $names = [
                    'storeData.phone.*' => 'Phone Number',
                    'storeData.date_of_birth' => 'Date of Birth',
                    'storeData.gender' => 'Gender',
                    'storeData.address.*' => 'Location',
                ];

                break;

            case 3:
                // Validation rules for step 3
                $rules = [];

                $names = [];
                break;
            case 4:
                // Validation rules for step 4 (KYC)
                $rules = [
                    'storeData.nin' => [
                        'required',
                        'digits_between:9,13',
                        new CheckNIN($this->storeData['nin']),
                    ],
                    'nin.file.path' => [
                        'required',
                        'string',
                        function ($attribute, $value, $fail) {
                            $filePath = storage_path('app/public/' . $value);
                            if (!file_exists($filePath) || !getimagesize($filePath)) {
                                $fail('The file at ' . $value . ' is not a valid image in the tmp directory.');
                            }
                        },
                    ],
                    'internationalPassport.file.path' => [
                        'required',
                        'string',
                        function ($attribute, $value, $fail) {
                            $filePath = storage_path('app/public/' . $value);
                            if (!file_exists($filePath) || !getimagesize($filePath)) {
                                $fail('The file at ' . $value . ' is not a valid image in the tmp directory.');
                            }
                        },
                    ],
                    'proofOfAddress.file.path' => [
                        'required',
                        'string',
                        function ($attribute, $value, $fail) {
                            $filePath = storage_path('app/public/' . $value);
                            if (!file_exists($filePath) || !getimagesize($filePath)) {
                                $fail('The file at ' . $value . ' is not a valid image in the tmp directory.');
                            }
                        },
                    ],
                    'driversLicense.file.path' => [
                        'required',
                        'string',
                        function ($attribute, $value, $fail) {
                            $filePath = storage_path('app/public/' . $value);
                            if (!file_exists($filePath) || !getimagesize($filePath)) {
                                $fail('The file at ' . $value . ' is not a valid image in the tmp directory.');
                            }
                        },
                    ],

                ];

                $messages = [
                    'driversLicense.file.path.required' => 'Please upload your Driver\'s License.',
                    'proofOfAddress.file.path.required' => 'Please upload your Proof of Address.',
                    'passport.file.path.required' => 'Please upload your International Passport.',
                    'nin.file.path.required' => 'Please upload your NIN document.',
                    'nin.required' => 'Please enter your National Identification Number (NIN).',
                    'nin.digits_between' => 'The National Identification Number (NIN) must be between 9 and 13 digits.',
                ];
                
                $names = [
                    'storeData.nin' => 'National Identification Number (NIN)',
                    'nin.file.path' => 'NIN Document',
                    'internationalPassport.file.path' => 'International Passport',
                    'proofOfAddress.file.path' => 'Proof of Address',
                    'driversLicense.file.path' => 'Driver\'s License',
                ];
                break;
            default:
                break;
        }

        return ['rules' => $rules, 'messages' => $messages, 'names' => $names];
    }


    /**
     * Handle the upload and validation of the photo file.
     *
     * @return void
     */
    public function updatedPhoto()
    {
        // Validate the file
        $this->validate(
            ['photo.new' => 'required|image|max:1024',],
            [],
            ['photo.new' => 'profile photo']
        );

        $path = $this->photo['file']['path'] ?? null;
        $new = $this->photo['new'] ?? null;

        // Optionally reset file input        
        $this->reset('photo');
        $this->photo['new'] = [];

        // Reinitialize the photo
        $this->photo['file'] = $this->uploadFile('photo', $new, $path);
    }

    /**
     * Handle the upload and validation of the National Identification Number (NIN) file.
     *
     * @return void
     */
    public function updatedNin()
    {
        // Validate the file
        $this->validate(
            ['nin.new' => 'required|file|max:1024'],
            [],
            ['nin.new' => 'NIN']
        );

        $path = $this->nin['file']['path'] ?? null;
        $new = $this->nin['new'] ?? null;

        // Optionally reset file input
        $this->reset('nin');
        $this->nin['new'] = [];

        // Reinitialize the NIN
        $this->nin['file'] = $this->uploadFile('nin', $new, $path);
    }

    /**
     * Handle the upload and validation of the international passport file.
     *
     * @return void
     */
    public function updatedInternationalPassport()
    {
        // Validate the file
        $this->validate(
            ['internationalPassport.new' => 'required|file|max:1024'],
            [],
            ['internationalPassport.new' => 'International Passport']
        );

        $path = $this->internationalPassport['file']['path'] ?? null;
        $new = $this->internationalPassport['new'] ?? null;

        // Optionally reset file input
        $this->reset('internationalPassport');
        $this->internationalPassport['new'] = [];

        // Reinitialize the International Passport
        $this->internationalPassport['file'] = $this->uploadFile('passport', $new, $path);
    }

    /**
     * Handle the upload and validation of the driver's license file.
     *
     * @return void
     */
    public function updatedDriversLicense()
    {
        // Validate the file
        $this->validate(
            ['driversLicense.new' => 'required|file|max:1024'],
            [],
            ['driversLicense.new' => 'Drivers License']
        );

        $path = $this->driversLicense['file']['path'] ?? null;
        $new = $this->driversLicense['new'] ?? null;

        // Optionally reset file input
        $this->reset('driversLicense');
        $this->driversLicense['new'] = [];

        // Reinitialize the Driver's License
        $this->driversLicense['file'] = $this->uploadFile('drivers_license', $new, $path);
    }

    /**
     * Handle the upload and validation of the proof of address file.
     *
     * @return void
     */
    public function updatedProofOfAddress()
    {
        // Validate the file
        $this->validate(
            ['proofOfAddress.new' => 'required|file|max:1024'],
            [],
            ['proofOfAddress.new' => 'Proof Of Address']
        );

        $path = $this->proofOfAddress['file']['path'] ?? null;
        $new = $this->proofOfAddress['new'] ?? null;

        // Optionally reset file input
        $this->reset('proofOfAddress');
        $this->proofOfAddress['new'] = [];

        // Reinitialize the Proof of Address
        $this->proofOfAddress['file'] = $this->uploadFile('proof_of_address', $new, $path);
    }

    /**
     * Upload a file, handling the deletion of any existing file in storage.
     *
     * @param string $key The key to identify the file (e.g., 'photo', 'nin').
     * @param \Illuminate\Http\UploadedFile $file The new file being uploaded.
     * @param string|null $filePath The path to the existing file, if any.
     * @return array The details of the uploaded file.
     */
    public function uploadFile($key, $file, $filePath)
    {
        // Check if there's an existing file and delete it
        if ($filePath && Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
        }

        // Save the uploaded file and get the file path
        $filePath = $file->store("tmp", 'public');

        if (!isset($this->storeData['files'][$key])) {
            $this->storeData['files'][$key] = [];
        }

        // Save file details to the JSON file
        $this->storeData['files'][$key] = [
            'path' => $filePath,
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
        ];


        $this->deleteFile($file);

        Storage::put($this->storePath, json_encode($this->storeData));

        return $this->storeData['files'][$key];
    }

    /**
     * Save the uploaded files associated with the user.
     *
     * @return void
     */
    protected function saveFiles(User|Admin $user)
    {
        if (isset($this->photo['file']['path'])) {
            $image = Storage::path('public/' . $this->photo['file']['path']);
            $mime_type = $this->photo['file']['mime_type'];
            $profilePath = getUserStorage() . 'profile/photo.webp';
            $photoName = $this->getDocName('photo');
            $photoDesc = $user->name . '\'s ' . $photoName;

            // Save the photo to the storage, update the user profile photo and attach it with the user Via attachable
             Upload::file(
                name: $photoName,
                description: $photoDesc,
                file: $image,
                mimeType: $mime_type,
                is_featured: false,
                quality: 90,
                authorable: $user,
                attachable: $user,
                path: $profilePath,
            );
            $user->profile_photo_path = getUserStorage('') . 'profile/photo.webp';
            
            // Delete the uploaded photo after saving it to the storage
            Storage::delete('public/' . $this->photo['file']['path']);
            $this->storeData['files']['photo'] = [];
        }

        foreach ( $this->getStoredData()['files'] as $key => $file) {
            // Save uploaded files to the storage and attach them with the user Via attachable
            if ($key !== 'photo' && isset($file['path'])) {
                $storagePath = getUserStorage('private', $this->user->id) . 'documents/';
                $document = Storage::path('public/' . $file['path']);
                $mime_type = $file['mime_type'];
                $path = str_contains($mime_type, 'image') ? $storagePath . $key . '.webp' : $storagePath . $key . '.pdf';
                $docName = $this->getDocName($key);
                $docDesc = $user->name . '\'s ' . $docName;

                // Save the document to the storage and attach it with the user Via attachable
                Upload::file(
                    name: $docName,
                    description: $docDesc,
                    file: $document,
                    mimeType: $mime_type,
                    is_featured: true,
                    quality: 90,
                    authorable: $user,
                    attachable: $user,
                    path: $path,
                );

                // Delete the uploaded file after saving it to the storage
                Storage::delete('public/' . $file['path']);
                $this->storeData['files'][$key] = [];
            }
        }
    }

    /**
     * Get the document name based on the document type.
     *
     * @param string $docType The type of the document.
     * @return string The name of the document.
     */
    protected function getDocName(string $docType): string
    {
        $documentNames = [
            'photo' => 'Profile Picture',
            'nin' => 'National Identification Number',
            'passport' => 'International Passport',
            'drivers_license' => 'Driver\'s License',
            'proof_of_address' => 'Proof of Address',
            // Add more document types and their corresponding names as needed
        ];

        return $documentNames[$docType] ?? 'Unknown Document';
    }


    /**
     * Sent the email verification.
     *
     * @return void
     */
    public function sendEmailVerification()
    {
        getUser()->sendEmailVerificationNotification();

        $this->verificationLinkSent = true;
    }

    /**
     * Submit the onboarding form and save the uploaded files.
     *
     * @return void
     */
    public function submit()
    {
        // Save any necessary data to the database
        $user = $this->user;
        $user->role = $this->storeData['role'];
        // Update the details attribute using the updateDetails method
        $user->updateDetails('phone', $this->storeData['phone']);
        $user->updateDetails('date_of_birth', $this->storeData['date_of_birth']);
        $user->updateDetails('gender', $this->storeData['gender']);
        $user->updateDetails('address', $this->storeData['address']);
        $user->updateDetails('social', $this->storeData['social']);
        $user->updateDetails('nin', $this->storeData['nin']);
        $user->updateDetails('self_drive', $this->storeData['drive']);
        $this->saveFiles($user);
        $user->save();
        //delete the onboarding json file after saving the data
        $this->putData('');
        $this->completeOnboarding();
    }

    /**
     * Complete the onboarding process.
     * 
     * @return \Illuminate\Http\RedirectResponse Redirects to the user dashboard with a completion message.
     */
    #[On('onboarding-completed')]
    public function completeOnboarding()
    {
        // Update the onboarding data.
        $this->user->updateOnboarding([
            'status' => 'completed',
            'step' => $this->currentStep,
            'restart_at' => null,
            'completed_at' => now(),
        ]);

        $this->user->notify(new Completed());
        // Redirect to the user dashboard after completing the onboarding process
        return redirect()->route('user.dashboard')->with('message', 'You have completed the onboarding process. You have been updated to ' . ucfirst($this->user->role) . '.');
    }

    /**
     * Skip the onboarding process.
     * 
     * @return \Illuminate\Http\RedirectResponse Redirects to the user dashboard with a skip message.
     */
    #[On('onboarding-skip')]
    public function skipOnboarding()
    {
        // Increment the skip count
        $skipCount = $this->user->onboarding->skip_count ?? 0;
        $skipCount++;

        // Redirect to the user dashboard after skipping the onboarding process
        if ($skipCount <= 3) {
            redirect()->route('user.dashboard')->with('info', 'You have skipped the onboarding process ' . ($skipCount <= 1 ? '' : $skipCount . ' times') . '.');
            // Check if the user's onboarding status is already 'skipped'
            if ($this->user->onboarding->status !== 'skipped') {

                // Update the user's onboarding status and skip count
                $this->user->updateOnboarding([
                    'status' => 'skipped',
                    'step' => $this->currentStep,
                    'restart_at' => now()->addDays(2),
                    'completed_at' => null,
                    'skip_count' => $skipCount,
                ]);

                // Notify the user about the skipped onboarding process
                $this->user->notify(new Skipped());
            }
        } else {
            // set notice saying you cannot skip the onboarding process any more
            $this->dispatch('notify', 'You cannot skip the Onboarding process anymore', 'warning');
        }
    }

    /**
     * Render the onboarding layout view.
     *
     * @return \Illuminate\View\View The view to render.
     */
    public function render()
    {
        return view(
            'user.onboarding.main',
            [
                'prevStepName' => $this->getPrevStepName(),
                'nextStepName' => $this->getNextStepName(),
                'currentStepName' => $this->getStepName($this->currentStep),
                'currentStep' => $this->updateCurrentStep(),
                'nextPrefix' => 'next-',
                'prevPrefix' => 'prev-',
                'countries' => getSortedCountries(),
                'userCountryCode' => 'NG' // Fetch the user's country code
            ]
        );
    }
}
