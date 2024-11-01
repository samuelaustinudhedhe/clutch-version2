<?php

namespace App\Traits;

trait HasDetails
{
    /**
     * Process the details attribute and decode the JSON.
     *
     * @return object
     */
    public function getDetails()
    {
        $details = is_string($this->details) ? json_decode($this->details) : $this->details;
        return $details;
    }
    
    /**
     * Update a key in the details attribute.
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function updateDetails(string $key, $value): void
    {
        $details = $this->getDetails();
        if (!is_object($details)) {
            $details = new \stdClass();
        }
        $details->$key = $value;
        $this->setDetailsAttribute($details);
    }

    /**
     * Set the details attribute, ensuring it's stored as a JSON string.
     *
     * @param mixed $value The details to be set
     * @return void
     */
    public function setDetailsAttribute($value): void
    {
        if (is_array($value) || is_object($value)) {
            $this->attributes['details'] = json_encode($value);
        } elseif (is_string($value) && isJson($value)) {
            $this->attributes['details'] = $value;
        } else {
            throw new \InvalidArgumentException('The details attribute must be a valid JSON string, array, or object.');
        }
    }

    /**
     * Initialize the details attribute with default values if it's null.
     *
     * @return void
     */
    public function initializeDetails(): void
    {
        if ($this->details === null) {
            $defaultDetails = [
                'phone' => [
                    'work' => ['country_code' => '', 'number' => '', 'verified_at' => null],
                    'home' => ['country_code' => '', 'number' => '', 'verified_at' => null]
                ],
                'status' => 'Onboarding',
                'date_of_birth' => null,
                'gender' => 'Rather not say',
                'address' => null,
                'social' => null,
            ];

            // Add User-specific fields if the model is a User
            if ($this instanceof \App\Models\User) {
                $defaultDetails['self_drive'] = false;
            }

            $this->setDetailsAttribute($defaultDetails);
            $this->save();
        }
    }

    /**
     * Get the date of birth from the details attribute.
     *
     * @return string|null
     */
    public function getDateOfBirthAttribute()
    {
        return $this->getDetails()->date_of_birth ?? null;
    }

    /**
     * Get the gender from the details attribute.
     *
     * @return string|null
     */
    public function getGenderAttribute()
    {
        return $this->getDetails()->gender ?? null;
    }

    /**
     * Get the social links from the details attribute.
     *
     * @return object|null
     */
    public function getSocialAttribute()
    {
        return $this->getDetails()->social ?? null;
    }

    /**
     * Get the address from the details attribute.
     *
     * @return object|null
     */
    public function getAddressAttribute()
    {
        return $this->getDetails()->address ?? null;
    }

    /**
     * Format the address from the details attribute.
     *
     * This method uses the formatAddress function to format the address
     * based on the specified type (home or work).
     *
     * @param string $type The type of address to format ('home' or 'work').
     * @return string|null The formatted address, or null if formatting fails or the address is not available.
     */
    public function humanizeAddress($type)
    {
        return formatAddress($this->getDetails()->address->$type, 'street, unit, city, state, postal_code, country', []) ?? null;
    }

    /**
     * Get the humanized home address.
     *
     * This accessor method returns a formatted version of the home address.
     *
     * @return string|null The formatted home address, or null if not available.
     */
    public function getHumanizedHomeAddressAttribute()
    {
        return $this->humanizeAddress('home');
    }

    /**
     * Get the humanized work address.
     *
     * This accessor method returns a formatted version of the work address.
     *
     * @return string|null The formatted work address, or null if not available.
     */
    public function getHumanizedWorkAddressAttribute()
    {
        return $this->humanizeAddress('work');
    }

    /**
     * Get the phone numbers from the details attribute.
     *
     * @return object|null
     */
    public function getPhoneAttribute()
    {
        return $this->getDetails()->phone ?? null;
    }

    /**
     * Format the phone number from the details attribute.
     *
     * This method uses the formatPhone function to format the phone number
     * based on the specified type (work or home).
     *
     * @param string $type The type of phone number to format ('work' or 'home'). Defaults to 'work'.
     * @return string|null The formatted phone number, or null if formatting fails or the phone number is not available.
     */
    public function humanizePhone($type = 'work')
    {
        return formatPhone($this->getDetails()->phone, true, true, false, $type) ?? null;
    }

    /**
     * Get the humanized work phone number.
     *
     * This accessor method returns a formatted version of the work phone number.
     *
     * @return string|null The formatted work phone number, or null if not available.
     */
    public function getHumanizedWorkPhoneAttribute()
    {
        return $this->humanizePhone('work');
    }

    /**
     * Get the humanized home phone number.
     *
     * This accessor method returns a formatted version of the home phone number.
     *
     * @return string|null The formatted home phone number, or null if not available.
     */
    public function getHumanizedHomePhoneAttribute()
    {
        return $this->humanizePhone('home');
    }

    /**
     * Get the phone numbers from the details attribute.
     *
     * @return object|null
     */
    public function getNINAttribute()
    {
        return $this->getDetails()->nin ?? null;
    }

    /**
     * Get the status from the details attribute.
     *
     * @return string
     */
    public function getStatusAttribute()
    {
        $details = $this->getDetails();
        $status = $details->status ?? null;

        if (empty($status) && $details === null) {
            $this->initializeDetails();
            $details = $this->getDetails();
            $status = $details->status ?? null;
        }
        // If status is still null, return a default value
        if ($status === null) {
            $class = get_class($this);
            // Check if the model has a STATUS_INACTIVE constant
            if (defined("$class::STATUS_INACTIVE")) {
                return $class::STATUS_INACTIVE;
            }
            // If not, return a generic default
            return 'inactive';
        }
    }
}
