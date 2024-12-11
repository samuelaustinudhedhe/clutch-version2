<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'details',
        'vehicle_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'details' => 'array',
    ];

    /**
     * The default attributes for the details column.
     *
     * This is a JSON object, which can be used to store additional information about the trip.
     *
     * @var array
     * 
     * Example:
     * {
     *    "origin" => "San Francisco",
     *    "destination" => "New York",
     * }
     */

    protected $attributes = [
        'details' => '{}', // Default empty JSON object
    ];

    /**
     * Get the first order of the trip.
     *
     * This function retrieves the first order associated with the trip using a polymorphic relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne The first Order model related to this trip.
     */
    public function firstOrder()
    {
        return $this->morphOne(Order::class, 'orderable')->oldestOfMany();
    }

    /**
     * Get all of the trip's orders.
     *
     * This function retrieves all orders associated with the trip using a polymorphic relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany A collection of Order models related to this trip.
     */
    public function orders()
    {
        return $this->morphMany(Order::class, 'orderable');
    }

    /**
     * Get the traveler associated with the trip.
     */
    public function traveler()
    {
        return $this->morphTo();
    }

    /**
     * Get the vehicle associated with the trip.
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    /**
     * Get the details attribute as an object.
     *
     * @return object
     */
    public function getDetailsAttribute($value)
    {
        return json_decode($value) ?? new \stdClass();
    }

    /**
     * Calculate the number of days between the start and end times of the trip.
     *
     * @return int The number of days between the start and end times.
     */
    public function getDaysAttribute()
    {
        $startDateTime = new \DateTime();
        $startDateTime->setTimestamp($this->details->start->timestamp);

        $endDateTime = new \DateTime();
        $endDateTime->setTimestamp($this->details->end->timestamp);

        // Calculate the difference between the start and end times
        $diff = $endDateTime->diff($startDateTime);

        // Return the number of days
        return $diff->days;
    }

    /**
     * Calculate the number of hours between the start and end times of the trip.
     *
     * This function retrieves the start and end times from the trip's details, calculates the difference between them,
     * and returns the number of hours.
     *
     * @return int The number of hours between the start and end times.
     */
    public function getTimeAttribute()
    {
        $startDateTime = new \DateTime();
        $startDateTime->setTimestamp($this->details->start->timestamp);

        $endDateTime = new \DateTime();
        $endDateTime->setTimestamp($this->details->end->timestamp);

        // Calculate the difference between the start and end times
        $diff = $endDateTime->diff($startDateTime);

        // Return the number of hours
        return $diff->h;
    }

    /**
     * Get the base price of the trip.
     *
     * This accessor method returns the base price of the trip.
     *
     * @return float The base price of the trip.
     */
    public function getPriceAttribute()
    {
        // Assuming you have a base price stored in the details or another column
        return $this->details->price ?? 0;
    }

    public function getTotalUnpaidPriceAttribute()
    {
        // Assuming you have a total unpaid price stored in the details or another column
        return ($this->details->total - $this->details->total_paid) ?? 0;
    }

    /**
     * Get the total price of the trip.
     *
     * This accessor method calculates and returns the total price of the trip,
     * which may include additional fees or discounts.
     *
     * @return float The total price of the trip.
     */
    public function getTotalPriceAttribute()
    {
        // Calculate the total price based on the base price and any additional logic
        $price = $this->price;

        // Example: Calculate total price based on the number of days
        $totalPrice = $price->total;

        // Add any additional fees or discounts here if applicable

        return $totalPrice;
    }
    /**
     * Get the maximum allowed distance for the trip.
     *
     * This accessor method retrieves the maximum allowed distance from the trip's details.
     * If the maximum allowed distance is not set, it defaults to 'Unlimited'.
     *
     * @return string The maximum allowed distance for the trip.
     */
    public function getMaxAllowedDistanceAttribute()
    {
        return $this->details->distance->max_allowed ?? 'Unlimited';
    }

    /**
     * Get the insurance type associated with the trip.
     *
     * This accessor method retrieves the insurance type from the trip's details.
     * If the insurance type is not set, it defaults to 'none'.
     *
     * @return string The insurance type associated with the trip.
     */
    public function getInsuranceAttribute()
    {
        return $this->details->insurance ?? null;
    }

    public function getTaxAttribute()
    {
        return $this->details->price->tax ?? 0;
    }

    public function getTotalPaidAttribute()
    {
        return $this->details->price->total_paid ?? 0;
    }
    public function getTotalUnPaidAttribute()
    {
        return ($this->details->price->total - $this->total_paid) ?? 0;
    }

    public function getVehiclePriceAttribute()
    {
        return ($this->total_paid - $this->tax) / $this->days;
    }


    public function getStartAttribute()
    {
        return $this->details->start;
    }
    public function getEndAttribute()
    {
        return $this->details->end;
    }

    /**
     * Get the start time of the trip.
     *
     * This accessor method retrieves the start time from the trip's details.
     *
     * @return \DateTime|null The start time of the trip, or null if not set.
     */
    public function getStartDateAttribute()
    {
        return isset($this->start) ? (new \DateTime())->setTimestamp($this->start->timestamp) : null;
    }

    /**
     * Get the end time of the trip.
     *
     * This accessor method retrieves the end time from the trip's details.
     *
     * @return \DateTime|null The end time of the trip, or null if not set.
     */
    public function getEndDateAttribute()
    {
        return isset($this->end) ? (new \DateTime())->setTimestamp($this->end->timestamp) : null;
    }
    /**
     * Get the color associated with the trip's status.
     *
     * This accessor method returns a color string based on the trip's status.
     * The color is used for visual representation of different statuses.
     *
     * @return string The color associated with the trip's status.
     *                Defaults to 'slate' if the status does not match any predefined statuses.
     */
    public function getStatusColorAttribute()
    {
        return [
            'pending' => 'bg-yellow-200 text-yellow-800 dark:bg-yellow-300 dark:text-yellow-900',
            'active' => 'bg-green-200 text-green-800 dark:bg-green-300 dark:text-green-900',
            'completed' => 'bg-blue-200 text-blue-800 dark:bg-blue-300 dark:text-blue-900',
        ][$this->status] ?? 'bg-slate-200 text-slate-800 dark:bg-slate-300 dark:text-slate-900'; // Default color if status is not matched
    }

    /**
     * Get the background color associated with the trip's status.
     *
     * This accessor method returns the background color string based on the trip's status.
     *
     * @return string The background color associated with the trip's status.
     *                Defaults to 'bg-slate-200' if the status does not match any predefined statuses.
     */
    public function getStatusBackgroundColorAttribute()
    {
        return [
            'pending' => 'bg-yellow-200 dark:bg-yellow-300',
            'active' => 'bg-green-200 dark:bg-green-300',
            'completed' => 'bg-blue-200 dark:bg-blue-300',
        ][$this->status] ?? 'bg-slate-200 dark:bg-slate-300'; // Default background color if status is not matched
    }

    /**
     * Get the text color associated with the trip's status.
     *
     * This accessor method returns the text color string based on the trip's status.
     *
     * @return string The text color associated with the trip's status.
     *                Defaults to 'text-slate-800' if the status does not match any predefined statuses.
     */
    public function getStatusTextColorAttribute()
    {
        return [
            'pending' => 'text-yellow-800 dark:text-yellow-900',
            'active' => 'text-green-800 dark:text-green-900',
            'completed' => 'text-blue-800 dark:text-blue-900',
        ][$this->status] ?? 'text-slate-800 dark:text-slate-900'; // Default text color if status is not matched
    }
}
