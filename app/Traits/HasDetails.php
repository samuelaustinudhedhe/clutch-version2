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
        $details->$key = $value;
        $this->details = json_encode($details);
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
     * Get the phone numbers from the details attribute.
     *
     * @return object|null
     */
    public function getStatusAttribute()
    {
        return $this->getDetails()->status ?? $this->getVerification()->account->status;
    }
}
