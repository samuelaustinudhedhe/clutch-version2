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
    public $vehicleImages = [];
    public $vehicleDocuments = [];
    public $insuranceDocuments = [];

    protected $rules = [

        'storeData.name' => 'required|string',

    ];

    public function mount()
    {
        // Load existing data if available (e.g., from JSON file)
        $this->storeData = $this->load();
        $this->vehicleTypes = Vehicle::types(); // Fetch vehicle types
        $this->vits = Vehicle::$vits; // Fetch vehicle subtypes
    }


    public function defineSteps()
    {
        $this->stepNames = [
            0 => 'Introduction',
            1 => 'Vehicle Information',
            2 => 'Vehicle Details',
            3 => 'Upload Images',
            4 => 'Upload Documents',
            5 => 'Review & Submit',
            6 => 'Review & Submit',
            7 => 'Review & Submit',
        ];
        $this->totalSteps = count($this->stepNames) - 1;
    }

    public function defineStore()
    {
        $this->storeData = $this->load();
        $this->storePath = "Users/".getUser()->id."/data/vehicle.json";
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
        Storage::delete("Users/".getUser()->id."/vehicle.json");

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
