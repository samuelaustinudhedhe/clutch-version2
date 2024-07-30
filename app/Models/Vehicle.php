<?php

namespace App\Models;

use App\Traits\Attachments;
use Attribute;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function Pest\Laravel\json;

class Vehicle extends Model
{
    use HasFactory, Attachments;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'rating',
        'price',
        'type',
        'location',
        'details',
        'specifications',
        'features',
        'service',
        'faults',
        'insurance',
        'chauffeur',
        'owner',
    ];

    protected $casts = [
        'price' => 'object',
        'owner' => 'object',
        'details' => 'array',
        'location' => 'array',
        'service' => 'array',
        'specifications' => 'array',
        'features' => 'array',
        'faults' => 'array',
        'insurance' => 'array',
        'chauffeur' => 'array',
    ];

    /**
     * Set default values for attributes if they are not set.
     *
     * This method initializes default values for attributes such as price,
     * details, specifications, features, and service to ensure that they
     * always have a defined structure.
     *
     * @return void
     */
    public function setDefaults()
    {
        $this->price = $this->price ?? [
            'sale' => '',
            'amount' => '',
            'on_sale' => false,
        ];

        $this->details = $this->details ?? [
            'make' => '',
            'manufacturer' => '',
            'model' => '',
            'year' => '',
            'exterior' => [
                'color' => '',
                'type' => '',
                'doors' => '',
                'windows' => '',
            ],
            'interior' => [
                'seats' => 3,
                'upholstery' => 'Leather',
                'ac' => true,
                'heater' => false,
            ],
            'dimensions' => [
                'length' => '',
                'width' => '',
                'height' => '',
            ],
        ];

        $this->specifications = $this->specifications ?? [
            'engine' => [
                'size' => '',
                'hp' => '',
                'type' => '',
            ],
            'transmission' => [
                'type' => 'Semi-Automatic',
                'gear_ratio' => '5:1',
                'gears' => 5,
                'oil' => 'Castrol',
                'drivetrain' => 'FWD',
            ],
            'fuel' => [
                'type' => '',
                'economy' => '',
            ],
        ];

        $this->features = $this->features ?? [
            'modifications' => [
                'performance' => '',
                'aesthetic' => '',
                'interior' => '',
            ],
            'security' => [
                'auto_lock' => false,
                'alarm_system' => false,
                'tracking_system' => false,
            ],
            'safety' => [
                'airbags' => '',
                'emergency_braking' => '',
            ],
        ];

        $this->service = $this->service ?? [
            'status' => '',
            'last_service_date' => null,
            'last_inspection_date' => null,
        ];
    }

    /**
     * Get the color associated with the vehicle's status.
     *
     * This accessor method returns a color string based on the vehicle's status.
     * The color is used for visual representation of different statuses.
     *
     * @return string The color associated with the vehicle's status.
     *                Defaults to 'slate' if the status does not match any predefined statuses.
     */
    public function getStatusColorAttribute()
    {
        return [
            'available' => 'green',
            'unavailable' => 'red',
        ][$this->status] ?? 'slate'; // Default
    }

    /**
     * Get the color associated with the vehicle's type.
     *
     * This accessor method returns a color string based on the vehicle's type.
     * The color is used for visual representation of different vehicle types.
     *
     * @return string The color associated with the vehicle's type.
     *                Defaults to 'slate' if the type does not match any predefined types.
     */
    public function getTypeColorAttribute()
    {
        return [
            'truck' => 'emerald',
            'car' => 'blue',
            'motorcycle' => 'sky',
            'bus' => 'amber',
            'bicycle' => 'violet',
            'van' => 'orange',
            'suv' => 'pink',
            'pickup' => 'teal',
            'tractor' => 'stone',
            'scooter' => 'lime',
            'atv' => 'indigo',
            'rv' => 'cyan',
            'minivan' => 'fuchsia',
        ][$this->type] ?? 'slate'; // Default color if type is not matched
    }

    /**
     * Get the formatted human-readable price attribute.
     *
     * This accessor method formats the price attribute into a human-readable string,
     * including the currency symbol and amount with two decimal places.
     *
     * @return string The formatted price with the currency symbol.
     */
    public function getHumanPriceAttribute()
    {
        return app_currency_symbol() . ' ' . number_format($this->get_price->amount);
    }

    /**
     * Get the formatted human-readable sale price attribute.
     *
     * This accessor method formats the sale price into a human-readable string,
     * including the currency symbol and amount with two decimal places.
     *
     * @return string The formatted sale price with the currency symbol.
     */
    public function getHumanSalePriceAttribute()
    {
        return app_currency_symbol() . ' ' . number_format($this->get_price->sale);
    }

    /**
     * Get the sale price from the price attribute.
     *
     * This method extracts and returns the sale price from the JSON-decoded
     * price attribute.
     *
     * @return float|null The sale price.
     */
    public function getSalePriceAttribute()
    {
        $price = json_decode($this->price);
        return $price->sale ?? null;
    }

    /**
     * Calculate the discount percentage based on the sale and original price.
     *
     * This method calculates the discount percentage if the vehicle is on sale.
     * If not on sale, it returns 0.
     *
     * @return float The discount percentage or 0 if not on sale.
     */
    public function discount($symbol = true)
    {
        $price = json_decode($this->price);
        $sale = $price->sale ?? 0;
        $on_sale = $price->on_sale ?? false;
        $amount = $price->amount ?? 0;
        $discount = '';
        if ($symbol) {
            $symbol = '%';
        }

        if ($on_sale) {
            $discount = round((($amount - $sale) / $amount) * 100);
        }
        return $discount >= 0 ? $discount . $symbol : 0 . $symbol;
    }

    /**
     * Determine if the vehicle is on sale and return the corresponding color.
     *
     * This accessor method returns a color string based on whether the vehicle is on sale.
     * The color is used for visual representation of the sale status.
     *
     * @return string The color associated with the sale status.
     *                'green' if on sale, otherwise 'red'.
     */
    public function getOnSaleStatusColorAttribute()
    {
        return $this->discount(false) > 0 ? 'green-400' : 'white';
    }
    /**
     * Determine if the vehicle is on sale.
     *
     * This accessor method returns whether the vehicle is currently on sale.
     *
     * @return bool True if on sale, otherwise false.
     */
    public function getOnSaleAttribute()
    {
        return $this->get_price->on_sale ?? false;
    }

    /**
     * Get the price attribute as an object.
     *
     * This accessor method decodes the JSON-encoded price attribute and returns it
     * as an object.
     *
     * @return object The decoded price object.
     */
    public function price()
    {
        $price = json_decode($this->price);
        $sale = $price->sale ?? 0;
        $on_sale = $price->on_sale ?? false;
        $amount = $price->amount ?? 0;

        if ($on_sale) {
            return $sale;
        }
        return $amount;
    }

    /**
     * Get the decoded price attribute.
     *
     * This accessor method returns the decoded price attribute as an object.
     *
     * @return object The decoded price object.
     */
    public function getGetPriceAttribute()
    {
        return json_decode($this->price);
    }

    /**
     * Get the rating stars as a string.
     *
     * This accessor method returns a string of stars representing the vehicle's rating
     * on a 5-star scale. Full stars (★) represent the rating, and empty stars (☆) fill
     * the remaining slots.
     *
     * @return string The rating represented as stars.
     */
    public function getRatingStarsAttribute()
    {
        $rating = $this->rating ?? 0; // Default rating is 0 if not set
        return str_repeat('★', $rating) . str_repeat('☆', 5 - $rating); // Assume a 5-star rating system
    }

    /**
     * Define a relationship with the User model for the owner.
     *
     * This method sets up a belongs-to relationship with the User model,
     * indicating that each vehicle is owned by a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|null The related User or Admin model instance, or null if the owner is not set or invalid.
     * @throws Exception If the owner type is invalid.
     */
    public function owner()
    {
        // Get the owner attribute
        $owner = $this->owner;

        // Check if the owner attribute is set and has type and id properties
        if ($owner && isset($owner->type, $owner->id)) {
            $modelClass = $owner->type;

            // Determine the model class based on the owner type
            if ($modelClass === 'user') {
                $modelClass = 'App\Models\User';
            } elseif ($modelClass === 'admin') {
                $modelClass = 'App\Models\Admin';
            } elseif (strpos($modelClass, 'App\Models') == false) {
                $modelClass = 'App\Models\\' . ucwords($modelClass);
            } else {
                throw new Exception('Invalid owner type: ' . $owner->type);
            }

            // Find and return the owner model instance by id
            return $modelClass::find($owner->id);
        }

        // Return null if the owner is not set or invalid
        return null;
    }

    public function getOwnerTypeAttribute(){
        $owner = $this->owner;
        return $owner->type;
    }

    public function getOwnerIdAttribute(){
        $owner = $this->owner;
        return $owner->id;
    }
    
}
