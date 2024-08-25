<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

/**
 * Trait WithSteps
 *
 * This trait provides functionality for managing a multi-step process.
 * It includes methods for navigating between steps, retrieving step names,
 * and resetting the process to the introduction step.
 */
trait WithSteps
{
    /**
     * @var int $currentStep The current step in the process.
     */
    public $currentStep = 0;

    /**
     * @var int $totalSteps The total number of steps in the process.
     */
    public $totalSteps = 4;

    /**
     * @var array $stepNames An array mapping step numbers to their corresponding names.
     */
    public $stepNames = [
        0 => 'Introduction',
        1 => 'Step 1',
        2 => 'Step 2',
        3 => 'Step 3',
        4 => 'Review and Submit'

    ];

    public $storePath = '';
    
    public $storeData = [];
    /**
     * Get the name of the current step.
     *
     * @return string The name of the current step.
     */
    public function getCurrentStepName()
    {
        return $this->getStepName($this->currentStep);
    }

    /**
     * Get the name of the previous step.
     *
     * @return string|null The name of the previous step, or null if there is no previous step.
     */
    public function getPrevStepName()
    {
        if ($this->currentStep > 1) {
            return $this->getStepName($this->currentStep - 1);
        }
        return null;
    }

    /**
     * Get the name of the next step.
     *
     * @return string|null The name of the next step, or null if there is no next step.
     */
    public function getNextStepName()
    {
        if ($this->currentStep < $this->totalSteps) {
            return $this->getStepName($this->currentStep + 1);
        }
        return null;
    }

    /**
     * Get the name of a specific step.
     *
     * @param int $step The step number.
     * @return string The name of the specified step, or 'Unknown Step' if the step number is invalid.
     */
    private function getStepName($step)
    {
        return $this->stepNames[$step] ?? 'Unknown Step';
    }

    /**
     * Advances to the next step in the process.
     *
     * This function validates the current step, increments the current step counter,
     * and stores the updated step data.
     *
     * @return void
     */
    public function nextStep()
    {
        if (property_exists($this, 'rules') && !empty($this->rules)) {
            $this->validate();
        }
        $this->currentStep++;
        $this->store();
    }

    /**
     * Moves back to the previous step in the process.
     *
     * This function decrements the current step counter and stores the updated step data.
     *
     * @return void
     */
    public function prevStep()
    {
        $this->currentStep--;
        $this->store();
    }

    /**
     * Navigates to a specific step in the process.
     *
     * This function sets the current step to the specified step if it is within the valid range.
     * If the step is invalid, it dispatches a notification.
     *
     * @param int $step The step number to navigate to.
     * @return void
     */
    public function goToStep($step)
    {
        if ($step >= 0 && $step <= $this->totalSteps) {
            $this->currentStep = $step;
        } else {
            $this->dispatch('notify', 'Invalid step number' . [$step], 'error');
        }
        $this->store();
    }

    /**
     * Resets the process to the introduction step.
     *
     * This function sets the current step to the introduction step and stores the updated step data.
     *
     * @return void
     */
    public function backToIntro()
    {
        $this->currentStep = 0;
        $this->store();
    }

    public function store()
    {
        // Store the data temporarily in a JSON file under the user's directory
        $data = $this->storeData ?? '';
        $path = $this->storePath ?? '';
        if (!empty($path) && !empty($data)) {
            Storage::put($path, json_encode($data));
        }
    }

    public function load()
    {
        // Load data from the JSON file if it exists
        $path = $this->storePath ?? '';

        if (Storage::exists($path)) {
            return json_decode(Storage::get($path), true);
        }

        return [];
    }

    // Make a function called defineSteps() that will be overwritten in the component that uses this trait
    public function defineSteps()
    {
        // This function should be implemented in the component that uses this trait
        return false;
    
    }
    // Make a function called defineStore() that will be overwritten in the component that uses this trait
    public function defineStore()
    {
        // This function should be implemented in the component that uses this trait
        return false;
    
    }

    // Call a construct that will call defineSteps() when the class is instantiated if it is present in the child component
    public function __construct()
    {
        if (method_exists($this, 'defineSteps') && $this->defineSteps() !== false) {
            $this->defineSteps();
        }
        if (method_exists($this, 'defineStore') && $this->defineStore() !== false) {
            $this->defineStore();
        }
    }}
