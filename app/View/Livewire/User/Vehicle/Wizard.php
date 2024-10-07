<?php

namespace App\View\Livewire\User\Vehicle;

use App\Http\Controllers\Attachments\AttachmentUploadController;
use App\Models\Admin;
use App\Models\User;
use App\Models\Vehicle;
use App\Traits\WithSteps;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Wizard extends Component
{
    use WithSteps, WithFileUploads;

    public $user;
    public $vehicleTypes = [];
    public $vits = [];

    public $files = [];

    public $images = [
        'newUploads' => [],
        'featuredIndex' => 0,
        'uploaded' => [],
        'errors' => [],
    ];

    public $proofOfOwnership = [];
    public $registration = [];
    public $insurance = [];


    public function mount()
    {
        $this->user = getUser();
        $this->defineSteps();
        $this->defineStore();
        // Load existing data if available (e.g., from JSON file)
        $this->vehicleTypes = Vehicle::types(); // Fetch vehicle types
        $this->vits = Vehicle::$vits; // Fetch vehicle subtypes

        // Load file details from the Stored Data file
        $this->files = $this->getStoredData()['files'] ?? [];
        $this->images['uploaded'] = $this->files['images'] ?? [];
        $this->proofOfOwnership['uploaded'] = $this->files['proof_of_ownership'] ?? [];
        $this->registration['uploaded'] = $this->files['registration'] ?? [];
        $this->insurance['uploaded'] = $this->files['insurance'] ?? [];
        // Get featured Image index from the Stored Data file
        $this->storeData['featured_image_index'] = $this->images['featuredIndex'];
    }

    protected function rulesForStep()
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
                    'storeData.details.description' => 'min:60|max:900|required|string',
                    'storeData.details.vin.type' => 'required|string|in:' . implode(',', array_keys($this->vits)),
                    'storeData.details.vin.number' => 'required|string|min:5|max:40',
                    'storeData.details.make' => 'required|string',
                    'storeData.details.manufacturer' => 'required|string',
                    'storeData.details.model' => 'required|string',
                    'storeData.details.year' => 'required|integer|min:1900|max:' . date('Y'),
                    'storeData.location.*.full' => [
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
                ];

                $names = [
                    'storeData.name' => 'name',
                    'storeData.details.description' => 'description',
                    'storeData.details.vin.type' => 'Identification Type',
                    'storeData.details.vin.number' => 'Identification Number',
                    'storeData.details.make' => 'make',
                    'storeData.details.manufacturer' => 'manufacturer',
                    'storeData.details.model' => 'model',
                    'storeData.details.year' => 'year',
                    'storeData.location' => 'location',
                ];
                break;
            case 2:
                // Validation rules for step 2
                $rules = [
                    'storeData.details.exterior.color' => 'required|string|max:50',
                    'storeData.details.exterior.type' => 'required|string|max:50',
                    'storeData.details.exterior.doors' => 'required|integer|min:0|max:6',
                    'storeData.details.exterior.windows' => 'required|integer|min:0|max:6',
                    'storeData.details.interior.color' => 'required|string|max:50',
                    'storeData.details.interior.seats' => 'required|integer|min:1|max:10',
                    'storeData.details.interior.upholstery' => 'required|string|in:leather,fabric,vinyl,suede,alcantara',
                    'storeData.details.interior.ac' => 'required|string|in:yes,no',
                    'storeData.details.interior.heater' => 'required|string|in:yes,no',
                ];

                $names = [
                    'storeData.details.exterior.color' => 'Color',
                    'storeData.details.exterior.type' => 'Type',
                    'storeData.details.exterior.doors' => 'Doors',
                    'storeData.details.exterior.windows' => 'Windows',
                    'storeData.details.interior.color' => 'Color',
                    'storeData.details.interior.seats' => 'Seats',
                    'storeData.details.interior.upholstery' => 'Upholstery',
                    'storeData.details.interior.ac' => 'AC',
                    'storeData.details.interior.heater' => 'Heater',
                ];
                break;
            case 3:
                // Validation rules for step 3
                $rules = [
                    'storeData.details.engine.type' => 'required|string',
                    'storeData.details.engine.size' => 'required|string',
                    'storeData.details.engine.hp' => 'required|numeric',
                    'storeData.details.fuel.type' => 'required|string',
                    'storeData.details.fuel.economy' => 'required|string',
                    'storeData.details.transmission.type' => 'required|string',
                    'storeData.details.transmission.gears' => 'required|integer',
                    'storeData.details.transmission.drivetrain' => 'required|string',
                ];

                $names = [
                    'storeData.details.engine.type' => 'engine type',
                    'storeData.details.engine.size' => 'engine size',
                    'storeData.details.engine.hp' => 'engine horsepower',
                    'storeData.details.fuel.type' => 'fuel type',
                    'storeData.details.fuel.economy' => 'fuel economy',
                    'storeData.details.transmission.type' => 'transmission',
                    'storeData.details.transmission.gears' => 'gears',
                    'storeData.details.transmission.drivetrain' => 'drivetrain',
                ];
                break;
            case 4:
                // Validation rules for step 4 (KYC)
                $rules = [
                    // 'storeData.details.safety.abs' => 'required|string|in:yes,no',
                    // 'storeData.details.safety.traction_control' => 'required|string|in:yes,no',
                    // 'storeData.details.safety.stability_control' => 'required|string|in:yes,no',
                    // 'storeData.details.safety.lane_departure_warning' => 'required|string|in:yes,no',
                    // 'storeData.details.safety.lane_keeping_assist' => 'required|string|in:yes,no',
                    // 'storeData.details.safety.adaptive_cruise_control' => 'required|string|in:yes,no',
                    // 'storeData.details.safety.blind_spot_monitoring' => 'required|string|in:yes,no',
                    // 'storeData.details.safety.forward_collision_warning' => 'required|string|in:yes,no',
                    // 'storeData.details.safety.automatic_emergency_braking' => 'required|string|in:yes,no',
                    // 'storeData.details.safety.rear_cross_traffic_alert' => 'required|string|in:yes,no',
                    // 'storeData.details.safety.parking_sensors' => 'required|string|in:yes,no',
                    // 'storeData.details.safety.camera_360' => 'required|string|in:yes,no',
                    // 'storeData.details.safety.driver_attention_monitor' => 'required|string|in:yes,no',
                    // 'storeData.details.safety.tire_pressure_monitor' => 'required|string|in:yes,no',
                    // 'storeData.details.safety.airbags' => 'required|string|in:front,front & sides,front, sides & curtain',
                    // 'storeData.details.safety.seat_belt_pretensioners' => 'required|string|in:yes,no',
                    // 'storeData.details.safety.crumple_zones' => 'required|string|in:yes,no',
                    // 'storeData.details.safety.isofix_mounts' => 'required|string|in:yes,no',
                    // 'storeData.details.security.alarm_system' => 'required|string|in:yes,no',
                    // 'storeData.details.security.immobilizer' => 'required|string|in:yes,no',
                    // 'storeData.details.security.remote_central_locking' => 'required|string|in:yes,no',
                    // 'storeData.details.security.gps_tracking' => 'required|string|in:yes,no',
                ];

                $names = [
                    'storeData.details.safety.abs' => 'ABS',
                    'storeData.details.safety.traction_control' => 'traction control',
                    'storeData.details.safety.stability_control' => 'stability control',
                    'storeData.details.safety.lane_departure_warning' => 'lane departure warning',
                    'storeData.details.safety.lane_keeping_assist' => 'lane keeping assist',
                    'storeData.details.safety.adaptive_cruise_control' => 'adaptive cruise control',
                    'storeData.details.safety.blind_spot_monitoring' => 'blind spot monitoring',
                    'storeData.details.safety.forward_collision_warning' => 'forward collision warning',
                    'storeData.details.safety.automatic_emergency_braking' => 'automatic emergency braking',
                    'storeData.details.safety.rear_cross_traffic_alert' => 'rear cross traffic alert',
                    'storeData.details.safety.parking_sensors' => 'parking sensors',
                    'storeData.details.safety.camera_360' => '360-degree camera',
                    'storeData.details.safety.driver_attention_monitor' => 'driver attention monitor',
                    'storeData.details.safety.tire_pressure_monitor' => 'tire pressure monitor',
                    'storeData.details.safety.airbags' => 'airbags',
                    'storeData.details.safety.seat_belt_pretensioners' => 'seat belt pretensioners',
                    'storeData.details.safety.crumple_zones' => 'crumple zones',
                    'storeData.details.safety.isofix_mounts' => 'ISOFIX mounts',
                    'storeData.details.security.alarm_system' => 'alarm system',
                    'storeData.details.security.immobilizer' => 'immobilizer',
                    'storeData.details.security.remote_central_locking' => 'remote central locking',
                    'storeData.details.security.gps_tracking' => 'GPS tracking',
                ];
                break;
            default:
                break;
        }

        return ['rules' => $rules, 'messages' => $messages, 'names' => $names];
    }


    /**
     * Handle the upload and validation of multiple image files.
     *
     * @return void
     */
    public function updatedImages()
    {
        // Validate each new image
        foreach ($this->images['newUploads'] as $newImage) {
            $fileName = $newImage->getClientOriginalName(); // Get original file name
            $error = '';

            // Validate if the file is a valid image
            if (strpos($newImage->getMimeType(), 'image/') === false) {
                $error = "The file " . $fileName . " is not a valid image.";
            }
            // Validate the file size (1MB limit)
            elseif ($newImage->getSize() > 1024 * 1024 * 4) {
                $error = "The file " . $fileName . " exceeds the maximum size of 2MB.";
            }
            // Check if the image already exists
            else {
                $imageHash = md5_file($newImage->getRealPath()); // Generate image hash

                $alreadyExists = false;
                foreach ($this->images['uploaded'] as $image) {
                    if ($image['hash'] === $imageHash) {
                        $alreadyExists = true;
                        break;
                    }
                }

                if ($alreadyExists) {
                    $error = "The image " . $fileName . " already exists.";
                } else {

                    $filePath = $newImage->store("tmp", 'public');

                    if (!isset($this->storeData['files']['images'])) {
                        $this->storeData['files']['images'] = [];
                    }

                    // Save file details to the JSON file
                    $this->storeData['files']['images'][] = [
                        'path' => $filePath,
                        'mime_type' => $newImage->getMimeType(),
                        'size' => $newImage->getSize(),
                        'hash' => $imageHash
                    ];

                    $this->deleteFile($newImage);
                    Storage::put($this->storePath, json_encode($this->storeData));

                    $this->images['uploaded'] = $this->storeData['files']['images']; // Add image to the images array
                }
            }

            // Add the error to the error message array if not already present
            if ($error && !in_array($error, $this->images['errors'])) {
                $this->images['errors'][] = $error;
            }
        }

        // Dispatch a notification with all aggregated errors
        $this->dispatch('notify', implode('<br>', $this->images['errors']), 'warning');

        // Clear the temporary images['new'] property
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
        $files = $this->images['uploaded']; // Get the images array
        $filePath = Storage::path('public/' . $files[$index]['path']); // Get the file path

        if (file_exists($filePath)) {
            unlink($filePath); // Delete the file from storage
        }
        array_splice($files, $index, 1);
        $this->images['uploaded'] = $files; // Update the images array in the storeData property
        $this->storeData['files']['images'] = $this->images['uploaded']; // Update the images array in the storeData property
        Storage::put($this->storePath, json_encode($this->storeData));
    }

    /**
     * Handle the update and validation of a file.
     *
     * This function validates the newly uploaded file, resets the file input,
     * and reinitializes the uploaded file data.
     *
     * @param string $type The type of file being updated (e.g., 'registration', 'insurance', 'proofOfOwnership').
     * @param string $label The label for the file type used in validation messages.
     * @return void
     */
    public function updatedFile($type, $label)
    {
        // Validate the file
        $this->validate(
            ["{$type}.new" => 'required|file|max:1024'],
            [],
            ["{$type}.new" => $label]
        );

        $path = $this->{$type}['uploaded']['path'] ?? null;
        $new = $this->{$type}['new'] ?? null;

        // Optionally reset file input
        $this->reset($type);
        $this->{$type}['new'] = [];

        // Reinitialize the uploaded file data
        $this->{$type}['uploaded'] = $this->uploadFile($type, $new, $path);
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
        $this->updatedFile('proofOfOwnership', 'Proof Of Ownership');
    }

    public function submit()
    {
        $data = $this->storeData;
        $user = $this->user;
        // make user the default chauffeur if not provided and the chauffeur if none is found
        $defaultChauffeur = [
            'name' => $user->name,
            'phone' => [
                'home' => formatPhone($user->phone, type: 'home'),
                'work' => formatPhone($user->phone, type: 'work')
            ],
            'email' => $user->email
        ];
        // set currency if none is set
        isset($data['price']['currency']) ?:  $data['price']['currency']  = app_currency(false);
        // Set the default chauffeur if none is provided
        $chauffeur = isset($data['has_chauffeur']) ? $data['chauffeur'] : $defaultChauffeur;

        // Ensure the name is constructed correctly
        $vehicleName = trim($data['details']['make'] . ' ' . $data['details']['model'] . ' ' . $data['details']['year']);

        // Final submission: Create the vehicle in the database
        $vehicle = new Vehicle([
            'name' => $vehicleName,
            'price' => $data['price'],
            'status' => 'pending',
            'location' => $data['location'],
            'details' => $data['details'],
            'insurance' => $data['insurance'],
            'chauffeur' => $chauffeur,
        ]);
        // Use the associate method to automatically handle ownerable_id and ownerable_type
        $vehicle->ownerable()->associate($user);
        $this->saveAttachments($user, $vehicle);
        $vehicle->save();

        // Clear the stored data after submission
        //Storage::delete("Users/" . getUser()->id . "/vehicle.json");

        // Redirect or reset after successful submission
        return redirect()->route('vehicles.index');
    }


    protected function saveAttachments(User|Admin $user, Vehicle $vehicle)
    {
        // Get the upload files details using the function because the variable data is not updated at this point
        $files = $this->getStoredData()['files'];

        foreach ($files['images'] as $index => $image) {
            // Generate a unique hash name for the image
            $hashName = Str::random(40);

            if (isset($image['path']) && Storage::exists('public/'. $image['path'])) {
                // get the featured image using the featured index
                $featured = $index === $this->images['featuredIndex'] ? true : false;
                // Generate the image name ans description.
                $name = $vehicle->name . '\'s Gallery Image ' . numberToWords($index);
                $description = $user->name . '\'s ' . numberToWords($index, true) . " Gallery Image of {$vehicle->name} - {$vehicle->description}";
                $resize = [
                    'width' => 2880,
                    'height' => 1400,
                    'type' => 'resize',
                ];
                // Save the image to the storage, update the user profile image and attach it with the user Via attachable
                AttachmentUploadController::Image(
                    name: $name,
                    description: $description,
                    image: Storage::path('public/' . $image['path']),
                    mimeType: $image['mime_type'],
                    is_featured: $featured,
                    resize: $resize,
                    quality: 90,
                    authorable: $user,
                    attachable: $vehicle,
                    path: 'public/vehicles/' . $vehicle->id . '/' . $hashName . '.webp',
                );

                // Delete the uploaded photo after saving it to the storage
                Storage::delete('public/' . $image['path']);
                unset($this->storeData['files']['images'][$index]);
            }
        }
        foreach ($files as $key => $file) {
            // Save uploaded files to the storage and attach them with the user Via attachable
            if ($key !== 'images' && isset($file['path']) && Storage::exists('public/'. $file['path'])) {

                $storagePath = getUserStorage('private', $user->id) . 'documents/vehicles/' . $vehicle->id;
                $mime_type = $file['mime_type'];
                $path = str_contains($mime_type, 'image') ? $storagePath . $key . '.webp' : $storagePath . $key . '.pdf';
                $docName = $this->getDocName($key) . ' for ' . $vehicle->name;
                $docDesc = $user->name . '\'s ' . $docName;

                // Save the document to the storage and attach it with the user Via attachable
                AttachmentUploadController::file(
                    name: $docName,
                    description: $docDesc,
                    file: Storage::path('public/' . $file['path']),
                    mimeType: $mime_type,
                    is_featured: true,
                    quality: 90,
                    authorable: $user,
                    attachable: $user,
                    path: $path,
                );

                // Delete the uploaded file after saving it to the storage
                Storage::delete('public/' . $file['path']);
                unset($this->storeData['files'][$key]);
            }
            // Update the stored data after saving files to the designated storages
            $this->putData($this->storeData);
        }
    }

    /**
     * Get the document name based on the document type.
     *
     * @param string $docType The type of the document.
     * @return string The name of the document.
     */
    protected function getDocName(string $fileType): string
    {
        $fileNames = [
            'images' => 'Gallery Images',
            'insurance' => 'Insurance Document',
            'registration' => 'Vehicle Registration',
            'proof_of_ownership' => 'Proof of Ownership',
            // Add more document types and their corresponding names as needed
        ];

        return $fileNames[$fileType] ?? 'Vehicle File';
    }

    /**
     * Initializes the steps for the vehicle wizard process.
     *
     * This function sets up the step names and calculates the total number of steps
     * required for the vehicle wizard. Each step corresponds to a specific part of
     * the vehicle information and submission process.
     *
     * @return void
     */
    public function defineSteps()
    {
        $this->stepNames = [
            0 => 'Introduction',
            1 => 'Vehicle Information',
            2 => 'Vehicle Details',
            3 => 'Engine & Transmission',
            4 => 'Safety, Security & Service',
            5 => 'Faults & Modifications',
            6 => 'Vehicle Images',
            7 => 'Vehicle Documents',
            8 => 'Price ',
            9 => 'Review & Submit',
        ];
        $this->totalSteps = count($this->stepNames) - 1;
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
        $this->storePath = getUserStorage('private') . "/data/vehicle.json";
        $this->storeData = $this->getStoredData() ?? $this->storeData;
        $this->currentStep = $this->storeData['current_step'] ?? 0;
    }

    /**
     * Renders the vehicle wizard view.
     *
     * This function prepares and returns the view for the vehicle wizard,
     * including the current step information and navigation prefixes.
     *
     * @return \Illuminate\View\View The view for the vehicle wizard with layout.
     */
    public function render()
    {
        return view(
            'user.vehicle.wizard',
            [
                'prevStepName' => $this->getPrevStepName(),
                'nextStepName' => $this->getNextStepName(),
                'currentStepName' => $this->getStepName($this->currentStep),
                'currentStep' => $this->updateCurrentStep(),
                'nextPrefix' => 'next-',
                'prevPrefix' => 'prev-',
            ]
        )->layout('layouts.user');
    }
}
