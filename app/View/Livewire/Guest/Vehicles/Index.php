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

        $this->mapVehicles = [
            [
                'lat' => 4.8360, 'lng' => 7.0250, 'price' => '₦2,500', 
                'image' => asset('assets/images/placeholders/car.jpg'), 
                'name' => 'Toyota Camry 2015, Excellent condition',
                'save' => '5%'
            ],
            [
                'lat' => 4.8340, 'lng' => 7.0270, 'price' => '₦3,000,000', 
                'image' => asset('assets/images/placeholders/car.jpg'), 
                'name' => 'Honda Accord 2016, Full option',
                'save' => '5%'

            ],
            [
                'lat' => 4.8370, 'lng' => 7.0245, 'price' => '₦2,750,000', 
                'image' => asset('assets/images/placeholders/car.jpg'), 
                'name' => 'Nissan Altima 2017, Low mileage',
                'save' => '5%'

            ],
            [
                'lat' => 4.8355, 'lng' => 7.0280, 'price' => '₦3,200,000', 
                'image' => asset('assets/images/placeholders/car.jpg'), 
                'name' => 'Ford Focus 2018, Almost new',
                'save' => '5%'
            ],
            [
                'lat' => 4.8335, 'lng' => 7.0290, 'price' => '₦2,900,000', 
                'image' => asset('assets/images/placeholders/car.jpg'), 
                'name' => 'Hyundai Elantra 2017, Great fuel economy'
            ]
        ];
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
