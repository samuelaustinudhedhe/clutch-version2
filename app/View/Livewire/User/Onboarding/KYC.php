<?php

namespace App\View\Livewire\User\Onboarding;

use App\Http\Controllers\Attachments\AttachmentUploadController as Upload;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class KYC extends main
{
    public $nin = [];    /** @var array Holds the uploaded National Identification Number (NIN) data. */
    public $internationalPassport = [];    /** @var array Holds the uploaded international passport data. */
    public $driversLicense = [];    /** @var array Holds the uploaded driver's license data. */
    public $proofOfAddress = [];    /** @var array Holds the uploaded proof of address data. */


    public function mount()
    {
        $this->nin['file'] = $this->files['nin'] ?? [];
        $this->internationalPassport['file'] = $this->files['passport'] ?? [];
        $this->driversLicense['file'] = $this->files['drivers_license'] ?? [];
        $this->proofOfAddress['file'] = $this->files['proof_of_address'] ?? [];
        // $this->prevStepName = $this->getPrevStepName();
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
     * Save the uploaded files associated with the user.
     *
     * @param User|Admin $user The user to associate the uploaded files with.
     * @return void
     */
    protected function saveFiles(User|Admin $user)
    {
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
                    mimeType: $mime_type,
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

    public function render()
    {
        return view('user.onboarding.kyc');
    }
}
