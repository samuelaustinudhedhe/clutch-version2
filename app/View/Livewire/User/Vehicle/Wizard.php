<?php

namespace App\View\Livewire\User\Vehicle;

use App\Models\Vehicle;
use App\View\Livewire\Resources\Vehicles\Wizard as VehiclesWizard;

class Wizard extends VehiclesWizard
{
    public $user;
    public $vehicleData = [];
    public $images = [
        'newUploads' => [],
        'featuredIndex' => 0,
        'uploaded' => [],
        'errors' => [],
    ];

    public $proofOfOwnership = [];
    public $registration = [];
    public $insurance = [];

    /**
     * Mount the component and initialize data.
     *
     * This method is called when the component is initialized. It sets up the user,
     * defines the steps and store data, and loads existing vehicle data and file details
     * if available.
     */
    public function mount()
    {
        // Retrieve the owner of the current session or context and assign it to the user property.
        $this->user = $this->getOwner();

        // Define the steps for the wizard process.
        $this->defineSteps();

        // Define the store for storing data during the wizard process.
        $this->defineStore();

        // Define the data structure for storing vehicle-related data.
        $this->defineStoreData();

        // Load existing vehicle types and subtypes from the Vehicle model.
        $this->vehicleData['types'] = Vehicle::types(); // Fetch vehicle types
        $this->vehicleData['vits'] = Vehicle::$vits; // Fetch vehicle subtypes

        // Load file details from the stored data file, if available.
        $files = $this->getStoredData()['files'] ?? [];
        $this->images['uploaded'] = $files['images'] ?? [];
        $this->proofOfOwnership['uploaded'] = $files['proof_of_ownership'] ?? [];
        $this->registration['uploaded'] = $files['registration'] ?? [];
        $this->insurance['uploaded'] = $files['insurance'] ?? [];

        // Set the featured image index from the stored data file.
        $this->storeData['featured_image_index'] = $this->images['featuredIndex'];
    }

    /**
     * Retrieves the owner of the current session or context.
     *
     * This function is responsible for obtaining the user who is currently
     * logged in or associated with the current session or context.
     *
     * @return \App\Models\User|null The user object representing the owner, or null if no user is found.
     */
    public function getOwner()
    {
        return getUser();
    }

    /**
     * Redirects the user to the vehicle index route with a success message.
     *
     * This function is used to redirect the user to the 'user.vehicle.index' route
     * after a vehicle has been created, along with a success message indicating
     * that the vehicle is awaiting approval.
     *
     * @return \Illuminate\Http\RedirectResponse A redirect response to the specified route with a success message.
     */
    public function submissionRedirect()
    {
        $route = 'user.vehicles.index';
        $message = 'Vehicle created and awaiting approval';
        return redirect()->route($route)->with('success', $message);
    }


    /**
     * Generates validation rules, messages, and field names for the current step in a multi-step form.
     *
     * This function determines the validation rules, custom messages, and field names based on the current step
     * of a multi-step form process. It returns an array containing these elements, which are used to validate
     * user input for each step.
     *
     * @return array An associative array containing:
     *               - 'rules': An array of validation rules for the current step.
     *               - 'messages': An array of custom validation messages.
     *               - 'names': An array of field names for use in validation messages.
     */
    public function rulesForStep()
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
                    'storeData.details.description' => 'required|min:60|max:900|string',
                    'storeData.details.vin.type' => 'string|in:' . implode(',', array_keys($this->vehicleData['vits'])),
                    'storeData.details.vin.number' => 'string|min:5|max:40',
                    'storeData.details.make' => 'required|string',
                    // 'storeData.details.manufacturer' => 'required|string',
                    'storeData.details.reg_number' => 'required|string',
                    'storeData.details.model' => 'required|string',
                    'storeData.details.year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
                    'storeData.location.pickup.full' => [
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
                    'storeData.location.drop_off.full' => [
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
                    'storeData.details.reg_number' => 'plate number',
                    'storeData.details.model' => 'model',
                    'storeData.details.year' => 'year',
                    'storeData.location.*.full' => 'location',
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
                    'storeData.details.engine.hp' => 'numeric|min:0|max:10000',
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
                // Validation rules for step 4 (Features)
                $rules = [
                    'storeData.details.safety.abs' => 'required|string|in:yes,no',
                    'storeData.details.safety.traction_control' => 'required|string|in:yes,no',
                    'storeData.details.safety.stability_control' => 'required|string|in:yes,no',
                    'storeData.details.safety.lane_departure_warning' => 'required|string|in:yes,no',
                    'storeData.details.safety.lane_keeping_assist' => 'required|string|in:yes,no',
                    'storeData.details.safety.adaptive_cruise_control' => 'required|string|in:yes,no',
                    'storeData.details.safety.blind_spot_monitoring' => 'required|string|in:yes,no',
                    'storeData.details.safety.forward_collision_warning' => 'required|string|in:yes,no',
                    'storeData.details.safety.automatic_emergency_braking' => 'required|string|in:yes,no',
                    'storeData.details.safety.rear_cross_traffic_alert' => 'required|string|in:yes,no',
                    'storeData.details.safety.parking_sensors' => 'required|string|in:yes,no',
                    'storeData.details.safety.camera_360' => 'required|string|in:yes,no',
                    'storeData.details.safety.driver_attention_monitor' => 'required|string|in:yes,no',
                    'storeData.details.safety.tire_pressure_monitor' => 'required|string|in:yes,no',
                    'storeData.details.safety.airbags' => 'required|string|in:front,front-sides,front-sides-curtain',
                    'storeData.details.safety.seat_belt_pretensioners' => 'required|string|in:yes,no',
                    'storeData.details.safety.crumple_zones' => 'required|string|in:yes,no',
                    'storeData.details.safety.isofix_mounts' => 'required|string|in:yes,no',
                    'storeData.details.security.alarm_system' => 'required|string|in:yes,no',
                    'storeData.details.security.immobilizer' => 'required|string|in:yes,no',
                    'storeData.details.security.remote_central_locking' => 'required|string|in:yes,no',
                    'storeData.details.security.gps_tracking' => 'required|string|in:yes,no',
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
            case 5:
                // Validation rules for step 5 (Faults & Modifications)
                $rules = [
                    // Add Faults & Modifications validation rules here
                ];

                $names = [
                    // Add Faults & Modifications field names here
                ];
                break;
            case 6:
                // Validation rules for step 6 (photos)
                $rules = [
                    'images.uploaded' => 'required|array|min:4|max:20',
                ];

                $names = [
                    'images.newUploads' => 'Vehicle image',
                ];

                $messages = [
                    'images.uploaded.required' => 'Please upload at least four (4) HD images.',
                    'images.uploaded.array' => 'The uploaded images are not in valid format. Please refresh you browser to fix the issue.',
                    'images.uploaded.min' => 'Please upload at least four (4) HD images.',
                    'images.uploaded.max' => 'You can upload a maximum of 20 images.',
                    'images.newUploads.required' => 'Please upload at least one image.',
                    'images.newUploads.image' => 'The file must be an image.',
                    'images.newUploads.mimes' => 'The image must be a JPEG, JPG, or PNG file.',
                    'images.newUploads.max' => 'Each image must not exceed 4MB in size.',
                ];
                break;
            case 7:
                // Validation rules for step 7 (vehicle documentation)
                $rules = [
                    // Add vehicle documentation) validation rules here
                    // Registration
                    'storeData.documents.registration.issued_date' => 'required|date_format:m/d/Y|before_or_equal:today',
                    'storeData.documents.registration.expiration_date' => 'required|date_format:m/d/Y|after:storeData.documents.registration.issued_date',
                    'registration.new' => 'required_without:registration.uploaded|max:2048', // 2MB max

                    // Proof of Ownership
                    'proofOfOwnership.new' => 'required_without:proofOfOwnership.uploaded|max:2048', // 2MB max

                    // Insurance
                    'storeData.documents.insurance.status' => 'required|in:valid,invalid',
                    'insurance.new' => 'required_if:storeData.documents.insurance.status,valid|max:2048', // 2MB max
                ];
                $messages = [
                    // ... existing messages ...

                    'storeData.documents.registration.issued_date.required' => 'The registration issued date is required.',
                    'storeData.documents.registration.issued_date.date_format' => 'The registration issued date must be in the format MM/DD/YYYY.',
                    'storeData.documents.registration.issued_date.before_or_equal' => 'The registration issued date must be today or earlier.',
                    'storeData.documents.registration.expiration_date.required' => 'The registration expiration date is required.',
                    'storeData.documents.registration.expiration_date.date_format' => 'The registration expiration date must be in the format MM/DD/YYYY.',
                    'storeData.documents.registration.expiration_date.after' => 'The registration expiration date must be after the issued date.',
                    'registration.new.required_without' => 'Please upload a registration document.',
                    'registration.new.max' => 'The registration must not be larger than 5MB.',

                    'proofOfOwnership.new.required_without' => 'Please upload a proof of ownership document.',
                    'proofOfOwnership.new.max' => 'The proof of ownership must not be larger than 5MB.',

                    'storeData.documents.insurance.status.required' => 'Please specify if you have insurance coverage.',
                    'storeData.documents.insurance.status.in' => 'The insurance status must be valid or invalid.',
                    'insurance.new.required_if' => 'Please upload an insurance document if you have coverage.',
                    'insurance.new.max' => 'The insurance document must not be larger than 5MB.',
                ];
                $names = [
                    // Add vehicle documentation) field names here
                    'storeData.documents.registration.issued_date' => 'Registration Issued Date',
                    'storeData.documents.registration.expiration_date' => 'Registration Expiration Date',
                    'registration.new' => 'Registration Document',
                    'proofOfOwnership.new' => 'Proof of Ownership Document',
                    'storeData.documents.insurance.status' => 'Insurance Status',
                    'insurance.new' => 'Insurance Document',
                ];
                break;
            case 8:
                // Validation rules for step 8 (pricing)
                $rules = [
                    'storeData.price.amount' => ['required', 'numeric', 'min:0', 'max:1000000'],
                    'storeData.price.on_sale' => ['required', 'in:true,false'],
                    'storeData.price.sale' => [
                        'required_if:storeData.price.on_sale,true',
                        'numeric',
                        'min:0',
                        'max:1000000',
                        function ($attribute, $value, $fail) {
                            if (
                                $this->storeData['price']['on_sale'] === 'true' &&
                                $value >= $this->storeData['price']['amount']
                            ) {
                                $fail('The sale price must be less than the regular price.');
                            }
                        },
                    ],
                    'storeData.price.discount.days' => ['required', 'in:1,2,3,5,7'],
                ];

                $names = [
                    'storeData.price.amount' => 'Regular Price',
                    'storeData.price.on_sale' => 'On Sale',
                    'storeData.price.sale' => 'Sale Price',
                    'storeData.price.discount.days' => 'Discount Days',
                ];

                $messages = [
                    'storeData.price.amount.required' => 'The regular price is required.',
                    'storeData.price.amount.numeric' => 'The regular price must be a number.',
                    'storeData.price.amount.min' => 'The regular price must be at least 0.',
                    'storeData.price.amount.max' => 'The regular price cannot exceed 1,000,000.',
                    'storeData.price.on_sale.required' => 'Please specify if the vehicle is on sale.',
                    'storeData.price.on_sale.in' => 'The on sale value must be either true or false.',
                    'storeData.price.sale.required_if' => 'The sale price is required when the vehicle is on sale.',
                    'storeData.price.sale.numeric' => 'The sale price must be a number.',
                    'storeData.price.sale.min' => 'The sale price must be at least 0.',
                    'storeData.price.sale.max' => 'The sale price cannot exceed 1,000,000.',
                    'storeData.price.discount.days.required' => 'Please select the number of days for the discount.',
                    'storeData.price.discount.days.in' => 'The selected discount days value is invalid.',
                ];

                break;
            default:
                break;
        }

        return ['rules' => $rules, 'messages' => $messages, 'names' => $names];
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
            4 => 'Vehicle Features',
            5 => 'Faults & Modifications',
            6 => 'Vehicle Images',
            7 => 'Vehicle Documents',
            8 => 'Price ',
            9 => 'Review & Submit',
        ];
        $this->totalSteps = count($this->stepNames) - 1;
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
                'vits' => $this->vehicleData['vits'],
                'VehicleTypes' => $this->vehicleData['types'],
            ]
        )->layout('layouts.user');
    }
}
