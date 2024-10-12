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
    public $vits = [];
    public $vehicleTypes = [];
    public $vehicleSubTypes = [];
    public $selectedVehicleSubType;
    public $selectedVehicleType;
    public $vehicleDetails = [];

    // Basic Vehicle Information
    public $name = '';  // Name of the vehicle
    public $slug = '';  // Unique slug for the vehicle
    public $vit = '';  // Vehicle identification type (e.g., VIN, HIN, etc.)
    public $vin = '';  // Vehicle identification number
    public $description = '';  // Description of the vehicle
    public $rating = 0;  // Rating of the vehicle
    public $price = 0;  // Price of the vehicle
    public $status = '';  // Status of the vehicle (e.g., active, inactive, etc.)

    // Location Information
    public $location_city = '';  // City where the vehicle is located
    public $location_state = '';  // State where the vehicle is located
    public $location_country = '';  // Country where the vehicle is located

    // Vehicle Details
    public $type = '';  // Vehicle type (e.g., car, motorcycle, etc.)
    public $make = '';  // Make of the vehicle (e.g., Toyota, Honda, etc.)
    public $manufacturer = '';  // Manufacturer of the vehicle
    public $model = '';  // Model of the vehicle (e.g., Camry, Accord, etc.)
    public $year = '';  // Year of manufacture

    // Exterior Details
    public $exterior_color = '';  // Exterior color of the vehicle
    public $exterior_type = '';  // Type of exterior (e.g., Sedan, Convertible, etc.)
    public $exterior_doors = 0;  // Number of doors
    public $exterior_windows = '';  // Type of windows (e.g., Power, Manual, etc.)

    // Interior Details
    public $interior_seats = 0;  // Number of seats
    public $interior_upholstery = '';  // Upholstery type (e.g., Leather, Fabric, etc.)
    public $interior_color = '';  // Interior color
    public $interior_ac = '';  // Air conditioning availability
    public $interior_heater = '';  // Heater availability

    // Dimensions
    public $dimensions_length = '';  // Length of the vehicle
    public $dimensions_width = '';  // Width of the vehicle
    public $dimensions_height = '';  // Height of the vehicle

    // Engine Details
    public $engine_size = '';  // Engine size (e.g., 2.5L)
    public $engine_hp = '';  // Horsepower of the engine
    public $engine_type = '';  // Type of engine (e.g., Inline-4, V6, etc.)

    // Transmission Details
    public $transmission_type = '';  // Transmission type (e.g., Automatic, Manual, etc.)
    public $transmission_gear_ratio = '';  // Gear ratio
    public $transmission_gears = 0;  // Number of gears
    public $transmission_oil = '';  // Oil type used in transmission
    public $transmission_drivetrain = '';  // Drivetrain type (e.g., FWD, AWD, etc.)

    // Fuel Details
    public $fuel_type = '';  // Fuel type (e.g., Gasoline, Diesel, etc.)
    public $fuel_economy = '';  // Fuel economy (e.g., 28 city / 39 highway)

    // Modifications
    public $modifications_performance = '';  // Performance modifications (e.g., Turbo, Exhaust, etc.)
    public $modifications_aesthetic = '';  // Aesthetic modifications (e.g., Custom rims)
    public $modifications_interior = '';  // Interior modifications (e.g., LED lighting)

    // Security Features
    public $security_auto_lock = '';  // Auto lock availability
    public $security_alarm_system = '';  // Alarm system availability
    public $security_tracking_system = '';  // Tracking system availability

    // Safety Features
    public $safety_airbags = '';  // Airbags availability
    public $safety_emergency_braking = '';  // Emergency braking system availability

    // Service Information
    public $service_status = '';  // Service status (e.g., serviced, in service, etc.)
    public $last_service_date = '';  // Last service date
    public $last_inspection_date = '';  // Last inspection date

    // Faults
    public $faults = '';  // Any faults with the vehicle (e.g., brakes, tires, etc.)

    // Insurance Information
    public $insurance_provider = '';  // Insurance provider
    public $insurance_policy_number = '';  // Insurance policy number
    public $insurance_coverage = '';  // Type of coverage (e.g., Full, Third-party, etc.)
    public $insurance_expiry_date = '';  // Expiry date of the insurance

    // Chauffeur Information
    public $chauffeur_name = '';  // Name of the chauffeur
    public $chauffeur_license_number = '';  // Chauffeur's license number
    public $chauffeur_availability = '';  // Availability of the chauffeur (e.g., Full-time, Part-time)


    // Images for the vehicle
    public $images = [];
    public $newImages = [];
    public $imageErrorMessage = [];
    public $featuredImageIndex = 0;

    // Vehicle documents
    public $documents = [];
    public $newDocuments = [];
    public $documentErrorMessages = [];

    // Upload progress
    public $uploadProgress = 0;

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
            elseif ($newImage->getSize() > 1024 * 1024 * 4) {
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
            $encodedImage = AttachmentCompressController::image($image, 'webp', 80);

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
            $storedPath = Storage::disk('public')->move($path, $folder . '/' . $filename . '.' . $extension);

            // Create a new attachment record for the document
            AttachmentController::create(
                $document['name'],
                $vehicle->name . 'documents', // You can add a description if necessary
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
    public function storeVehicle()
    {
        $this->validate([
            'vin' => 'required|size:17', // Validate VIN (Vehicle Identification Number)
            'selectedVehicleType' => 'required', // Validate selected vehicle type
            'selectedVehicleSubType' => 'required', // Validate selected vehicle subtype
            // Additional validation rules as needed
        ]);

        // Create a new vehicle record

        $vehicle = Vehicle::create([
            'name' => '',
            'slug' => '',
            'vin' => json_encode([
                'type' => $this->vit,
                'number' => $this->vin,
            ]),
            'description' => 'A reliable mid-size sedan with excellent fuel economy and a comfortable interior.',
            'rating' => 4.5,
            'price' => json_encode([
                'currency' => 'NGN',
                'amount' => $this->price,
            ]),
            'status' => $this->status,
            'location' => json_encode([
                'city' => 'Los Angeles',
                'state' => 'California',
                'country' => 'USA',
            ]),
            'details' => json_encode([
                'type' => $this->type,
                'make' => $this->make,
                'manufacturer' => $this->manufacturer,
                'model' => $this->model,
                'year' => $this->year,
                'exterior' => [
                    'color' => $this->exterior_color,
                    'type' => $this->exterior_type,
                    'doors' => $this->exterior_doors,
                    'windows' => $this->exterior_windows,
                ],
                'interior' => [
                    'seats' => $this->interior_seats,
                    'upholstery' => $this->interior_upholstery,
                    'color' => $this->interior_color,
                    'ac' => $this->interior_ac,
                    'heater' => $this->interior_heater,
                ],
                'dimensions' => [
                    'length' => $this->dimensions_length,
                    'width' => $this->dimensions_width,
                    'height' => $this->dimensions_height,
                ],
                'engine' => [
                    'size' => $this->engine_size,
                    'hp' => $this->engine_hp,
                    'type' => $this->engine_type,
                ],
                'transmission' => [
                    'type' => $this->transmission_type,
                    'gear_ratio' => $this->transmission_gear_ratio,
                    'gears' => $this->transmission_gears,
                    'oil' => $this->transmission_oil,
                    'drivetrain' => $this->transmission_drivetrain,
                ],
                'fuel' => [
                    'type' => $this->fuel_type,
                    'economy' => $this->fuel_economy,
                ],
                'modifications' => [
                    'performance' => $this->modifications_performance,
                    'aesthetic' => $this->modifications_aesthetic,
                    'interior' => $this->modifications_interior,
                ],
                'security' => [
                    'auto_lock' => $this->security_auto_lock,
                    'alarm_system' => $this->security_alarm_system,
                    'tracking_system' => $this->security_tracking_system,
                ],
                'safety' => [
                    'airbags' => $this->safety_airbags,
                    'emergency_braking' => $this->safety_emergency_braking,
                ],
                'service' => [
                    'status' => $this->service_status,
                    'last_service_date' => $this->last_service_date,
                    'last_inspection_date' => $this->last_inspection_date,
                ],
                'faults' => $this->faults,
            ]),
            'insurance' => json_encode([
                'provider' => $this->insurance_provider,
                'policy_number' => $this->insurance_policy_number,
                'coverage' => $this->insurance_coverage,
                'expiry_date' => $this->insurance_expiry_date,
            ]),
            'chauffeur' => json_encode([
                'name' => $this->chauffeur_name,
                'license_number' => $this->chauffeur_license_number,
                'availability' => $this->chauffeur_availability,
            ]),
            'ownerable_id' => $this->getOwner()->id,
            'ownerable_type' => get_class($this->getOwner()),
        ]);
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
            'admin.resources.vehicles.create',
            [
                'users' => $users,
            ]
        )->layout('layouts.admin');
    }
}
