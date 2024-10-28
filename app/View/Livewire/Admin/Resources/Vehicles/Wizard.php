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
        $this->defineStoreData();

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
