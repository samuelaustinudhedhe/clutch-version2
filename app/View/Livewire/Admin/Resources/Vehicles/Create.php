<?php

namespace App\View\Livewire\Admin\Resources\Vehicles;

use App\Http\Controllers\Attachments\AttachmentCompressController;
use App\Http\Controllers\Attachments\AttachmentController;
use App\Models\Vehicle;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Http\Controllers\Attachments\AttachmentUploadController as Upload;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


/**
 * Livewire component for creating a vehicle in the admin panel.
 * Handles vehicle creation, image and document uploads, and form validation.
 */
class Create extends Component
{
    use WithPagination;
    use WithFileUploads;

    // Vehicle properties
    public $vin;
    public $vit;
    public $vits = [];
    public $status;
    public $vehicleTypes = [];
    public $vehicleSubTypes = [];
    public $selectedVehicleSubType;
    public $selectedVehicleType;
    public $vehicleDetails = [];

    // Images for the vehicle
    public $images = [];
    public $newImages = [];
    public $imageErrorMessage = [];
    public $featuredImageIndex = 0;

    // Vehicle documents
    public $documents = [];
    public $newDocuments = [];
    public $documentErrorMessages = [];

    // Vehicle owner
    public $owner;
    public $selectedUser;

    // Search filters
    public $userSearch = '';
    public $usersPerPage = 10;

    public $rules = [];

    /**
     * Initializes the component with vehicle types and subtypes.
     */
    public function mount()
    {
        $this->vehicleTypes = Vehicle::types(); // Fetch vehicle types
        $this->vits = Vehicle::$vits; // Fetch vehicle subtypes
    }

    /**
     * Retrieves the owner of the vehicle.
     *
     * @return User|null The user who is the owner or the admin if no owner is selected.
     */
    public function getOwner()
    {
        if (!empty($this->selectedUser)) {
            return getUser(user: $this->selectedUser); // Get the selected user
        }
        return getUser() ?? getAdmin(); // Get the current user or the admin
    }

    /**
     * Handles the upload of new images, including validation and error handling.
     */
    public function updatedNewImages()
    {
        // Validate each new image
        foreach ($this->newImages as $newImage) {
            $fileName = $newImage->getClientOriginalName(); // Get original file name
            $error = '';

            // Validate if the file is a valid image
            if (getimagesize($newImage->getRealPath()) === false) {
                $error = "The file " . $fileName . " is not a valid image.";
            }
            // Validate the file size (1MB limit)
            elseif ($newImage->getSize() > 1024 * 2024) {
                $error = "The file " . $fileName . " exceeds the maximum size of 1MB.";
            }
            // Check if the image already exists
            else {
                $imageHash = md5_file($newImage->getRealPath()); // Generate image hash

                $alreadyExists = false;
                foreach ($this->images as $image) {
                    if (md5_file($image->getRealPath()) === $imageHash) {
                        $alreadyExists = true;
                        break;
                    }
                }

                if ($alreadyExists) {
                    $error = "The image " . $fileName . " already exists.";
                } else {
                    $this->images[] = $newImage; // Add image to the images array
                }
            }

            // Add the error to the error message array if not already present
            if ($error && !in_array($error, $this->imageErrorMessage)) {
                $this->imageErrorMessage[] = $error;
            }
        }

        // Dispatch a notification with all aggregated errors
        $this->dispatch('notify', implode('<br>', $this->imageErrorMessage), 'warning');

        // Clear the temporary newImages property
        $this->newImages = [];
    }

    /**
     * Sets the featured image based on the provided index.
     *
     * @param int $index The index of the image to be set as featured.
     * @return void
     */
    public function setFeaturedImage($index)
    {
        $this->featuredImageIndex = $index;
    }

    /**
     * Removes an image from the images array and deletes the file.
     *
     * @param int $index The index of the image to be removed.
     * @return void
     */
    public function removeImage($index)
    {
        $file = $this->images[$index]; // Get the image file
        $this->deleteFile($file); // Delete the file from storage
        $this->unsetFile($this->images, $index); // Remove the image from the array
    }

    /**
     * Handles the upload of new documents, including validation and error handling.
     */
    public function updatedNewDocuments()
    {
        foreach ($this->newDocuments as $newDocument) {
            $fileName = $newDocument->getClientOriginalName(); // Get original file name
            $error = '';

            // Validate if the file is a PDF or a valid image
            if ($newDocument->getClientOriginalExtension() !== 'pdf' && getimagesize($newDocument->getRealPath()) === false) {
                $error = "The file " . $fileName . " is not a valid document.";
            }
            // Validate the file size (5MB limit)
            elseif ($newDocument->getSize() > 1024 * 1024 * 5) {
                $error = "The file " . $fileName . " exceeds the maximum size of 5MB.";
            } else {
                $documentHash = md5_file($newDocument->getRealPath()); // Generate document hash

                $alreadyExists = false;
                foreach ($this->documents as $document) {
                    // Check if the document already exists
                    if (md5_file(storage_path('app/public/' . $document['path'])) === $documentHash) {
                        $alreadyExists = true;
                        break;
                    }
                }

                if ($alreadyExists) {
                    $error = "The document " . $fileName . " already exists.";
                } else {
                    // Store the document temporarily and generate a thumbnail (optional)
                    $storedPath = $newDocument->store('tmp', 'public');
                    $mimeType = $newDocument->getMimeType();

                    // Delete the duplicate file uploaded by Livewire
                    $this->deleteFile($newDocument);

                    // Store the document details in the documents array
                    $this->documents[] = [
                        'name' => $fileName,
                        'path' => $storedPath,
                        'mime_type' => $mimeType,
                    ];
                }
            }

            // Add the error to the error message array if not already present
            if ($error && !in_array($error, $this->documentErrorMessages)) {
                $this->documentErrorMessages[] = $error;
            }
        }

        // Dispatch a notification with all aggregated errors
        $this->dispatch('notify', implode('<br>', $this->documentErrorMessages), 'warning');

        // Clear the temporary newDocuments property
        $this->newDocuments = [];
    }

    /**
     * Removes a document from the documents array and deletes the file.
     *
     * @param int $index The index of the document to be removed.
     * @return void
     */
    public function removeDocument($index)
    {
        $filePath = Storage::path('public/' . $this->documents[$index]['path']); // Get the file path
        if (file_exists($filePath)) {
            unlink($filePath); // Delete the file from storage
        }

        unset($this->documents[$index]); // Remove the document from the array
        $this->documents = array_values($this->documents); // Reindex the array
    }

    /**
     * Stores uploaded vehicle images in permanent storage.
     *
     * @param User $user The user uploading the images.
     * @param Vehicle $vehicle The vehicle to which the images belong.
     * @return void
     */
    private function storeVehicleImages(User $user, Vehicle $vehicle)
    {
        foreach ($this->images as $image) {
            // Define the storage folder and filename
            $folder = 'users/' . toSlug($user->name, '-') . '-' . $user->id . '//vehicles/' . toSlug($vehicle->name) . '/images';
            $filename = toSlug($vehicle->name) . '.webp';

            // Check if the image is the featured image
            $is_featured = ($this->featuredImageIndex === array_search($image, $this->images));

            // Upload the image and store the path
            $path = Upload::image($user, $image->getRealPath(), $folder, $filename, 'resize', 200, 200, attachable: $vehicle);

            AttachmentController::makeDir($path); // Create the directory if it doesn't exist

            // Compress and encode the image
            $image = (new AttachmentCompressController)->read($image);
            $encodedImage = AttachmentCompressController::image($image, 'jpg', 80);

            // Store the encoded image in the specified path
            AttachmentController::store($path, $encodedImage);

            // Create a new attachment record for the image
            AttachmentController::create(
                $vehicle->name,
                $vehicle->description,
                $encodedImage,
                $vehicle,
                $user,
                $path,
                $is_featured
            );
        }
    }

    /**
     * Stores uploaded vehicle documents in permanent storage.
     *
     * This function stores each document associated with the vehicle in a designated directory.
     * It also updates the vehicle's document records in the database.
     *
     * @param User $user The user uploading the documents.
     * @param Vehicle $vehicle The vehicle to which the documents belong.
     * @return void
     */
    private function storeVehicleDocuments(User $user, Vehicle $vehicle)
    {
        foreach ($this->documents as $document) {
            // Define the storage folder and filename
            $folder = 'users/' . toSlug($user->name, '-') . '-' . $user->id . '/vehicles/' . toSlug($vehicle->name) . '/documents';
            $filename = Str::random(40); // Generates a random 40-character string
            $extension = pathinfo($document['name'], PATHINFO_EXTENSION); // Get the file extension

            // Determine the storage path for the document
            $path = $document['path'];
            $storedPath = Storage::disk('public')->move($path, $folder . '/' . $filename. '.'. $extension);
    
            // Create a new attachment record for the document
            AttachmentController::create(
                $document['name'],
                $vehicle->name.'documents', // You can add a description if necessary
                '', // No encoded content since this is not an image
                $vehicle,
                $user,
                $storedPath,
                false // Documents don't have a featured flag
            );
        }
    }
    


    /**
     * Saves the vehicle and its related images and documents.
     *
     * Validates the form inputs, creates a new vehicle record, and stores associated images and documents.
     *
     * @return \Illuminate\Http\RedirectResponse Redirects to the vehicle index page with a success message.
     */
    public function saveVehicle()
    {
        $this->validate([
            'vin' => 'required|size:17', // Validate VIN (Vehicle Identification Number)
            'selectedVehicleType' => 'required', // Validate selected vehicle type
            'selectedVehicleSubType' => 'required', // Validate selected vehicle subtype
            // Additional validation rules as needed
        ]);

        // Create a new vehicle record
        $vehicle = new Vehicle();
        $vehicle->vin = $this->vin;
        $vehicle->type = $this->selectedVehicleType;
        $vehicle->sub_type = $this->selectedVehicleSubType;
        // Set other vehicle properties as needed

        $vehicle->save(); // Save the vehicle to the database

        // Store the vehicle images and documents
        $this->storeVehicleImages($this->getOwner(), $vehicle);
        $this->storeVehicleDocuments($this->getOwner(), $vehicle);

        // Flash a success message and redirect to the vehicle index page
        session()->flash('success', 'Vehicle created successfully.');
        return redirect()->route('admin.vehicles.index');
    }

    /**
     * Removes a file from the given array of files.
     *
     * This function handles both temporary and permanent storage deletion.
     * It first checks if the file is in temporary storage and deletes it if found.
     * If the file is not in temporary storage, it attempts to delete it from permanent storage.
     * Finally, it removes the file from the array.
     *
     * @param int $index The index of the file to be removed in the array.
     * @param array $files The array of files from which the file will be removed.
     * @return void
     */
    protected function removeFile($index, $files)
    {
        $file = $files[$index];

        // Check if the file is in temporary storage
        if (method_exists($file, 'getRealPath')) {
            $filePath = $file->getRealPath();

            // Delete the file from the temporary storage
            if (file_exists($filePath)) {
                unlink($filePath); // Delete the file
            }
        } else {
            // Handle permanent storage deletion if the image is already saved
            $filePath = $files[$index]->path; // Or another way to get the path
            if (Storage::exists($filePath)) {
                Storage::delete($filePath);
            }
        }

        // Remove the image from the array
        array_splice($files, $index, 1);
    }

    /**
     * Removes a file from the provided list of files.
     *
     * This function deletes the file at the specified index from either temporary or permanent storage,
     * and then removes the file from the provided array of files.
     *
     * @param int $index The index of the file to be removed in the files array.
     * @param array $files The array of files from which the file will be removed.
     * @return void
     */
    protected function removeFiles($index, $files)
    {
        $this->deleteFile($files);
        $this->unsetFile($index, $files);
    }

    /**
     * Deletes a file from either temporary or permanent storage.
     *
     * This function checks if the file is in temporary storage and deletes it if found.
     * If the file is not in temporary storage, it attempts to delete it from permanent storage.
     *
     * @param mixed $file The file to be deleted. This can be an object with a method `getRealPath` for temporary files,
     *                    or an object with a `path` property for files in permanent storage.
     * @return void
     */
    protected function deleteFile($file)
    {
        // Check if the file is in temporary storage
        if (method_exists($file, 'getRealPath')) {
            $filePath = $file->getRealPath();

            // Delete the file from the temporary storage
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        } else {
            // Handle permanent storage deletion if the file is already saved
            $filePath = $file->path; // Adjust based on how you store the file path
            if (Storage::exists($filePath)) {
                Storage::delete($filePath);
            }
        }
    }

    /**
     * Removes a file from the provided list of files at the specified index.
     *
     * This function modifies the provided array of files by removing the file at the given index.
     *
     * @param int $index The index of the file to be removed in the files array.
     * @param array $files The array of files from which the file will be removed.
     * @return void
     */
    protected function unsetFile(&$array, $index)
    {
        array_splice($array, $index, 1);
    }

    /**
     * Renders the Livewire component view.
     *
     * @return \Illuminate\View\View The rendered view.
     */
    public function render()
    {
        $users = User::search('name', $this->userSearch)
                     ->where('role', 'owner')
                     ->paginate($this->usersPerPage);

        return view(
            'admin.resources.vehicle.create',
            [
                'users' => $users,
            ]
        )->layout('layouts.admin');
    }
}
