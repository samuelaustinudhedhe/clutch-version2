<?php

namespace App\View\Livewire\User\Vehicle;

use App\Models\Vehicle;
use App\Traits\WithSteps;
use Illuminate\Support\Facades\Storage;

use Livewire\Component;
use Livewire\WithFileUploads;

class Wizard extends Component
{
    use WithSteps,  WithFileUploads;

    public $user;
    public $vehicleTypes = [];
    public $vits = [];

    public $images = [];
    public $documents = [];

    public $insuranceDocuments = [];


    public function mount()
    {
        $this->user = getUser();
        $this->defineSteps();
        $this->defineStore();


        // Load existing data if available (e.g., from JSON file)
        $this->vehicleTypes = Vehicle::types(); // Fetch vehicle types
        $this->vits = Vehicle::$vits; // Fetch vehicle subtypes

        // Load file details from the JSON file
        $this->images['files'] = $this->getStoredData()['files']['images'] ?? null;
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
                    'storeData.name' => 'min:3|max:50|required|string',
                    // 'storeData.slug' => 'min:10|max:100|required|string',
                    'storeData.description' => 'min:60|max:225|required|string',
                    'storeData.vit' => 'required|string|in:' . implode(',', array_keys($this->vits)),
                    'storeData.vin' => 'required|string|min:5|max:40',
                    'storeData.make' => 'required|string',
                    'storeData.manufacturer' => 'required|string',
                    'storeData.model' => 'required|string',
                    'storeData.year' => 'required|integer|min:1900|max:' . date('Y'),
                    'storeData.location' => [
                        'required',
                        'string',
                        function ($attribute, $value, $fail) {
                            // Custom validation logic to check if the location exists using Google Maps API
                            $apiKey = config('services.google_maps.api_key'); // Ensure you have your API key stored in config/services.php
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
                    'nin.new' => 'required|file|max:1024',
                ];

                $customAttributes = [
                    'nin.new' => 'NIN document',
                ];
                break;
            case 4:
                // Validation rules for step 4 (KYC)
                $rules = [
                    'internationalPassport.new' => 'required|file|max:1024',
                    'driversLicense.new' => 'required|file|max:1024',
                    'proofOfAddress.new' => 'required|file|max:1024',
                ];

                $customAttributes = [
                    'internationalPassport.new' => 'international passport',
                    'driversLicense.new' => 'driver\'s license',
                    'proofOfAddress.new' => 'proof of address',
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
        // Validate the files
        $this->validate([
            'images.*' => 'required|image|max:4024', // Adjust rules as needed
        ]);

        // Loop through the uploaded files and save them
        foreach ($this->images['files'] as $index => $file) {
            $path = $file['path'] ?? null;
            $new = $file['new'] ?? null;

            $this->images['files'][$index]['file'] = $this->uploadFile('images', $new, $path);
            // Optionally reset file input
            // $this->reset('images.' . $index);
        }
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
            4 => 'Faults & Modifications',
            5 => 'Safety, Security & Service',
            6 => 'Vehicle Images',
            7 => 'Vehicle Documents',
            8 => 'Insurance',
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
                'currentStepName' => $this->getStepName($this->currentStep),
                'currentStep' => $this->updateCurrentStep(),
                'nextPrefix' => 'next-',
                'prevPrefix' => 'prev-',
            ]
        )->layout('layouts.user');
    }
}
