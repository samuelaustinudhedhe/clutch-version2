<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;

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

    /**
     * @var string $storePath The path where the step data will be stored.
     */
    public $storePath = '';

    /**
     * @var array $storeData The data to be stored.
     */
    public $storeData = [];

    /**
     * Get the name of the current step.
     *
     * @return string The name of the current step.
     *
     * @example
     * ```php
     * $currentStepName = $this->getCurrentStepName();
     * echo $currentStepName; // Outputs: 'Introduction'
     * ```
     */
    public function getCurrentStepName()
    {
        $step = $this->getStoredData()['current_step'] ?? $this->currentStep;
        return $this->getStepName($step);
    }

    /**
     * Get the name of the previous step.
     *
     * @return string|null The name of the previous step, or null if there is no previous step.
     *
     * @example
     * ```php
     * $prevStepName = $this->getPrevStepName();
     * echo $prevStepName; // Outputs: 'Step 1' if current step is 2
     * ```
     */
    public function getPrevStepName()
    {
        $step = $this->getStoredData()['current_step'] ?? $this->currentStep;
        if ($step > 0) {
            return $this->getStepName($step - 1);
        }
        return null;
    }

    /**
     * Get the name of the next step.
     *
     * @return string|null The name of the next step, or null if there is no next step.
     *
     * @example
     * ```php
     * $nextStepName = $this->getNextStepName();
     * echo $nextStepName; // Outputs: 'Step 2' if current step is 1
     * ```
     */
    public function getNextStepName()
    {
        $step = $this->getStoredData()['current_step'] ?? $this->currentStep;
        if ($step < $this->totalSteps) {
            return $this->getStepName($step + 1);
        }
        return null;
    }

    /**
     * Get the name of a specific step.
     *
     * @param int $step The step number.
     * @return string The name of the specified step, or 'Unknown Step' if the step number is invalid.
     *
     * @example
     * ```php
     * $stepName = $this->getStepName(2);
     * echo $stepName; // Outputs: 'Step 2'
     * ```
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
     *
     * @example
     * ```php
     * $this->nextStep();
     * echo $this->currentStep; // Outputs: 1 if the initial step was 0
     * ```
     */
    public function nextStep()
    {

        $this->attachToNextStep();
        $this->currentStep++;
        $this->store();
    }

    public function attachToNextStep()
    {
        return false;
    }

    /**
     * Moves back to the previous step in the process.
     *
     * This function decrements the current step counter and stores the updated step data.
     *
     * @return void
     *
     * @example
     * ```php
     * $this->prevStep();
     * echo $this->currentStep; // Outputs: 0 if the initial step was 1
     * ```
     */
    public function prevStep()
    {
        $this->attachToPrevStep();
        $this->currentStep--;
        $this->store();
    }

    public function attachToPrevStep()
    {
        return false;
    }

    /**
     * Navigates to a specific step in the process.
     *
     * This function sets the current step to the specified step if it is within the valid range.
     * If the step is invalid, it dispatches a notification.
     *
     * @param int $step The step number to navigate to.
     * @return void
     *
     * @example
     * ```php
     * $this->goToStep(2);
     * echo $this->currentStep; // Outputs: 2
     * ```
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
     *
     * @example
     * ```php
     * $this->backToIntro();
     * echo $this->currentStep; // Outputs: 0
     * ```
     */
    public function backToIntro()
    {
        $this->currentStep = 0;
        $this->store();
    }

    /**
     * Store the data temporarily in a JSON file under the user's directory.
     *
     * @return void
     *
     * @example
     * ```php
     * $this->storeData = ['key' => 'value'];
     * $this->storePath = 'path/to/store.json';
     * $this->store();
     * ```
     */
    public function store($data = [])
    {
        if (empty($data)) {
            $data = $this->storeData ?? '';
        }
        $path = $this->storePath ?? '';
        if (!empty($path) && !empty($data)) {
            Storage::put($path, json_encode(array_merge($data, ['current_step' => $this->currentStep])));
        }
    }

    public function putData($data)
    {
        $path = $this->storePath ?? '';
        if (!empty($path) && !empty($data)) {
            Storage::put($path, json_encode($data));
        }
    }

    /**
     * Load data from the JSON file if it exists.
     *
     * @return array The loaded data.
     *
     * @example
     * ```php
     * $this->storePath = 'path/to/store.json';
     * $data = $this->load();
     * print_r($data); // Outputs the data stored in the JSON file
     * ```
     */
    public function getStoredData()
    {
        if (Storage::exists($this->storePath)) {
            return  json_decode(Storage::get($this->storePath), true);
        }
    }

    public function loadStoredData()
    {
        if (Storage::exists($this->storePath)) {
            $this->storeData = json_decode(Storage::get($this->storePath), true);
        }
    }
    /**
     * Update the current step if the stored current step is greater than the current step.
     *
     * This function checks if the 'current_step' key is set in the stored data and updates
     * the current step if the stored value is greater than the current step.
     *
     * @return void
     *
     * @example
     * ```php
     * $this->storeData = ['current_step' => 2];
     * $this->updateCurrentStep();
     * echo $this->currentStep; // Outputs: 2
     * ```
     */
    public function updateCurrentStep()
    {
        if (isset($this->storeData['current_step']) && $this->storeData['current_step'] > $this->currentStep &&  $this->currentStep == 0) {
            $this->currentStep = $this->storeData['current_step'];
        }
    }

    /**
     * Upload a file, handling the deletion of any existing file in storage.
     *
     * @param string $key The key to identify the file (e.g., 'photo', 'nin').
     * @param \Illuminate\Http\UploadedFile $file The new file being uploaded.
     * @param string|null $filePath The path to the existing file, if any.
     * @return array The details of the uploaded file.
     */
    // public function uploadFile($key, $file, $filePath)
    // {
    //     // Check if there's an existing file and delete it
    //     if ($filePath && Storage::exists($filePath)) {
    //         Storage::delete($filePath);
    //     }

    //     // Save the uploaded file and get the file path
    //     $filePath = $file->store("tmp", 'public');

    //     if (!isset($this->storeData['files'][$key])) {
    //         $this->storeData['files'][$key] = [];
    //     }

    //     // Save file details to the JSON file
    //     $this->storeData['files'][$key] = [
    //         'path' => $filePath,
    //         'mime_type' => $file->getMimeType(),
    //         'size' => $file->getSize(),
    //     ];
    //     $this->deleteFile($file);
    //     Storage::put($this->storePath, json_encode($this->storeData));

    //     return $this->storeData['files'][$key];
    // }

    // public function uploadFiles($key, $newFile, $files)
    // {
    //     $hash = md5_file($newFile->getRealPath()); // Generate image hash

    //     $alreadyExists = false;
    //     foreach ($files as $file) {
    //         if ($file['hash'] === $hash) {
    //             $alreadyExists = true;
    //         }
    //     }
    //     if (!$alreadyExists) {
    //         $filePath = $newFile->store("tmp", 'public');

    //         if (!isset($this->storeData['files'][$key])) {
    //             $this->storeData['files'][$key] = [];
    //         }

    //         // Save file details to the JSON file
    //         $this->storeData['files'][$key][] = [
    //             'path' => $filePath,
    //             'mime_type' => $newFile->getMimeType(),
    //             'size' => $newFile->getSize(),
    //             'hash' => $hash
    //         ];

    //         $this->deleteFile($newFile);
    //         Storage::put($this->storePath, json_encode($this->storeData));

    //         return $this->storeData['files']['images']; // Add image to the images array
    //     }
    // }

    /**
     * Deletes a file from either temporary or permanent storage.
     *
     * This function checks if the file is in temporary storage and deletes it if found.
     * If the file is not in temporary storage, it attempts to delete it from permanent storage.
     *
     * @param mixed $file The file to be deleted. This can be an object with a method `getRealPath` for temporary files,
     *                    or an object with a `path` property for files in permanent storage.
     * @return void
     */
    protected function deleteFile($file)
    {
        // Check if the file is in temporary storage
        if (method_exists($file, 'getRealPath')) {
            $filePath = $file->getRealPath();

            // Delete the file from the temporary storage
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        } else {
            // Handle permanent storage deletion if the file is already saved
            $filePath = $file->path; // Adjust based on how you store the file path
            if (Storage::exists($filePath)) {
                Storage::delete($filePath);
            }
        }
    }

    // /**
    //  * Define the steps for the multi-step process.
    //  *
    //  * This function should be implemented in the component that uses this trait.
    //  *
    //  * @return bool
    //  *
    //  * @example
    //  * ```php
    //  * public function defineSteps()
    //  * {
    //  *     $this->stepNames = [
    //  *         0 => 'Intro',
    //  *         1 => 'Details',
    //  *         2 => 'Confirmation'
    //  *     ];
    //  *     $this->totalSteps = 2;
    //  *     return true;
    //  * }
    //  * ```
    //  */
    // public function defineSteps()
    // {
    //     return false;
    // }

    // /**
    //  * Define the store path and data for the multi-step process.
    //  *
    //  * This function should be implemented in the component that uses this trait.
    //  *
    //  * @return bool
    //  *
    //  * @example
    //  * ```php
    //  * public function defineStore()
    //  * {
    //  *     $this->storePath = 'path/to/store.json';
    //  *     $this->storeData = ['key' => 'value'];
    //  *     return true; #optional or return false to skip store definition
    //  * }
    //  * ```
    //  */
    // public function defineStore()
    // {
    //     return false;
    // }

    // /**
    //  * Constructor to initialize the steps and store definitions.
    //  *
    //  * This function calls defineSteps() and defineStore() if they are present in the child component.
    //  *
    //  * @example
    //  * ```php
    //  * public function __construct()
    //  * {
    //  *     parent::__construct();
    //  *     $this->defineSteps();
    //  *     $this->defineStore();
    //  * }
    //  * ```
    //  */
    // public function __construct()
    // {
    //     if (method_exists($this, 'defineSteps') && $this->defineSteps() !== false) {
    //         $this->defineSteps();
    //     }
    //     if (method_exists($this, 'defineStore') && $this->defineStore() !== false) {
    //         $this->defineStore();
    //     }
    // }
}
