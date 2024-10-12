<?php

namespace App\View\Livewire\Resources\Vehicles;

use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use App\Http\Controllers\Attachments\AttachmentUploadController as Upload;
use App\Models\Admin;
use App\Models\User;
use App\Models\Vehicle;
use App\Traits\WithSteps;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

abstract class Wizard extends Component
{
    use WithSteps, WithFileUploads;

    public $storeAllData;
    public $index;

    /**
     * Retrieve the owner of the vehicle.
     *
     * This abstract method must be implemented by subclasses to define the logic
     * for retrieving the owner of the vehicle. The owner can be either a User or
     * an Admin, depending on the context in which the method is used.
     *
     * @return User|Admin The owner of the vehicle.
     */
    abstract public function getOwner();

    /**
     * Abstract method for redirecting to a specified route with a success message.
     *
     * Subclasses must implement this method to define their own redirection logic.
     *
     * @return \Illuminate\Http\RedirectResponse A redirect response to the specified route with a success message.
     */
    abstract public function submissionRedirect();
    // {
    //     $route = 'admin.vehicles.index';
    //     $message = 'Vehicle Created';
    //     return redirect()->route($route)->with('success', $message);
    // }


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
     * Automatically update a property whenever it changes.
     *
     * This method is triggered during the Livewire update cycle and can be used
     * to perform actions whenever a specific property is updated.
     *
     * @param string $propertyName The name of the property that was updated.
     * @return void
     */
    public function updated($propertyName)
    {

        // $this->updateStoredData();
    }

    /**
     * Get the File name based on the file type.
     *
     * @param string $docType The type of the document.
     * @return string The name of the document.
     */
    protected function getFileName(string $fileType): string
    {
        $fileNames = [
            Attachment::TYPE_IMAGE => 'Featured Image',
            Attachment::TYPE_GALLERY_IMAGE => 'Gallery Image',
            Attachment::TYPE_INSURANCE_DOCUMENT => 'Insurance Document',
            Attachment::TYPE_REGISTRATION_DOCUMENT => 'Vehicle Registration Document',
            Attachment::TYPE_PROOF_OF_OWNERSHIP_DOCUMENT => 'Proof of Ownership Document',
            // Add more document types and their corresponding names as needed
        ];

        return $fileNames[$fileType] ?? 'Vehicle File';
    }

    /**
     * Initializes the storage path and data for the vehicle wizard.
     *
     * This function sets the path for storing vehicle data in a JSON file,
     * retrieves any previously stored data, and initializes the current step
     * of the wizard process.
     *
     * @return void
     */
    public function defineStore()
    {
        // Define Store Path
        $this->storePath = $this->getStorage('private') . "/data/vehicle.json";

        // Retrieve Stored Data
        $this->storeData =  $this->getStoredData() ??$this->storeData;

        // Initialize Current Step
        $this->currentStep = $this->storeData['current_step'] ?? 0;
    }

    /**
     * Updates the stored data for the vehicle wizard.
     *
     * This function retrieves the stored vehicle data and updates the `storeData`
     * property with the current state of the data. It can optionally update the
     * data for a specific index if provided.
     *
     * @return void
     */
    protected function updateStoredData()
    {

        // Retrieve all stored vehicle data
        $data = $this->getStoredData();

            // Update storeData with the appropriate data set
            $this->storeData = $data[$this->index];
            $this->storeAllData = $data;
       
    }

    // public function store()
    // {
    //     // Define the path for storing data
    //     $path = $this->storePath;
    
   
    //         // Update the data at the specified index
    //         $this->storeAllData[$this->index] = $this->storeData;
       
    
    //     // Save the updated data back to the JSON file
    //     if (!empty($path)) {
    //         Storage::put($path, json_encode($this->storeAllData));
    //     }
    // }

    /**
     * Retrieve the storage path for a given user and disk.
     *
     * This function determines the appropriate storage path based on whether
     * the user is an Admin or a regular User, and returns the corresponding
     * storage path for the specified disk.
     *
     * @param string $disk The storage disk to use (e.g., 'public', 'private').
     * @param Admin|User|null $user The user for whom the storage path is being retrieved.
     * @return string The storage path for the specified user and disk.
     */
    public function getStorage($disk, Admin|User $user = null)
    {
        // Use the current user if no specific user is provided
        $user = $user ?? $this->user;

        // Check if the user is an Admin
        if ($user instanceof Admin) {
            // Return the storage path for an Admin user
            return getAdminStorage($disk, $user->id);
        }

        // Return the storage path for a regular User
        return getUserStorage($disk, $user->id);
    }

    /**
     * Define and initialize the store data for the vehicle wizard.
     *
     * This function sets default values for certain fields in the storeData
     * property, such as the insurance document status, and updates address
     * details for pickup and drop-off locations based on the user's vehicle
     * information.
     *
     * @return void
     */
    public function defineStoreData()
    {
        // Set the default status for the insurance document if not already set
        if (!isset($this->storeData['documents']['insurance']['status'])) {
            $this->storeData['documents']['insurance']['status'] = 'valid';
        }

        // Define the keys for address details
        $addressKeys = ['full', 'country', 'state', 'city', 'street', 'postal_code', 'unit', 'longitude', 'latitude'];

        // Iterate over each address key to update pickup and drop-off locations
        foreach ($addressKeys as $key) {
            // Update pickup location if not set and available in user's vehicle data
            if (empty($this->storeData['location']['pickup'][$key]) && !empty($this->user->vehicle->location->pickup->$key)) {
                $this->storeData['location']['pickup'][$key] = $this->user->address->home->$key;
            }
            // Update drop-off location if not set and available in user's vehicle data
            if (empty($this->storeData['location']['drop_off'][$key]) && !empty($this->user->vehicle->location->drop_off->$key)) {
                $this->storeData['location']['drop_off'][$key] = $this->user->address->home->$key;
            }
        }
    }

    /**
     * Handles the update of newly uploaded images.
     *
     * This function processes each new image uploaded by the user, validating
     * the image type and size, checking for duplicates, and storing valid images
     * temporarily. It also manages error messages for invalid images and updates
     * the stored data with the new image details.
     *
     * @return void
     */
    public function updatedImages()
    {
        // Iterate over each new image uploaded
        foreach ($this->images['newUploads'] as $newImage) {
            // Get the original file name of the image
            $fileName = $newImage->getClientOriginalName();
            $error = ''; // Initialize an error message variable

            // Check if the file is a valid image
            if (strpos($newImage->getMimeType(), 'image/') === false) {
                $error = "The file " . $fileName . " is not a valid image.";
            }
            // Check if the file size exceeds the 4MB limit
            elseif ($newImage->getSize() > 1024 * 1024 * 4) {
                $error = "The file " . $fileName . " exceeds the maximum size of 4MB.";
            }
            // Check if the image already exists in the uploaded images
            else {
                // Generate a hash of the image file
                $imageHash = md5_file($newImage->getRealPath());

                $alreadyExists = false; // Flag to check if image already exists
                // Iterate over each uploaded image to check for duplicates
                foreach ($this->images['uploaded'] as $image) {
                    if ($image['hash'] === $imageHash) {
                        $alreadyExists = true;
                        break;
                    }
                }

                // If the image already exists, set an error message
                if ($alreadyExists) {
                    $error = "The image " . $fileName . " already exists.";
                } else {
                    // Store the new image temporarily in the public storage
                    $filePath = $newImage->store("tmp", 'public');

                    // Initialize the images array in storeData if not already set
                    if (!isset($this->storeData['files']['images'])) {
                        $this->storeData['files']['images'] = [];
                    }

                    // Add the new image details to the storeData
                    $this->storeData['files']['images'][] = [
                        'path' => $filePath,
                        'mime_type' => $newImage->getMimeType(),
                        'size' => $newImage->getSize(),
                        'hash' => $imageHash
                    ];

                    // Delete the temporary file
                    $this->deleteFile($newImage);
                    // Save the updated storeData to the JSON file
                    Storage::put($this->storePath, json_encode($this->storeData));

                    // Update the uploaded images array with the new image
                    $this->images['uploaded'] = $this->storeData['files']['images'];
                }
            }

            // If there is an error, add it to the errors array if not already present
            if ($error && !in_array($error, $this->images['errors'])) {
                $this->images['errors'][] = $error;
            }
        }

        // Dispatch a notification with all aggregated errors
        $this->dispatch('notify', implode('<br>', $this->images['errors']), 'warning');

        // Clear the temporary new images array
        $this->images['new'] = [];
    }

    /**
     * Sets the featured image based on the provided index number.
     *
     * @param int $index The index of the image to be set as featured.
     * @return void
     */
    public function setFeaturedImage($index)
    {
        // Set the featured image index
        $this->images['featuredIndex'] = $index;
    }

    /**
     * Removes an image from the images array and deletes the file from storage.
     *
     * @param int $index The index of the image to be removed.
     * @return void
     */
    public function removeImage($index)
    {
        // Get the array of uploaded images
        $files = $this->images['uploaded'];
        // Get the file path of the image to be removed
        $filePath = Storage::path('public/' . $files[$index]['path']);

        // Check if the file exists in storage
        if (file_exists($filePath)) {
            // Delete the file from storage
            unlink($filePath);
        }
        // Remove the image from the uploaded images array
        array_splice($files, $index, 1);
        // Update the uploaded images array
        $this->images['uploaded'] = $files;
        // Update the images array in the storeData property
        $this->storeData['files']['images'] = $this->images['uploaded'];
        // Save the updated storeData to the JSON file
        Storage::put($this->storePath, json_encode($this->storeData));
    }

    /**
     * Handle the update and validation of a file.
     *
     * This function validates the newly uploaded file, resets the file input,
     * and reinitialize the uploaded file data.
     *
     * @param string $type The type of file being updated (e.g., 'registration', 'insurance', 'proofOfOwnership').
     * @param string $label The label for the file type used in validation messages.
     * @return void
     */
    public function updatedFile($type, $label, $key = '', $messages = [])
    {
        // Set the key for uploaded file data
        $key = $key ?: $type;

        // Validate the type of file
        $this->validate(
            ["{$type}.new" => 'required|file|max:2048|mimes:jpeg,png,jpg,gif,pdf'],
            $messages,
            ["{$type}.new" => $label]
        );

        $path = $this->{$type}['uploaded']['path'] ?? null;
        $new = $this->{$type}['new'] ?? null;

        // Optionally reset file input
        $this->reset($type);
        $this->{$type}['new'] = [];

        // Reinitialize the uploaded file data
        $this->{$type}['uploaded'] = $this->uploadFile($key, $new, $path);
    }

    /**
     * Handle the update of the registration file.
     *
     * This function is triggered when the registration file is updated.
     * It validates the new registration file, resets the file input,
     * and reinitializes the uploaded registration file data.
     *
     * @return void
     */
    public function updatedRegistration()
    {
        $this->updatedFile('registration', 'Registration');
    }

    /**
     * Handle the update of the insurance file.
     *
     * This function is triggered when the insurance file is updated.
     * It validates the new insurance file, resets the file input,
     * and reinitializes the uploaded insurance file data.
     *
     * @return void
     */
    public function updatedInsurance()
    {
        $this->updatedFile('insurance', 'Insurance');
    }

    /**
     * Handle the update of the proof of ownership file.
     *
     * This function is triggered when the proof of ownership file is updated.
     * It validates the new proof of ownership file, resets the file input,
     * and reinitializes the uploaded proof of ownership file data.
     *
     * @return void
     */
    public function updatedProofOfOwnership()
    {
        $this->updatedFile('proofOfOwnership', 'Proof Of Ownership', 'proof_of_ownership');
    }

    /**
     * Submits the vehicle data for processing and storage.
     *
     * This function retrieves the stored vehicle data and the current owner,
     * sets default values for chauffeur details and currency if not provided,
     * constructs the vehicle's name, creates a new vehicle record in the database,
     * associates the vehicle with the owner, saves any related attachments, and
     * redirects or resets after successful submission.
     *
     * @return void
     */
    public function submit()
    {
        // Retrieve the stored data for the vehicle
        $data = $this->storeData;

        // Retrieve the current owner
        $owner = $this->getOwner();

        // Define the default chauffeur details using the current owner's information
        $defaultChauffeur = $this->getDefaultChauffeur($owner);

        // Set the currency if it is not already set in the data
        $this->setDefaultCurrency($data);

        // Determine the chauffeur details, using the default if none is provided
        $chauffeur = $data['has_chauffeur'] ?? $defaultChauffeur;

        // Construct the vehicle's name using make, model, and year
        $vehicleName = $this->constructVehicleName($data);

        // Create a new vehicle record in the database
        $vehicle = $this->createVehicleRecord($data, $vehicleName, $chauffeur, $owner);

        // Save any attachments related to the vehicle
        $this->saveAttachments($owner, $vehicle);

        // Save the vehicle record to the database
        $vehicle->save();

        // Redirect or reset after successful submission
        $this->submissionRedirect();
    }

    /**
     * Get the default chauffeur details.
     *
     * @param User|Admin $owner The current owner.
     * @return array The default chauffeur details.
     */
    private function getDefaultChauffeur($owner): array
    {
        return [
            'name' => $owner->name,
            'phone' => [
                'home' => formatPhone($owner->phone, type: 'home'), // Format the home phone number
                'work' => formatPhone($owner->phone, type: 'work')  // Format the work phone number
            ],
            'email' => $owner->email // Use the owner's email
        ];
    }

    /**
     * Set the default currency if not already set.
     *
     * @param array &$data The vehicle data.
     * @return void
     */
    private function setDefaultCurrency(array &$data): void
    {
        if (!isset($data['price']['currency'])) {
            $data['price']['currency'] = app_currency(false); // Set default currency
        }
    }

    /**
     * Construct the vehicle's name.
     *
     * @param array $data The vehicle data.
     * @return string The constructed vehicle name.
     */
    private function constructVehicleName(array $data): string
    {
        return trim($data['details']['make'] . ' ' . $data['details']['model'] . ' ' . $data['details']['year']);
    }

    /**
     * Create a new vehicle record in the database.
     *
     * @param array $data The vehicle data.
     * @param string $vehicleName The vehicle's name.
     * @param array $chauffeur The chauffeur details.
     * @param User|Admin $owner The current owner.
     * @return Vehicle The created vehicle.
     */
    private function createVehicleRecord(array $data, string $vehicleName, array $chauffeur, $owner): Vehicle
    {
        return Vehicle::create([
            'name' => $vehicleName,          // Set the vehicle's name
            'price' => $data['price'],       // Set the vehicle's price
            'status' => 'pending',           // Set the initial status to pending
            'location' => $data['location'], // Set the vehicle's location
            'details' => $data['details'],   // Set the vehicle's details
            'documents' => $data['documents'], // Set the vehicle's documents
            'chauffeur' => $chauffeur,       // Set the chauffeur details
            'ownerable_id' => $owner->id,     // Set the ownerable ID to the owner's ID
            'ownerable_type' => get_class($owner) // Set the ownerable type to the owner's class
        ]);
    }

    /**
     * Saves attachments related to a vehicle, including images and documents, to storage.
     *
     * This function processes uploaded files, saves them to the appropriate storage locations,
     * and associates them with the given user and vehicle. It handles both images and documents,
     * ensuring that only valid insurance documents are saved.
     *
     * @param User|Admin $user The user or admin who is uploading the attachments.
     * @param Vehicle $vehicle The vehicle to which the attachments are related.
     * @return void
     */
    protected function saveAttachments(User|Admin $user, Vehicle $vehicle)
    {
        // Retrieve the stored files data from the session or storage.
        $files = $this->storeData['files'];

        // Process and save image files.
        $this->processImages($files['images'], $user, $vehicle);

        // Process and save document files.
        $this->processDocuments($files, $user, $vehicle);
    }

    /**
     * Process and save image attachments.
     *
     * @param array $images The array of images to process.
     * @param User|Admin $user The user or admin who is uploading the attachments.
     * @param Vehicle $vehicle The vehicle to which the attachments are related.
     * @return void
     */
    private function processImages(array $images, User|Admin $user, Vehicle $vehicle)
    {
        // Iterate over each image in the images array.
        foreach ($images as $index => $image) {
            // Check if the image path exists in the storage.
            if (isset($image['path']) && Storage::exists('public/' . $image['path'])) {
                // Save the image to the storage.
                $this->saveImage($image, $index, $user, $vehicle);

                // Delete the image from the temporary storage location.
                Storage::delete('public/' . $image['path']);

                // Remove the image from the storeData array.
                unset($this->storeData['files']['images'][$index]);
            }
        }
    }

    /**
     * Save a single image to storage.
     *
     * @param array $image The image data.
     * @param int $index The index of the image in the array.
     * @param User|Admin $user The user or admin who is uploading the attachments.
     * @param Vehicle $vehicle The vehicle to which the attachments are related.
     * @return void
     */
    private function saveImage(array $image, int $index, User|Admin $user, Vehicle $vehicle)
    {
        // Generate a random hash name for the image file.
        $hashName = Str::random(40);

        // Determine if the image is the featured image.
        $featured = $index === $this->images['featuredIndex'];

        // Determine the type of image (featured or gallery).
        $nameKey = $featured ? Attachment::TYPE_IMAGE : Attachment::TYPE_GALLERY_IMAGE;

        // Get the document name based on the type.
        $imageName = $this->getDocName($nameKey);

        // Convert the index to words if it's a gallery image.
        $toWord = ($nameKey === Attachment::TYPE_GALLERY_IMAGE ? numberToWords($index) : '');

        // Construct the name and description for the image.
        $name = "{$vehicle->name}'s {$imageName} " . $toWord;
        $description = "{$user->name}'s " . $toWord . " {$imageName} of {$vehicle->name} - {$vehicle->description}";

        // Define the resizing options for the image.
        $resizing = [
            'width' => 1440,
            'height' => 700,
            'type' => 'coverDown',
            'option' => ['position' => 'center']
        ];

        // Upload the image using the Attachment Upload controller.
        Upload::Image(
            name: $name,
            description: $description,
            image: Storage::path('public/' . $image['path']),
            mimeType: $image['mime_type'],
            is_featured: $featured,
            type: $nameKey,
            resizing: $resizing,
            quality: 90,
            authorable: $user,
            attachable: $vehicle,
            path: "public/vehicles/{$vehicle->id}/{$hashName}.webp"
        );
    }

    /**
     * Process and save document attachments.
     *
     * @param array $files The array of files to process.
     * @param User|Admin $user The user or admin who is uploading the attachments.
     * @param Vehicle $vehicle The vehicle to which the attachments are related.
     * @return void
     */
    private function processDocuments(array $files, User|Admin $user, Vehicle $vehicle)
    {
        // Iterate over each file in the files array.
        foreach ($files as $key => $file) {
            // Skip processing for images and invalid insurance documents.
            if ($key === 'images' || ($key === 'insurance' && !$this->isInsuranceValid())) {
                continue;
            }

            // Check if the file path exists in the storage.
            if (isset($file['path']) && Storage::exists('public/' . $file['path'])) {
                // Save the document to the storage.
                $this->saveDocument($file, $key, $user, $vehicle);

                // Delete the document from the temporary storage location.
                Storage::delete('public/' . $file['path']);

                // Remove the document from the storeData array.
                unset($this->storeData['files'][$key]);
            }
        }

        // Update the stored data with the current state.
        $this->putData($this->storeData);
    }

    /**
     * Save a single document to storage.
     *
     * @param array $file The file data.
     * @param string $key The key of the file in the array.
     * @param User|Admin $user The user or admin who is uploading the attachments.
     * @param Vehicle $vehicle The vehicle to which the attachments are related.
     * @return void
     */
    private function saveDocument(array $file, string $key, User|Admin $user, Vehicle $vehicle)
    {
        // Generate a random hash name for the document file.
        $hashName = Str::random(30);

        // Define the storage path for the document.
        $storagePath = $this->getStorage('private', $user->id) . "documents/vehicles/{$vehicle->id}";

        // Get the MIME type of the document.
        $mime_type = $file['mime_type'];

        // Determine if the document is a PDF.
        $is_pdf = in_array($mime_type, Attachment::$documentMimeTypes);

        // Get the document name based on the key.
        $keyName = $this->getFileName("{$key}_document");

        // Define the path for the document based on its type.
        $path = $is_pdf ? "{$storagePath}/{$hashName}.pdf" : "{$storagePath}/{$hashName}.webp";

        // Construct the name and description for the document.
        $docName = "{$keyName} for {$vehicle->name}";
        $docDesc = "{$user->name}'s {$docName}";

        // Upload the document using the Attachment Upload controller.
        $documents = Upload::file(
            name: $docName,
            description: $docDesc,
            file: Storage::path('public/' . $file['path']),
            mimeType: $mime_type,
            is_featured: true,
            type: Attachment::TYPE_DOCUMENT,
            authorable: $user,
            attachable: $user,
            path: $path
        );

        // Update the vehicle with the document ID.
        updateVehicle($vehicle->id, ["documents->{$key}->id" => $documents->id]);
    }

    /**
     * Check if the insurance document is valid.
     *
     * @return bool True if the insurance document is valid, false otherwise.
     */
    private function isInsuranceValid(): bool
    {
        // Retrieve the insurance status from the stored data.
        $insuranceStatus = $this->storeData['documents']['insurance']['status'] ?? null;

        // Return true if the insurance status is 'valid'.
        return $insuranceStatus === 'valid';
    }

    /**
     * Render the Livewire component view.
     *
     * This abstract method must be implemented by subclasses to define the
     * rendering logic for the Livewire component. It typically returns a view
     * instance that represents the component's UI.
     *
     * @return \Illuminate\View\View The view instance representing the component's UI.
     */

    abstract public function render();
    // {
    //     return view(
    //         'user.vehicle.wizard',
    //         [
    //             'prevStepName' => $this->getPrevStepName(),
    //             'nextStepName' => $this->getNextStepName(),
    //             'currentStepName' => $this->getStepName($this->currentStep),
    //             'currentStep' => $this->updateCurrentStep(),
    //             'nextPrefix' => 'next-',
    //             'prevPrefix' => 'prev-',
    //         ]
    //     )->layout('layouts.user');
    // }
}
