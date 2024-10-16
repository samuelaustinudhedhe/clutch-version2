<?php

namespace App\View\Livewire\Admin\Resources\Vehicles;

use App\Models\Admin;
use App\Models\User;
use App\Models\Vehicle;
use App\View\Livewire\Resources\Vehicles\Wizard as VehiclesWizard;


class Wizard extends VehiclesWizard
{
    public $user;
    public $vehicleData;
    // Files
    public $images = ['newUploads' => [], 'featuredIndex' => 0, 'uploaded' => [], 'errors' => [],];
    public $proofOfOwnership = [];
    public $registration = [];
    public $insurance = [];
    // index is used to support multiple car addition in same json file
    // User related Vars  
    public $selectedUser;
    public $userSearch = '';
    public $usersPerPage = 5;

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
        $this->user = getAdmin();
        // Define the steps for the wizard process.
        $this->defineSteps();

        // Define the store for storing data during the wizard process.
        $this->defineStore();

        // Define the data structure for storing vehicle-related data.
        //$this->defineStoreData();

        // Load existing vehicle types and subtypes from the Vehicle model.
        $this->vehicleData['types'] = Vehicle::types(); // Fetch vehicle types
        $this->vehicleData['vits'] = Vehicle::$vits; // Fetch vehicle subtypes
        $this->selectedUser = $this->storeData['owner'] ?? null;

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
     * Redirects to the vehicle index route with a success message.
     *
     * This function handles the redirection after a successful vehicle creation,
     * sending the user to the admin vehicles index page with a success message.
     *
     * @return \Illuminate\Http\RedirectResponse A redirect response to the specified route with a success message.
     */
    public function submissionRedirect()
    {
        $route = 'admin.vehicles.index';
        $message = 'Vehicle Created';
        return redirect()->route($route)->with('success', $message);
    }

    /**
     * Retrieves the owner of the vehicle.
     *
     * @return User|Admin The user who is the owner or the admin if no owner is selected.
     */
    public function getOwner()
    {
        $owner = $this->storeData['owner'] ?? null;
        //get user form selected user id 
        if (!empty($owner)) {
            return User::findOrFail($owner); // Get the selected user
        }
        return getUser() ?? getAdmin(); // Get the current user or the admin
    }

    public function selectVehicle($index)
    {

        $this->updateStoredData($index);
        // // Check if the index exists in the storeData array
        // if (isset($this->storeData[$index])) {
        //     $selectedVehicle = $this->storeData[$index];
        //     // Perform actions with the selected vehicle
        //     // For example, you can redirect to a detailed view or update a state
        //     session()->flash('message', 'Vehicle selected: ' . $selectedVehicle['details']['make']);
        //     // Redirect to a detailed view (example)
        //     // return redirect()->route('vehicle.details', ['id' => $selectedVehicle['id']]);
        // } else {
        //     session()->flash('error', 'Vehicle not found.');
        // }
    }

    public function updatedSelectedUser()
    {
        $this->storeData['owner'] = $this->selectedUser;
        $this->getOwner(); // Update the user property with the new owner details
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
                    'storeData.details.description' => 'min:60|max:900|required|string',
                    'storeData.details.vin.type' => 'required|string|in:' . implode(',', array_keys($this->vehicleData['vits'])),
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
            9 => 'Vehicle Owner',
            10 => 'Review & Submit',
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

        $users = User::search('name', $this->userSearch)
            ->where('role', 'owner')
            ->paginate($this->usersPerPage);

        return view(
            'admin.resources.vehicles.wizard',
            [
                'prevStepName' => $this->getPrevStepName(),
                'nextStepName' => $this->getNextStepName(),
                'currentStepName' => $this->getStepName($this->currentStep),
                'currentStep' => $this->updateCurrentStep(),
                'nextPrefix' => 'next-',
                'prevPrefix' => 'prev-',
                'vits' => $this->vehicleData['vits'],
                'VehicleTypes' => $this->vehicleData['types'],
                'users' => $users,

            ]
        )->layout('layouts.admin');
    }
}
