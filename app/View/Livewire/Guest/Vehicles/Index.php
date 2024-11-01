<?php

namespace App\View\Livewire\Guest\Vehicles;

use App\Models\Vehicle;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 40;
    public $searchByLocation = [];
    public $search_by_location = [];
    public $filterBy = [
        'type' => '',
        'seats' => '',
        'year' => '',
        'make' => '',
        'model' => '',
    ];
    public $makesAndModels;
    public $year;
    public $make;
    public $model;
    public $type;

    public function mount($location = [])
    {
        $this->makesAndModels = Vehicle::getMakesAndModels('cars', true);
        $this->searchByLocation = $location;
    }

    /**
     * Updates the available makes and models based on the selected vehicle type.
     *
     * This method is triggered when the 'type' filter is updated. It pluralizes
     * the selected type and fetches the corresponding makes and models.
     *
     * @return void
     */
    public function updatedFilterByType()
    {
        $type = $this->filterBy['type'];

        if (!empty($type)) {
            $plural = $type . 's';
            $this->makesAndModels = Vehicle::getMakesAndModels($plural, true);
        }
    }

    public function updatingFilterByMake()
    {
        // Empty model filter when make is updated
        $this->filterBy['model'] = '';
    }

    public function updatingsearchByLocation(){
        if(!empty($this->searchByLocation['full'])){
            $this->searchByLocation = [];
        }

    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $vehicles = Vehicle::where('status', '=', 'active')
            ->orderBy('created_at', 'desc')
            ->when($this->search, function ($query) {
                return $query->where(function ($q) {
                    $searchTerms = explode(' ', $this->search);
                    foreach ($searchTerms as $term) {
                        $q->orWhere('name', 'LIKE', "%{$term}%")
                            ->orWhere('details->make', 'LIKE', "%{$term}%")
                            ->orWhere('details->model', 'LIKE', "%{$term}%")
                            ->orWhere('details->description', 'LIKE', "%{$term}%");
                    }
                });
            })
            // ->when($this->search_by_location, function ($query) {
            //     // Convert search_by_location to an array
            //     $locationData = $this->searchByLocation;
            
            //     if (!empty($locationData)) {
            //         return $query->where(function($q) use ($locationData) {
            //             foreach ($locationData as $key => $value) {
            //                 if (!empty($value)) {
            //                     if (in_array($key, ['city', 'state', 'country', 'street'])) {
            //                         $q->orWhere("location->pickup->{$key}", 'like', "%{$value}%");
            //                     }
            //                 }
            //             }
            //         });
            
            //         // If latitude and longitude are available, add distance-based search
            //         if (!empty($locationData['lat']) && !empty($locationData['lng'])) {
            //             $radius = 50; // Search radius in kilometers, adjust as needed
            //             $query->whereRaw("
            //                 ST_Distance_Sphere(
            //                     point(location->>'$.pickup.longitude', location->>'$.pickup.latitude'),
            //                     point(?, ?)
            //                 ) <= ? * 1000
            //             ", [$locationData['lng'], $locationData['lat'], $radius]);
            //         }
            //     }
            
            //     return $query;
            // })
            ->when($this->searchByLocation, function ($query) {
                // Assuming $this->search_by_location is a string (like a city name or address)
                $coordinates = $this->searchByLocation;
                
                if ($coordinates && isset($coordinates['latitude']) && isset($coordinates['longitude'])) {
                    $lat = $coordinates['latitude'];
                    $lng = $coordinates['longitude'];
                    $radius = 50; // Search radius in kilometers, adjust as needed
                                
                    $this->dispatch('notify', 'searching by cardinal points ', 'success');

                    return $query->whereRaw("
                        ST_Distance_Sphere(
                            point(CAST(JSON_EXTRACT(location, '$.pickup.longitude') AS DECIMAL(10, 8)),
                                  CAST(JSON_EXTRACT(location, '$.pickup.latitude') AS DECIMAL(10, 8))),
                            point(?, ?)
                        ) <= ? * 1000
                    ", [$lng, $lat, $radius]);
                }

                $this->dispatch('notify', 'searching by city state country ', 'error');

                // Fallback to a general location search if coordinates are not available
                return $query->where(function($q) {
                    if (isset($this->searchByLocation['city']) && !empty($this->searchByLocation['city'])) {
                        $q->where('location->pickup->city', 'like', '%' . $this->searchByLocation['city'] . '%');
                    }
                    if (isset($this->searchByLocation['state']) && !empty($this->searchByLocation['state'])) {
                        $q->orWhere('location->pickup->state', 'like', '%' . $this->searchByLocation['state'] . '%');
                    }
                    if (isset($this->searchByLocation['country']) && !empty($this->searchByLocation['country'])) {
                        $q->orWhere('location->pickup->country', 'like', '%' . $this->searchByLocation['country'] . '%');
                    }
                });
            })
            ->when($this->filterBy['seats'], function ($query) {
                return $query->where('details->interior->seats', $this->filterBy['seats']);
            })
            ->when($this->filterBy['year'], function ($query) {
                return $query->where('details->year', $this->filterBy['year']);
            })
            ->when($this->filterBy['make'], function ($query) {
                return $query->where('details->make', 'like', '%' . $this->filterBy['make'] . '%');
            })
            ->when($this->filterBy['model'], function ($query) {
                return $query->where('details->model', 'like', '%' . $this->filterBy['model'] . '%');
            })
            ->when($this->filterBy['type'], function ($query) {
                return $query->where('details->type', $this->filterBy['type']);
            })
            ->paginate($this->perPage);

        $vehiclesCount = Vehicle::where('status', '=', 'active')->count();

        return view('pages.vehicles.index', [
            'vehicles' => $vehicles,
            'count' => $vehiclesCount,
        ])->layout('layouts.guest');
    }
}
