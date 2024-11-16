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
     * Get all of the trip's orders.
     *
     * This function retrieves all orders associated with the trip using a polymorphic relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany A collection of Order models related to this trip.
     */
    public function order()
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
