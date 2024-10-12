<?php

namespace App\View\Livewire\User;

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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Onboarding extends Component
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
        $this->defineSteps();
        $this->defineStore();
        $this->defineStoreData();
        $this->checkSteps();

        // Load file details from the JSON file
        $this->files = $this->getStoredData()['files'] ?? null;
        $this->photo['file'] = $this->files['photo'] ?? null;
        $this->nin['file'] = $this->files['nin'] ?? null;
        $this->internationalPassport['file'] = $this->files['passport'] ?? null;
        $this->driversLicense['file'] = $this->files['drivers_license'] ?? null;
        $this->proofOfAddress['file'] = $this->files['proof_of_address'] ?? null;
    }

    /**
     * Populate the storeData array with user information if not already set.
     *
     * This method checks various user attributes such as phone numbers, date of birth,
     * gender, address, social media links, and identification numbers. If these attributes
     * are not already present in the storeData array, they are populated from the user's
     * existing data.
     *
     * @return void
     */
    public function defineStoreData()
    {
        if (empty($this->storeData['phone']['work']) && !empty($this->user->phone->work->number) && !empty($this->user->phone->work->country_code)) {
            $this->storeData['phone']['work'] = (array) $this->user->phone->work;
        }
        if (empty($this->storeData['phone']['home']) && !empty($this->user->phone->home->number) && !empty($this->user->phone->home->country_code)) {
            $this->storeData['phone']['home'] = (array) $this->user->phone->home;
        }

        if (empty($this->storeData['date_of_birth']) && !empty($this->user->date_of_birth)) {
            $this->storeData['date_of_birth'] = $this->user->date_of_birth;
        }
        if (empty($this->storeData['gender']) && !empty($this->user->gender)) {
            $this->storeData['gender'] = $this->user->gender;
        }
        if (empty($this->storeData['address']['home']['full']) && !empty($this->user->address->home->full)) {
            $this->storeData['address']['home'] = (array) $this->user->address->home;
        }
        if (empty($this->storeData['social'])) {
            $this->storeData['social'] = (array) $this->user->social;
        }
        if (empty($this->storeData['nin'])) {
            $this->storeData['nin'] = $this->user->nin;
        }
        if (empty($this->storeData['drive'])) {
            $this->storeData['drive'] = false;
        }
        if (empty($this->storeData['role'])) {
            $this->storeData['role'] = $this->user->role;
        }
        if (empty($this->storeData['status'])) {
            $this->storeData['status'] = $this->user->status;
        }

        // Check and update address details
        $addressKeys = ['full', 'country', 'state', 'city', 'street', 'postal_code', 'unit', 'longitude', 'latitude'];
        foreach ($addressKeys as $key) {
            if (empty($this->storeData['address']['home'][$key]) && !empty($this->user->address->home->$key)) {
                $this->storeData['address']['home'][$key] = $this->user->address->home->$key;
            }
            if (empty($this->storeData['address']['work'][$key]) && !empty($this->user->address->work->$key)) {
                $this->storeData['address']['work'][$key] = $this->user->address->work->$key;
            }
        }
    }

    /**
     * Updates the stored data with the current state of the storeData property.
     *
     * This function is triggered when the storeData property is updated. It saves
     * the current state of the storeData property to persistent storage.
     *
     * @return void
     */
    public function updatedStoreData()
    {
        $this->putData($this->storeData);
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
                $this->storeData['role'] = $this->user->role ?? '';
            }
            //$this->currentStep = 2;
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
                    'storeData.phone.home.country_code' => 'required|string|regex:/^\+\d+$/',
                    'storeData.phone.home.number' => 'required|digits_between:4,11',
                    'storeData.date_of_birth' => [
                        'required',
                        'string',
                        'date_format:m/d/Y',
                    ],
                    'storeData.gender' => 'required|string|in:male,female',

                    'storeData.address.home.full' => [
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
                    'storeData.address.work.full' => [
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
                    'storeData.phone.home.country_code.required' => 'Please enter the country code for the phone number.',
                    'storeData.phone.home.number.required' => 'Please enter the phone number.',
                    'storeData.phone.home.number.numeric' => 'The phone number must be a numeric value.',
                    //
                    'storeData.date_of_birth.required' => 'Please enter your date of birth.',
                    'storeData.date_of_birth.string' => 'The date of birth must be in the format MM/DD/YYYY.',
                    //
                    'storeData.gender.required' => 'Please select your gender.',
                    'storeData.gender.string' => 'The selected gender is invalid.',
                    'storeData.gender.in' => 'The selected gender is invalid.',
                    'storeData.address.*.full.required' => 'Please enter a location.',
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
                ];

                // Conditionally add rules based on the 'drive' value
                if ($this->storeData['drive'] === 'true') {
                    $rules['internationalPassport.file.path'] = [
                        'required',
                        'string',
                        function ($attribute, $value, $fail) {
                            $filePath = storage_path('app/public/' . $value);
                            if (!file_exists($filePath) || !getimagesize($filePath)) {
                                $fail('The file at ' . $value . ' is not a valid image in the tmp directory.');
                            }
                        },
                    ];
                    $rules['proofOfAddress.file.path'] = [
                        'required',
                        'string',
                        function ($attribute, $value, $fail) {
                            $filePath = storage_path('app/public/' . $value);
                            if (!file_exists($filePath) || !getimagesize($filePath)) {
                                $fail('The file at ' . $value . ' is not a valid image in the tmp directory.');
                            }
                        },
                    ];
                    $rules['driversLicense.file.path'] = [
                        'required',
                        'string',
                        function ($attribute, $value, $fail) {
                            $filePath = storage_path('app/public/' . $value);
                            if (!file_exists($filePath) || !getimagesize($filePath)) {
                                $fail('The file at ' . $value . ' is not a valid image in the tmp directory.');
                            }
                        },
                    ];
                }

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
     * Handle the update and validation of a file.
     *
     * This function validates the newly uploaded file, resets the file input,
     * and reinitializes the uploaded file data.
     *
     * @param string $type The type of file being updated (e.g., 'photo', 'nin', 'internationalPassport', 'driversLicense', 'proofOfAddress').
     * @param string $label The label for the file type used in validation messages.
     * @param bool $isImage Whether the file should be validated as an image.
     * @return void
     */
    public function updatedFile($type, $label, $isImage = false)
    {
        // Determine the validation rule based on whether the file is an image
        $validationRule = $isImage ? 'required|image|max:1024' : 'required|file|max:1024';

        // Validate the file
        $this->validate(
            ["{$type}.new" => $validationRule],
            [],
            ["{$type}.new" => $label]
        );

        $path = $this->{$type}['file']['path'] ?? null;
        $new = $this->{$type}['new'] ?? null;

        // Optionally reset file input
        $this->reset($type);
        $this->{$type}['new'] = [];

        // Reinitialize the file
        $this->{$type}['file'] = $this->uploadFile($type, $new, $path);
    }

    /**
     * Handle the update of the user's profile photo.
     *
     * This function is triggered when the user's profile photo is updated.
     * It validates and processes the new photo file.
     *
     * @return void
     */
    public function updatedPhoto()
    {
        $this->updatedFile('photo', 'Profile Photo', true);
    }

    /**
     * Handle the update of the user's National Identification Number (NIN) document.
     *
     * This function is triggered when the user's NIN document is updated.
     * It validates and processes the new NIN file.
     *
     * @return void
     */
    public function updatedNin()
    {
        $this->updatedFile('nin', 'NIN');
    }

    /**
     * Handle the update of the user's International Passport document.
     *
     * This function is triggered when the user's International Passport document is updated.
     * It validates and processes the new International Passport file.
     *
     * @return void
     */
    public function updatedInternationalPassport()
    {
        $this->updatedFile('internationalPassport', 'International Passport');
    }

    /**
     * Handle the update of the user's Driver's License document.
     *
     * This function is triggered when the user's Driver's License document is updated.
     * It validates and processes the new Driver's License file.
     *
     * @return void
     */
    public function updatedDriversLicense()
    {
        $this->updatedFile('driversLicense', 'Drivers License');
    }

    /**
     * Handle the update of the user's Proof of Address document.
     *
     * This function is triggered when the user's Proof of Address document is updated.
     * It validates and processes the new Proof of Address file.
     *
     * @return void
     */
    public function updatedProofOfAddress()
    {
        $this->updatedFile('proofOfAddress', 'Proof Of Address');
    }


    /**
     * Save the uploaded files associated with the user.
     *
     * @return void
     */
    protected function saveFiles(User|Admin $user)
    {
        if (isset($this->photo['file']['path'])) {
            $resizing = [
                'width' => 140,
                'height' => 140,
                'type' => 'coverDown'
            ];
            $this->processFile(
                $user,
                $this->photo['file'],
                'photo',
                getUserStorage() . 'profile/photo.webp',
                false,
                Attachment::TYPE_PHOTO,
                $resizing,
                80
            );
        }

        foreach ($this->getStoredData()['files'] as $key => $file) {
            if ($key !== 'photo' && isset($file['path'])) {
                $storagePath = getUserStorage('private', $this->user->id) . 'documents/';
                $path = str_contains($file['mime_type'], 'image') ? $storagePath . $key . '.webp' : $storagePath . $key . '.pdf';
                $this->processFile($user, $file, $key, $path, true, Attachment::TYPE_DOCUMENT);
            }
        }
    }

    /**
     * Process and upload a file or image for a user or admin.
     *
     * This function handles the processing of a file or image, including determining
     * the document name and description, and uploading it using the appropriate method
     * based on the file type. After processing, the original file is deleted from storage.
     *
     * @param User|Admin $user The user or admin associated with the file.
     * @param array $file An associative array containing file details such as path and mime type.
     * @param string $key The key representing the type of document (e.g., 'photo', 'nin').
     * @param string $path The storage path where the processed file will be saved.
     * @param bool $isFeatured Indicates whether the file should be marked as featured.
     * @param mixed $type The type of the file, used to determine processing logic.
     * @param array $resizing Optional. An array specifying resizing options for images.
     * @param int $quality Optional. The quality of the image if it is being processed as an image. Default is 100.
     * @return void
     */
    protected function processFile(User|Admin $user, array $file, string $key, string $path, bool $isFeatured, $type, $resizing = [], int $quality = 100)
    {
        $document = Storage::path('public/' . $file['path']);
        $docName = $this->getDocName($key);
        $docDesc = $user->name . '\'s ' . $docName;
        if ($type === Attachment::TYPE_DOCUMENT) {
            Upload::file(
                name: $docName,
                description: $docDesc,
                file: $document,
                mimeType: $file['mime_type'],
                is_featured: $isFeatured,
                type: $type,
                authorable: $user,
                attachable: $user,
                path: $path,
            );
        } else {
            Upload::image(
                name: $docName,
                description: $docDesc,
                image: $document,
                mimeType: $file['mime_type'],
                is_featured: $isFeatured,
                type: $type,
                resizing: $resizing,
                quality: $quality,
                authorable: $user,
                attachable: $user,
                path: $path,
            );
        }

        Storage::delete('public/' . $file['path']);
        $this->storeData['files'][$key] = [];
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
        // Redirect to the user dashboard after completing the onboarding process
        redirect()->route('user.dashboard')->with('message', 'You have completed the onboarding process. You have been updated to ' . ucfirst($this->user->role) . '.');

        updateUser($this->user->id,[
            'records->onboarding->status' => 'completed',
            'records->onboarding->step' => $this->currentStep,
            'records->onboarding->restart_at' => null,
            'records->onboarding->completed_at' => now(),
            'details->phone' => json_encode($this->storeData['phone']),
            'details->date_of_birth' => json_encode($this->storeData['date_of_birth']),
            'details->gender' => json_encode($this->storeData['gender']),
            'details->address' => json_encode($this->storeData['address']),
            'details->social' => json_encode($this->storeData['social']),
            'details->nin' => json_encode($this->storeData['nin']),
            'details->self_drive' => json_encode($this->storeData['drive']),
            'details->status' => 'active',
            'verification->account->status' => 'pending',
            'role' => $this->storeData['role'],
            'profile_photo_path' => getUserStorage('') . 'profile/photo.webp',
        ]);

        // Save the uploaded files
        $this->saveFiles($this->user);

        // Delete the onboarding JSON file
        Storage::delete($this->storePath);

        // Notify the user about the completion
        $this->user->notify(new Completed());
    }

    public function oldSubmit()
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
        Storage::delete($this->storePath);

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
            //if ($this->user->onboarding->status !== 'skipped') {

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
            //}
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
