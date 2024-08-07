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
        $details = json_decode($this->details);
        return $details;
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
     * Get the phone numbers from the details attribute.
     *
     * @return object|null
     */
    public function getPhoneAttribute()
    {
        return $this->getDetails()->phone ?? null;
    }
}