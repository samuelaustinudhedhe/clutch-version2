<?php

namespace App\View\Livewire\Guest\Vehicles;

use App\Models\Vehicle;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $mapVehicles;
    public $search = '';
    public $perPage = 50;

    public function mount() {

                $this->mapVehicles = collect([
            [
                'lat' => 4.8360, 'lng' => 7.0250, 'price' => '₦2,500', 
                'image' => asset('assets/images/placeholders/car.jpg'), 
                'name' => 'Toyota Camry 2015, Excellent condition',
                'save' => '5%',
                'location' => 'Port Harcourt'
            ],
            [
                'lat' => 4.8340, 'lng' => 7.0270, 'price' => '₦3,000,000', 
                'image' => asset('assets/images/placeholders/car.jpg'), 
                'name' => 'Honda Accord 2016, Full option',
                'save' => '5%',
                'location' => 'Port Harcourt'
            ],
            [
                'lat' => 4.8370, 'lng' => 7.0245, 'price' => '₦2,750,000', 
                'image' => asset('assets/images/placeholders/car.jpg'), 
                'name' => 'Nissan Altima 2017, Low mileage',
                'save' => '5%',
                'location' => 'Port Harcourt'
            ],
            [
                'lat' => 4.8355, 'lng' => 7.0280, 'price' => '₦3,200,000', 
                'image' => asset('assets/images/placeholders/car.jpg'), 
                'name' => 'Ford Focus 2018, Almost new',
                'save' => '5%',
                'location' => 'Port Harcourt'
            ],
            [
                'lat' => 4.8335, 'lng' => 7.0290, 'price' => '₦2,900,000', 
                'image' => asset('assets/images/placeholders/car.jpg'), 
                'name' => 'Hyundai Elantra 2017, Great fuel economy',
                'location' => 'Port Harcourt'
            ]
        ])->filter(function ($vehicle) {
            return str_contains(strtolower($vehicle['name']), strtolower($this->search)) ||
                   str_contains(strtolower($vehicle['location']), strtolower($this->search));
        })->values()->all();
    }


    public function render()
    {
        $vehicles = Vehicle::search('name', $this->search)->paginate($this->perPage);
        $vehiclesCount = Vehicle::all()->count();
        return view('pages.vehicles.index', [
            'vehicles' => $vehicles,
            'count' => $vehiclesCount,
        ])->layout('layouts.guest');
    }
}
