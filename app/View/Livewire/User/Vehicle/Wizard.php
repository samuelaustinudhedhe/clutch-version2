<?php

namespace App\View\Livewire\User\Vehicle;

use App\Models\Vehicle;
use App\Traits\WithSteps;
use Illuminate\Support\Facades\Storage;

use Livewire\Component;

class Wizard extends Component
{
    use WithSteps;

    public $vehicleTypes = [];
    public $vits = [];
    public $vehicleData = [];
    public $vehicleImages = [];
    public $vehicleDocuments = [];
    public $insuranceDocuments = [];

    protected $rules = [

        'vehicleData.name' => 'required|string',

    ];

    public function mount()
    {
        // Load existing data if available (e.g., from JSON file)
        $this->vehicleData = $this->loadData();
        $this->vehicleTypes = Vehicle::types(); // Fetch vehicle types
        $this->vits = Vehicle::$vits; // Fetch vehicle subtypes

    }

    /**
     * Defines the steps for the vehicle wizard process.
     *
     * This function initializes the current step to 0 and sets up the step names
     * for the vehicle wizard process. It also calculates the total number of steps.
     *
     * @return void
     */
    private function defineSteps()
    {
        $this->currentStep = 0;

        // Modify stepNames
        $this->stepNames = [
            0 => 'Start',
            1 => 'Basic Information',
            2 => 'Detailed Information',
            3 => 'Image Upload',
            4 => 'Document Upload',
            5 => 'Final Review',
            6 => 'Confirmation',
            7 => 'Completion',
        ];

        $this->totalSteps = count($this->stepNames) - 1;
    }

    public function storeData()
    {
        // Store the data temporarily in a JSON file under the user's directory
        $userId = getUser()->id;;
        Storage::put("Users/{$userId}/newvehicledata.json", json_encode($this->vehicleData));
    }

    public function loadData()
    {
        // Load data from the JSON file if it exists
        $userId = getUser()->id;;
        $path = "Users/{$userId}/newvehicledata.json";

        if (Storage::exists($path)) {
            return json_decode(Storage::get($path), true);
        }

        return [];
    }

    public function submit()
    {
        // Final submission: Create the vehicle in the database

        $vehicle = Vehicle::create([
            'name' => $this->vehicleData['name'],
            'slug' => $this->vehicleData['slug'],
            'vin' => json_encode([
                'type' => $this->vehicleData['vin_type'],
                'number' => $this->vehicleData['vin_number'],
            ]),
            'description' => $this->vehicleData['description'],
            'rating' => $this->vehicleData['rating'],
            'price' => json_encode([
                'currency' => $this->vehicleData['price_currency'],
                'amount' => $this->vehicleData['price_amount'],
            ]),
            'status' => $this->vehicleData['status'],
            'location' => json_encode([
                'city' => $this->vehicleData['location_city'],
                'state' => $this->vehicleData['location_state'],
                'country' => $this->vehicleData['location_country'],
            ]),
            'details' => json_encode([
                'type' => $this->vehicleData['type'],
                'make' => $this->vehicleData['make'],
                'manufacturer' => $this->vehicleData['manufacturer'],
                'model' => $this->vehicleData['model'],
                'year' => $this->vehicleData['year'],
                'exterior' => [
                    'color' => $this->vehicleData['exterior_color'],
                    'type' => $this->vehicleData['exterior_type'],
                    'doors' => $this->vehicleData['exterior_doors'],
                    'windows' => $this->vehicleData['exterior_windows'],
                ],
                'interior' => [
                    'seats' => $this->vehicleData['interior_seats'],
                    'upholstery' => $this->vehicleData['interior_upholstery'],
                    'color' => $this->vehicleData['interior_color'],
                    'ac' => $this->vehicleData['interior_ac'],
                    'heater' => $this->vehicleData['interior_heater'],
                ],
                'dimensions' => [
                    'length' => $this->vehicleData['dimensions_length'],
                    'width' => $this->vehicleData['dimensions_width'],
                    'height' => $this->vehicleData['dimensions_height'],
                ],
                'engine' => [
                    'size' => $this->vehicleData['engine_size'],
                    'hp' => $this->vehicleData['engine_hp'],
                    'type' => $this->vehicleData['engine_type'],
                ],
                'transmission' => [
                    'type' => $this->vehicleData['transmission_type'],
                    'gear_ratio' => $this->vehicleData['transmission_gear_ratio'],
                    'gears' => $this->vehicleData['transmission_gears'],
                    'oil' => $this->vehicleData['transmission_oil'],
                    'drivetrain' => $this->vehicleData['transmission_drivetrain'],
                ],
                'fuel' => [
                    'type' => $this->vehicleData['fuel_type'],
                    'economy' => $this->vehicleData['fuel_economy'],
                ],
                'modifications' => [
                    'performance' => $this->vehicleData['modifications_performance'],
                    'aesthetic' => $this->vehicleData['modifications_aesthetic'],
                    'interior' => $this->vehicleData['modifications_interior'],
                ],
                'security' => [
                    'auto_lock' => $this->vehicleData['security_auto_lock'],
                    'alarm_system' => $this->vehicleData['security_alarm_system'],
                    'tracking_system' => $this->vehicleData['security_tracking_system'],
                ],
                'safety' => [
                    'airbags' => $this->vehicleData['safety_airbags'],
                    'emergency_braking' => $this->vehicleData['safety_emergency_braking'],
                ],
                'service' => [
                    'status' => $this->vehicleData['service_status'],
                    'last_service_date' => $this->vehicleData['last_service_date'],
                    'last_inspection_date' => $this->vehicleData['last_inspection_date'],
                ],
                'faults' => $this->vehicleData['faults'],
            ]),
            'insurance' => json_encode([
                'provider' => $this->vehicleData['insurance_provider'],
                'policy_number' => $this->vehicleData['insurance_policy_number'],
                'coverage' => $this->vehicleData['insurance_coverage'],
                'expiry_date' => $this->vehicleData['insurance_expiry_date'],
            ]),
            'chauffeur' => json_encode([
                'name' => $this->vehicleData['chauffeur_name'],
                'license_number' => $this->vehicleData['chauffeur_license_number'],
                'availability' => $this->vehicleData['chauffeur_availability'],
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
        $userId = getUser()->id;;
        Storage::delete("Users/{$userId}/newvehicledata.json");

        // Redirect or reset after successful submission
        return redirect()->route('vehicles.index');
    }


    public function render()
    {
        return view(
            'user.vehicle.wizard',
            [
                'currentStepName' => $this->getCurrentStepName(),
                'prevStepName' => $this->getPrevStepName(),
                'nextStepName' => $this->getNextStepName(),
            ]
        )->layout('layouts.user');
    }
}
