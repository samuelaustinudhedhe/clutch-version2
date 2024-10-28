<?php

namespace App\View\Livewire\Guest\Vehicles;

use App\Models\Vehicle;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 50;
    public $search_by_location;
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

    public function mount($location = null)
    {
        $this->makesAndModels = Vehicle::getMakesAndModels('cars', true);
        $this->search_by_location = request()->query('location');
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
            ->when($this->search_by_location, function ($query) {
                return $query->where('location', 'like', '%' . $this->search_by_location . '%');
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
