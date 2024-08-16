<?php

namespace App\Traits;

trait Onboarding
{
    /**
     * Retrieves and initializes the onboarding data if it is null or empty.
     * 
     * @return object The decoded JSON object of the onboarding data.
     */
    public function onboarding()
    {
        // Decode the JSON encoded onboarding data.
        $onboarding = is_string($this->boarding) ? json_decode($this->boarding) : $this->boarding;
        // Automatically assign onboarding keys if it's null or empty.
        if (is_null($onboarding) || empty($onboarding)) {
            // Fill the onboarding attribute with default values and save the model.
            $this->forceFill([
                'boarding' => json_encode([
                    'status' => 'start', // Initial status of onboarding.
                    'step' => 0, // Initial step of onboarding.
                    'restart_at' => '', // Placeholder for restart timestamp.
                    'completed_at' => '', // Placeholder for completion timestamp.
                ]),
            ])->save();
        }

        // Return the decoded onboarding data.
        return $onboarding;
    }

    /**
     * Accessor for the onboarding attribute.
     * 
     * @return object The decoded JSON object of the onboarding data.
     */
    public function getOnboardingAttribute()
    {
        // Call the onboarding method to get the onboarding data.
        return $this->onboarding();
    }
    
    /**
     * Retrieves the status of the onboarding process.
     * 
     * @return string|null The status of the onboarding process, or null if not set.
     */
    public function onboardingStatus()
    {
        // Return the status from the onboarding data if it exists, otherwise return null.
        return isset($this->onboarding->status) ? $this->onboarding->status : null;
    }

    /**
     * Checks if the onboarding process is at the start.
     * 
     * @return bool True if the onboarding status is 'start', otherwise false.
     */
    public function onboardingStart()
    {
        // Check if the onboarding status is 'start'.
        return $this->onboardingStatus() === 'start' ? true : false;
    }

    /**
     * Checks if the onboarding process is completed.
     * 
     * @return bool True if the onboarding status is 'completed', otherwise false.
     */
    public function onboardingCompleted()
    {
        // Check if the onboarding status is 'completed'.
        return $this->onboardingStatus() === 'completed' ? true : false;
    }

    /**
     * Retrieves the timestamp when the onboarding process can be resumed.
     * 
     * @return string The timestamp when the onboarding process can be resumed.
     */
    public function onboardingResumeOn()
    {
        // Return the resume_at timestamp from the onboarding data.
        return $this->onboarding->resume_at;
    }

    /**
     * Retrieves the timestamp when the onboarding process was completed.
     * 
     * @return string The timestamp when the onboarding process was completed.
     */
    public function onboardingCompletedOn()
    {
        // Return the completed_at timestamp from the onboarding data.
        return $this->onboarding->completed_at;
    }

    /**
     * Checks if the onboarding process is skipped.
     * 
     * @return bool True if the onboarding status is 'skipped', otherwise false.
     */
    public function onboardingIsSkipped(): bool
    {
        // Check if the onboarding status is 'skipped'.
        return $this->onboarding->status === 'skipped' ? true : false;
    }
}
