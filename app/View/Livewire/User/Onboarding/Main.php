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


    public function mount()
    {
        $this->user = getUser();

        $this->defineSteps();
        $this->defineStore();

        // Load file details from the JSON file
        $this->files = $this->getStoredData()['files'] ?? null;
        $this->photo['file'] = $this->files['photo'] ?? null;
        $this->nin['file'] = $this->files['nin'] ?? null;
        $this->internationalPassport['file'] = $this->files['passport'] ?? null;
        $this->driversLicense['file'] = $this->files['drivers_license'] ?? null;
        $this->proofOfAddress['file'] = $this->files['proof_of_address'] ?? null;
        $this->validateStep();
    }

    /**
     * Handle the upload and validation of the photo file.
     *
     * @return void
     */
    public function updatedPhoto()
    {
        // Validate the file
        $this->validate([
            'photo.new' => 'required|image|max:1024', // Adjust rules as needed
        ]);

        $path = $this->photo['path'] ?? null;
        $new = $this->photo['new'] ?? null;

        $this->photo['file'] = $this->uploadFile('photo', $new, $path);
        // Optionally reset file input
        // $this->reset('photo');
    }

    /**
     * Handle the upload and validation of the National Identification Number (NIN) file.
     *
     * @return void
     */
    public function updatedNin()
    {
        // Validate the file
        $this->validate([
            'nin.new' => 'required|file|max:1024', // Adjust rules as needed
        ]);

        $path = $this->nin['path'] ?? null;
        $new = $this->nin['new'] ?? null;

        $this->nin['file'] = $this->uploadFile('nin', $new, $path);
        // Optionally reset file input
        // $this->reset('nin');
    }

    /**
     * Handle the upload and validation of the international passport file.
     *
     * @return void
     */
    public function updatedInternationalPassport()
    {
        // Validate the file
        $this->validate([
            'internationalPassport.new' => 'required|file|max:1024', // Adjust rules as needed
        ]);

        $path = $this->internationalPassport['path'] ?? null;
        $new = $this->internationalPassport['new'] ?? null;

        $this->internationalPassport['file'] = $this->uploadFile('passport', $new, $path);
        // Optionally reset file input
        // $this->reset('internationalPassport');
    }

    /**
     * Handle the upload and validation of the driver's license file.
     *
     * @return void
     */
    public function updatedDriversLicense()
    {
        // Validate the file
        $this->validate([
            'driversLicense.new' => 'required|file|max:1024', // Adjust rules as needed
        ]);

        $path = $this->driversLicense['path'] ?? null;
        $new = $this->driversLicense['new'] ?? null;

        $this->driversLicense['file'] = $this->uploadFile('drivers_license', $new, $path);
        // Optionally reset file input
        // $this->reset('driversLicense');
    }

    /**
     * Handle the upload and validation of the proof of address file.
     *
     * @return void
     */
    public function updatedProofOfAddress()
    {
        // Validate the file
        $this->validate([
            'proofOfAddress.new' => 'required|file|max:1024', // Adjust rules as needed
        ]);

        $path = $this->proofOfAddress['path'] ?? null;
        $new = $this->proofOfAddress['new'] ?? null;

        $this->proofOfAddress['file'] = $this->uploadFile('proof_of_address', $new, $path);
        // Optionally reset file input
        // $this->reset('proofOfAddress');
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
        if ($filePath && Storage::exists($filePath)) {
            Storage::delete($filePath);
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
    }

    /**
     * Check and update the current step based on the user's role.
     *
     * @return void
     */
    public function checkSteps()
    {
        if ($this->user->role !== 'subscriber' && ($this->currentStep == 0 || $this->currentStep == 1)) {
            $this->currentStep = 2;
        }
    }

    /**
     * Validate the data for a specific step in the onboarding process.
     *
     * This function validates the data for the current step or a specified step
     * using predefined validation rules. Additional validation rules can be merged
     * with the default rules for more specific validation requirements.
     *
     * @param int|null $step The step number to validate. If null, the current step is used.
     * @param array $additionalRules An array of additional validation rules to merge with the default rules.
     * @return void
     */
    protected function validateStep($step = null, $additionalRules = [])
    {
        // Use the current step if no specific step is provided
        $step = $step ?? $this->currentStep;

        // Define default rules for each step
        $rules = [
            0 => [
                'photo.new' => 'required|image|max:1024',
            ],
            1 => [
                'storeData.role' => 'required|string',
            ],
            2 => [
                'storeData.phone.home.number' => 'required|numeric',
                'storeData.date_of_birth' => 'required|date',
                'storeData.gender' => 'required|string',
                'storeData.address.home' => 'required|string',
            ],
            3 => [
                'nin.new' => 'required|file|max:1024',
            ],
            4 => [
                'internationalPassport.new' => 'required|file|max:1024',
                'driversLicense.new' => 'required|file|max:1024',
                'proofOfAddress.new' => 'required|file|max:1024',
            ],
        ];

        // Get the rules for the provided step (or current step)
        $stepRules = $rules[$step] ?? [];

        // Merge with any additional rules provided
        foreach ($additionalRules as $key => $rule) {
            $stepRules[$key] = $rule;
        }

        // Validate the data against the rules for the current step
        $this->validate($stepRules);
    }

    /**
     * Submit the onboarding form and save the uploaded files.
     *
     * @return void
     */
    public function submit()
    {
        $user = $this->user;
        $this->saveFiles($user);
    }

    /**
     * Save the uploaded files associated with the user.
     *
     * @param User|Admin $user The user to associate the uploaded files with.
     * @return void
     */
    protected function saveFiles(User|Admin $user)
    {
        if ($this->photo['file']['path']) {
            $image = Storage::path('public/' . $this->photo['file']['path']);
            $profilePath = getUserStorage() . 'profile/photo.webp';
            $photoName = $this->getDocName('photo');
            $photoDesc = $user->name . '\'s ' . $photoName;

            // Save the photo to the storage, update the user profile photo and attach it with the user Via attachable
            $user->profile_photo_path = Upload::file(
                name: $photoName,
                description: $photoDesc,
                file: $image,
                is_featured: false,
                quality: 90,
                authorable: $user,
                attachable: $user,
                path: $profilePath,
            );
            $user->save();

            // Delete the uploaded photo after saving it to the storage
            unset($this->storeData['files']['photo']);
            $this->deleteFile($image);
        }

        foreach ($this->files as $key => $file) {
            if ($key !== 'photo') {

                $storagePath = getUserStorage('private') . 'documents/';
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
                    is_featured: true,
                    quality: 90,
                    authorable: $user,
                    attachable: $user,
                    path: $path,
                );
            }

            // Delete the uploaded file after saving it to the storage
            unset($this->storeData['files'][$key]);
            $this->deleteFile($document);
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
     * Complete the onboarding process.
     * 
     * @return \Illuminate\Http\RedirectResponse Redirects to the user dashboard with a completion message.
     */
    #[On('onboarding-completed')]
    public function completeOnboarding()
    {
        $this->user->forceFill([
            'boarding->status' => 'completed',
            'boarding->step' => $this->currentStep,
            'boarding->restart_at' => '',
            'boarding->completed_at' => now(),
        ])->save();

        $this->submit(); // Save any necessary data to the database

        $this->user->notify(new Completed());
        // Redirect to the user dashboard after completing the onboarding process
        return redirect()->route('user.dashboard')->with('message', 'You have completed the onboarding process. You have been updated to ' . ucfirst($this->role) . '.');
    }

    /**
     * Skip the onboarding process.
     * 
     * @return \Illuminate\Http\RedirectResponse Redirects to the user dashboard with a skip message.
     */
    #[On('onboarding-skip')]
    public function skipOnboarding()
    {
        // Check if the user's onboarding status is already 'skipped'
        if ($this->user->onboarding->status !== 'skipped') {
            // Update the user's onboarding status
            $this->user->forceFill([
                'boarding->status' => 'skipped',
                'boarding->step' => $this->currentStep,
                'boarding->restart_at' => now()->addDays(2),
                'boarding->completed_at' => '',
            ])->save();

            // Notify the user about the skipped onboarding process 
            $this->user->notify(new Skipped());
        }

        // Redirect to the user dashboard after skipping the onboarding process
        return redirect()->route('user.dashboard')->with('info', 'You have skipped the onboarding process.');
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
