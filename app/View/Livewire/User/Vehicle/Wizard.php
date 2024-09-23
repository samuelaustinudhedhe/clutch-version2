<?php

namespace App\View\Livewire\User\Vehicle;

use App\Models\Vehicle;
use App\Traits\WithSteps;
use Illuminate\Support\Facades\Storage;

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

        if (!isset($this->storeData['featured_image_index'])) {
            $this->storeData['featured_image_index'] = '';
        }

        $this->storeData['featured_image_index'] = $this->images['featuredIndex'];
    }

    public function attachToNextStep()
    {
        $this->store();
        $validationData = $this->rulesForStep();
        if ($validationData['rules']) {
            $this->validate($validationData['rules'], [], $validationData['customAttributes']);
        }
    }

    protected function rulesForStep()
    {
        $rules = [];
        $customAttributes = [];

        switch ($this->currentStep) {
            case 0:
                // Validation rules for step 0
                break;
            case 1:
                $rules = [
                    'storeData.description' => 'min:60|max:900|required|string',
                    'storeData.vit' => 'required|string|in:' . implode(',', array_keys($this->vits)),
                    'storeData.vin' => 'required|string|min:5|max:40',
                    'storeData.make' => 'required|string',
                    'storeData.manufacturer' => 'required|string',
                    'storeData.model' => 'required|string',
                    'storeData.year' => 'required|integer|min:1900|max:' . date('Y'),
                    'storeData.location.full' => [
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

                $customAttributes = [
                    'storeData.name' => 'name',
                    'storeData.description' => 'description',
                    'storeData.vit' => 'Identification Type',
                    'storeData.vin' => 'Identification Number',
                    'storeData.make' => 'make',
                    'storeData.manufacturer' => 'manufacturer',
                    'storeData.model' => 'model',
                    'storeData.year' => 'year',
                    'storeData.location' => 'location',
                ];
                break;
            case 2:
                // Validation rules for step 2
                $rules = [
                    'storeData.exterior.color' => 'required|string|max:50',
                    'storeData.exterior.type' => 'required|string|max:50',
                    'storeData.exterior.doors' => 'required|integer|min:0|max:6',
                    'storeData.exterior.windows' => 'required|integer|min:0|max:6',
                    'storeData.interior.color' => 'required|string|max:50',
                    'storeData.interior.seats' => 'required|integer|min:1|max:10',
                    'storeData.interior.upholstery' => 'required|string|in:leather,fabric,vinyl,suede,alcantara',
                    'storeData.interior.ac' => 'required|string|in:yes,no',
                    'storeData.interior.heater' => 'required|string|in:yes,no',
                ];

                $customAttributes = [
                    'storeData.exterior.color' => 'Color',
                    'storeData.exterior.type' => 'Type',
                    'storeData.exterior.doors' => 'Doors',
                    'storeData.exterior.windows' => 'Windows',
                    'storeData.interior.color' => 'Color',
                    'storeData.interior.seats' => 'Seats',
                    'storeData.interior.upholstery' => 'Upholstery',
                    'storeData.interior.ac' => 'AC',
                    'storeData.interior.heater' => 'Heater',
                ];
                break;
            case 3:
                // Validation rules for step 3
                $rules = [
                    'storeData.engine.type' => 'required|string',
                    'storeData.engine.size' => 'required|string',
                    'storeData.engine.hp' => 'required|numeric',
                    'storeData.fuel.type' => 'required|string',
                    'storeData.fuel.economy' => 'required|string',
                    'storeData.transmission.type' => 'required|string',
                    'storeData.transmission.gears' => 'required|integer',
                    'storeData.transmission.drivetrain' => 'required|string',
                ];

                $customAttributes = [
                    'storeData.engine.type' => 'engine type',
                    'storeData.engine.size' => 'engine size',
                    'storeData.engine.hp' => 'engine horsepower',
                    'storeData.fuel.type' => 'fuel type',
                    'storeData.fuel.economy' => 'fuel economy',
                    'storeData.transmission.type' => 'transmission',
                    'storeData.transmission.gears' => 'gears',
                    'storeData.transmission.drivetrain' => 'drivetrain',
                ];
                break;
            case 4:
                // Validation rules for step 4 (KYC)
                $rules = [
                    // 'storeData.safety.abs' => 'required|string|in:yes,no',
                    // 'storeData.safety.traction_control' => 'required|string|in:yes,no',
                    // 'storeData.safety.stability_control' => 'required|string|in:yes,no',
                    // 'storeData.safety.lane_departure_warning' => 'required|string|in:yes,no',
                    // 'storeData.safety.lane_keeping_assist' => 'required|string|in:yes,no',
                    // 'storeData.safety.adaptive_cruise_control' => 'required|string|in:yes,no',
                    // 'storeData.safety.blind_spot_monitoring' => 'required|string|in:yes,no',
                    // 'storeData.safety.forward_collision_warning' => 'required|string|in:yes,no',
                    // 'storeData.safety.automatic_emergency_braking' => 'required|string|in:yes,no',
                    // 'storeData.safety.rear_cross_traffic_alert' => 'required|string|in:yes,no',
                    // 'storeData.safety.parking_sensors' => 'required|string|in:yes,no',
                    // 'storeData.safety.camera_360' => 'required|string|in:yes,no',
                    // 'storeData.safety.driver_attention_monitor' => 'required|string|in:yes,no',
                    // 'storeData.safety.tire_pressure_monitor' => 'required|string|in:yes,no',
                    // 'storeData.safety.airbags' => 'required|string|in:front,front & sides,front, sides & curtain',
                    // 'storeData.safety.seat_belt_pretensioners' => 'required|string|in:yes,no',
                    // 'storeData.safety.crumple_zones' => 'required|string|in:yes,no',
                    // 'storeData.safety.isofix_mounts' => 'required|string|in:yes,no',
                    // 'storeData.security.alarm_system' => 'required|string|in:yes,no',
                    // 'storeData.security.immobilizer' => 'required|string|in:yes,no',
                    // 'storeData.security.remote_central_locking' => 'required|string|in:yes,no',
                    // 'storeData.security.gps_tracking' => 'required|string|in:yes,no',
                ];

                $customAttributes = [
                    'storeData.safety.abs' => 'ABS',
                    'storeData.safety.traction_control' => 'traction control',
                    'storeData.safety.stability_control' => 'stability control',
                    'storeData.safety.lane_departure_warning' => 'lane departure warning',
                    'storeData.safety.lane_keeping_assist' => 'lane keeping assist',
                    'storeData.safety.adaptive_cruise_control' => 'adaptive cruise control',
                    'storeData.safety.blind_spot_monitoring' => 'blind spot monitoring',
                    'storeData.safety.forward_collision_warning' => 'forward collision warning',
                    'storeData.safety.automatic_emergency_braking' => 'automatic emergency braking',
                    'storeData.safety.rear_cross_traffic_alert' => 'rear cross traffic alert',
                    'storeData.safety.parking_sensors' => 'parking sensors',
                    'storeData.safety.camera_360' => '360-degree camera',
                    'storeData.safety.driver_attention_monitor' => 'driver attention monitor',
                    'storeData.safety.tire_pressure_monitor' => 'tire pressure monitor',
                    'storeData.safety.airbags' => 'airbags',
                    'storeData.safety.seat_belt_pretensioners' => 'seat belt pretensioners',
                    'storeData.safety.crumple_zones' => 'crumple zones',
                    'storeData.safety.isofix_mounts' => 'ISOFIX mounts',
                    'storeData.security.alarm_system' => 'alarm system',
                    'storeData.security.immobilizer' => 'immobilizer',
                    'storeData.security.remote_central_locking' => 'remote central locking',
                    'storeData.security.gps_tracking' => 'GPS tracking',
                ];
                break;
            default:
                break;
        }

        return ['rules' => $rules, 'customAttributes' => $customAttributes];
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
            if (getimagesize($newImage->getRealPath()) === false) {
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
     * Handle the upload and validation of the National Identification Number (NIN) file.
     *
     * @return void
     */
    public function updatedRegistration()
    {
        // Validate the file
        $this->validate([
            'registration.new' => 'required|file|max:3072', // Adjust rules as needed
        ]);

        $path = $this->registration['path'] ?? null;
        $new = $this->registration['new'] ?? null;

        $this->registration['uploaded'] = $this->uploadFile('registrationistration', $new, $path);
        // Optionally reset file input
        // $this->reset('nin');
    }

    /**
     * Handle the upload and validation of the international passport file.
     *
     * @return void
     */
    public function updatedInsurance()
    {
        // Validate the file
        $this->validate([
            'insurance.new' => 'required|file|max:3072', // Adjust rules as needed
        ]);

        $path = $this->insurance['path'] ?? null;
        $new = $this->insurance['new'] ?? null;

        $this->insurance['uploaded'] = $this->uploadFile('insurance', $new, $path);
        // Optionally reset file input
        // $this->reset('insurance');
    }

    /**
     * Handle the upload and validation of the driver's license file.
     *
     * @return void
     */
    public function updatedProofOfOwnership()
    {
        // Validate the file
        $this->validate([
            'proofOfOwnership.new' => 'required|file|max:3072', // Adjust rules as needed
        ]);

        $path = $this->proofOfOwnership['path'] ?? null;
        $new = $this->proofOfOwnership['new'] ?? null;

        $this->proofOfOwnership['uploaded'] = $this->uploadFile('proof_of_ownership', $new, $path);
        // Optionally reset file input
        // $this->reset('proofOfOwnership');
    }




    public function submit()
    {
        // Final submission: Create the vehicle in the database

        $vehicle = Vehicle::create([
            'name' => $this->storeData['name'],
            'slug' => $this->storeData['slug'],
            'vin' => json_encode([
                'type' => $this->storeData['vin_type'],
                'number' => $this->storeData['vin_number'],
            ]),
            'description' => $this->storeData['description'],
            'rating' => $this->storeData['rating'],
            'price' => json_encode([
                'currency' => $this->storeData['price_currency'],
                'amount' => $this->storeData['price_amount'],
            ]),
            'status' => $this->storeData['status'],
            'location' => json_encode([
                'city' => $this->storeData['location_city'],
                'state' => $this->storeData['location_state'],
                'country' => $this->storeData['location_country'],
            ]),
            'details' => json_encode([
                'type' => $this->storeData['type'],
                'make' => $this->storeData['make'],
                'manufacturer' => $this->storeData['manufacturer'],
                'model' => $this->storeData['model'],
                'year' => $this->storeData['year'],
                'exterior' => [
                    'color' => $this->storeData['exterior_color'],
                    'type' => $this->storeData['exterior_type'],
                    'doors' => $this->storeData['exterior_doors'],
                    'windows' => $this->storeData['exterior_windows'],
                ],
                'interior' => [
                    'seats' => $this->storeData['interior_seats'],
                    'upholstery' => $this->storeData['interior_upholstery'],
                    'color' => $this->storeData['interior_color'],
                    'ac' => $this->storeData['interior_ac'],
                    'heater' => $this->storeData['interior_heater'],
                ],
                'dimensions' => [
                    'length' => $this->storeData['dimensions_length'],
                    'width' => $this->storeData['dimensions_width'],
                    'height' => $this->storeData['dimensions_height'],
                ],
                'engine' => [
                    'size' => $this->storeData['engine_size'],
                    'hp' => $this->storeData['engine_hp'],
                    'type' => $this->storeData['engine_type'],
                ],
                'transmission' => [
                    'type' => $this->storeData['transmission_type'],
                    'gear_ratio' => $this->storeData['transmission_gear_ratio'],
                    'gears' => $this->storeData['transmission_gears'],
                    'oil' => $this->storeData['transmission_oil'],
                    'drivetrain' => $this->storeData['transmission_drivetrain'],
                ],
                'fuel' => [
                    'type' => $this->storeData['fuel_type'],
                    'economy' => $this->storeData['fuel_economy'],
                ],
                'modifications' => [
                    'performance' => $this->storeData['modifications_performance'],
                    'aesthetic' => $this->storeData['modifications_aesthetic'],
                    'interior' => $this->storeData['modifications_interior'],
                ],
                'security' => [
                    'auto_lock' => $this->storeData['security_auto_lock'],
                    'alarm_system' => $this->storeData['security_alarm_system'],
                    'tracking_system' => $this->storeData['security_tracking_system'],
                ],
                'safety' => [
                    'airbags' => $this->storeData['safety_airbags'],
                    'emergency_braking' => $this->storeData['safety_emergency_braking'],
                ],
                'service' => [
                    'status' => $this->storeData['service_status'],
                    'last_service_date' => $this->storeData['last_service_date'],
                    'last_inspection_date' => $this->storeData['last_inspection_date'],
                ],
                'faults' => $this->storeData['faults'],
            ]),
            'insurance' => json_encode([
                'provider' => $this->storeData['insurance_provider'],
                'policy_number' => $this->storeData['insurance_policy_number'],
                'coverage' => $this->storeData['insurance_coverage'],
                'expiry_date' => $this->storeData['insurance_expiry_date'],
            ]),
            'chauffeur' => json_encode([
                'name' => $this->storeData['chauffeur_name'],
                'license_number' => $this->storeData['chauffeur_license_number'],
                'availability' => $this->storeData['chauffeur_availability'],
            ]),
            'ownerable_id' => $this->getOwner()->id,
            'ownerable_type' => get_class($this->getOwner()),
        ]);

        // Handle vehicle images upload
        foreach ($this->vehicleImages as $image) {
            $image->storeAs("vehicles/{$vehicle->id}/images", $image->getClientOriginalName());
        }

        // Handle vehicle documents upload
        foreach ($this->vehicleDocuments as $document) {
            $document->storeAs("vehicles/{$vehicle->id}/documents", $document->getClientOriginalName());
        }

        // Handle insurance documents upload
        foreach ($this->insuranceDocuments as $document) {
            $document->storeAs("vehicles/{$vehicle->id}/insurance", $document->getClientOriginalName());
        }

        // Clear the stored data after submission
        Storage::delete("Users/" . getUser()->id . "/vehicle.json");

        // Redirect or reset after successful submission
        return redirect()->route('vehicles.index');
    }

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

    public function defineStore()
    {
        $this->storePath = getUserStorage('private') . "/data/vehicle.json";
        $this->storeData = $this->getStoredData() ?? $this->storeData;
    }

    public function render()
    {
        return view(
            'user.vehicle.wizard',
            [
                'prevStepName' => $this->getPrevStepName(),
                'nextStepName' => $this->getNextStepName(),
                'currentStepName' => $this->getStepName($this->getStoredData()['current_step']),
                'currentStep' => $this->updateCurrentStep(),
                'nextPrefix' => 'next-',
                'prevPrefix' => 'prev-',
            ]
        )->layout('layouts.user');
    }
}
