<?php

namespace App\Models;

use App\Traits\HasAttachments;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Vehicle extends Model
{
    use HasFactory, HasAttachments;

    protected $fillable = [
        'name',
        'price',
        'location',
        'details',
        'documents',
        'chauffeur',
        'ownerable_id',
        'ownerable_type',
        'ownerable'
    ];

    protected $casts = [
        'price' => 'object',
        'details' => 'object',
        'location' => 'object',
        'documents' => 'object',
        'chauffeur' => 'object',
    ];

    /**
     * Retrieve the available vehicle types.
     *
     * This static method returns an array of vehicle types by calling the `vehicleTypes` function.
     *
     * @return array The array of available vehicle types.
     */
    public static function types()
    {
        return vehicleTypes();
    }

    //Vehicle Identification Types
    public static $vits = [
        'VIN' => 'Vehicle Identification Number',
        'HIN' => 'Hull Identification Number',
        'TN' => 'Trade Number',
        'SN' => 'Serial Number',
        'UIC' => 'Unique Identification Code',
        'PIN' => 'Product Identification Number',
        'VSN' => 'Vehicle Serial Number',
        'IMN' => 'Importation Number',
        'EAN' => 'European Article Number',
        'Chassis Number' => 'Number identifying the vehicle’s chassis',
        'Frame Number' => 'Number identifying the vehicle’s frame',
        'IIN' => 'Issuing Identification Number',
        'RIN' => 'Registration Identification Number',
        'CAN' => 'Controller Area Network ID',
        'TIN' => 'Transponder Identification Number',
        'LID' => 'License Identifier',
        'BINA' => 'Boat Identification Number Assignment'
    ];

    /**
     * Retrieves brands and models for a specific vehicle type.
     *
     * This method fetches the brands and models associated with a given vehicle type.
     * It uses the 'vehicleMakesAndModels' helper function to retrieve the data.
     *
     * @param string $type The type of vehicle in plural (e.g., 'cars', 'trucks', 'motorcycles').
     * @param bool $associative Optional. Determines the format of the returned data.
     *                          If true, returns an associative array. If false, returns an indexed array.
     *                          Default is false.
     *
     * @return array An array containing the brands and models for the specified vehicle type.
     *               The structure of the array depends on the $associative parameter.
     */
    public static function getMakesAndModels($type = 'cars', $associative = false)
    {
        return vehicleMakesAndModels($type, $associative);
    }

    /**
     * Decode and retrieve the VIN attribute.
     *
     * This method decodes the JSON-encoded VIN attribute and returns it as an object.
     *
     * @return object|null The decoded VIN object, or null if the VIN attribute is not set.
     */
    public function getVin()
    {
        return json_decode($this->details->vin);
    }

    /**
     * Get the VIN type attribute.
     *
     * This accessor method retrieves the type of the vehicle's VIN from the JSON-decoded
     * VIN attribute. If the type is not set, it returns null.
     *
     * @return string|null The type of the vehicle's VIN, or null if not set.
     */
    public function getVitAttribute()
    {
        return $this->getVin()->type ?? null;
    }

    /**
     * Get the VIN number attribute.
     *
     * This accessor method retrieves the VIN number from the JSON-decoded
     * VIN attribute. If the VIN number is not set, it returns null.
     *
     * @return string|null The VIN number, or null if not set.
     */
    public function getVinAttribute()
    {
        return $this->getVin()->number ?? null;
    }


    /**
     * Get the decoded price .
     *
     * This accessor method returns the decoded price attribute as an object.
     *
     * @return object The decoded price object.
     */
    public function getPrice()
    {
        return $this->finalPrice();
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
        return humanifyPrice($this->getPrice()->amount);
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
        return humanifyPrice($this->sale_price);
    }

    /**
     * Get the formatted human-readable sale price attribute.
     *
     * This accessor method formats the sale price into a human-readable string,
     * including the currency symbol and amount with two decimal places.
     *
     * @return string The formatted sale price with the currency symbol.
     */
    public function getHumanDiscountedPriceAttribute()
    {
        return humanifyPrice($this->discountedPrice());
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
        $price = $this->getPrice();
        return $price->sale ?? null;
    }

    /**
     * Calculate the discount percentage based on the sale and original price.
     *
     * This method calculates the discount percentage if the vehicle is on sale.
     * If not on sale, it returns 0.
     *
     * @param bool $symbol Whether to include the percentage symbol in the return value.
     * @return string|int The discount percentage (with or without the % symbol) or 0 if not on sale.
     */
    public function discount(bool $symbol = false): string|int
    {
        $price = $this->getPrice();
        $on_sale = $price->on_sale ?? false;
        $amount = $price->amount ?? 0;
        $sale = $price->sale ?? 0;

        if ($amount <= 0 || !$on_sale) {
            return $symbol ? '0%' : 0;
        }

        $discount = round((($amount - $sale) / $amount) * 100);

        return $symbol ? $discount . '%' : $discount;
    }


    /**
     * Calculate the discounted price based on the sale and original price.
     *
     * This method calculates the discounted price if the vehicle is on sale.
     * If not on sale, it returns the original price.
     *
     * @return float The discounted price or the original price if not on sale.
     */
    public function discountedPrice()
    {
        $price = $this->getPrice();
        $sale = $price->sale ?? 0;
        $on_sale = $price->on_sale ?? false;
        $amount = $price->amount ?? 0;

        if ($on_sale) {
            return $amount - $sale;
        }
        return $amount;
    }

    public function getDiscountDaysAttribute()
    {
        return $this->getPrice()->discount->days ?? 1;
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
        $price = $this->getPrice();
        return $price->on_sale === "true" || $price->on_sale === 1;
    }

    /**
     * Calculate and return the final price of the vehicle.
     *
     * This method checks if the vehicle is on sale and adjusts the price attributes accordingly.
     * If the sale price is greater than the original amount, it swaps the values and saves the changes.
     *
     * @return object The final price object after any necessary adjustments.
     */
    public function finalPrice()
    {
        $price = $this->price;
        $sale = $price->sale ?? 0;
        $on_sale = $price->on_sale ?? false;
        $amount = $price->amount ?? 0;

        if ($on_sale && $sale > $amount) {
            $price->sale = $amount;
            $price->amount = $sale;
            $this->price = $price;
            $this->save();
        }
        return $this->price;
    }

    public function tax()
    {
        $price = $this->finalPrice();
        $amount = $price->amount ?? 0;
        $sale = $price->sale ?? 0;
        $on_sale = $price->on_sale ?? false;
        $basePrice = $on_sale ? $sale : $amount;
        $taxRate = 0.07; // 7% tax rate
        $taxAmount = $basePrice * $taxRate;
        return $taxAmount;
    }

    /**
     * Calculate the total tax amount for the vehicle.
     *
     * This method calculates the total tax by multiplying the base tax amount
     * with a given multiplier. It can return the result as a human-readable
     * string or as a raw numeric value.
     *
     * @param float $multiplier The multiplier to apply to the base tax amount.
     * @param bool $human Optional. Whether to return the tax as a human-readable string.
     *                    Defaults to true.
     * @return string|float The total tax amount, either as a formatted string
     *                      (if $human is true) or as a raw numeric value.
     */
    public function calcTotalTax($multiplier, $human = true)
    {
        $taxAmount = $this->tax() * $multiplier;
        if ($human) {
            return humanifyPrice($taxAmount);
        }
        return $taxAmount;
    }

    /**
     * Calculate the total price of the vehicle.
     *
     * This method calculates the total price of the vehicle by multiplying the base price or sale price
     * by a given multiplier. It can return the result as a human-readable string with a currency symbol
     * or as a raw numeric value.
     *
     * @param int $multiplier The multiplier to apply to the base or sale price.
     * @param bool $human Optional. Whether to return the price as a human-readable string with a currency symbol.
     *                    Defaults to true.
     * @return string|float The total price of the vehicle, either as a formatted string with a currency symbol
     *                      or as a raw numeric value.
     */
    public function calcTotalPrice($multiplier, $tax = false, $human = true)
    {
        $price = $this->getPrice();
        $sale = $price->sale ?? 0;
        $on_sale = $price->on_sale ?? false;
        $amount = $price->amount ?? 0;
        $basePrice = $on_sale ? $sale : $amount;

        if ($tax) {
            $basePrice += $this->tax();
        }

        if (!$human) {
            return $basePrice * $multiplier;
        } else {
            return humanifyPrice($basePrice * $multiplier);
        }
    }

    /**
     * Get the decoded details attribute.
     *
     * This method decodes the JSON-encoded details attribute and returns it as an object.
     *
     * @return object The decoded details object.
     */
    public function getDetails()
    {
        $details = $this->details;

        if (is_string($details)) {
            return json_decode($details);
        }

        return $details; // Assuming it's already an object or array
    }

    /**
     * Get the type attribute from the vehicle's details.
     *
     * This accessor method retrieves the type of the vehicle from the JSON-decoded
     * details attribute. If the type is not set, it returns null.
     *
     * @return string|null The type of the vehicle, or null if not set.
     */
    public function getTypeAttribute()
    {
        return $this->getDetails()->type ?? null;
    }

    /**
     * Get the make attribute from the vehicle's details.
     *
     * This accessor method retrieves the make of the vehicle from the JSON-decoded
     * details attribute. If the make is not set, it returns null.
     *
     * @return string|null The make of the vehicle, or null if not set.
     */
    public function getMakeAttribute()
    {
        return $this->getDetails()->make ?? null;
    }

    /**
     * Get the model attribute from the vehicle's details.
     *
     * This accessor method retrieves the model of the vehicle from the JSON-decoded
     * details attribute. If the model is not set, it returns null.
     *
     * @return string|null The model of the vehicle, or null if not set.
     */
    public function getModelAttribute()
    {
        return $this->getDetails()->model ?? null;
    }

    /**
     * Get the manufacturer attribute from the vehicle's details.
     *
     * This accessor method retrieves the manufacturer of the vehicle from the JSON-decoded
     * details attribute. If the manufacturer is not set, it returns null.
     *
     * @return string|null The manufacturer of the vehicle, or null if not set.
     */
    public function getManufacturerAttribute()
    {
        return $this->getDetails()->manufacturer ?? null;
    }

    /**
     * Get the year attribute from the vehicle's details.
     *
     * This accessor method retrieves the year of the vehicle from the JSON-decoded
     * details attribute. If the year is not set, it returns null.
     *
     * @return int|null The year of the vehicle, or null if not set.
     */
    public function getYearAttribute()
    {
        return $this->getDetails()->year ?? null;
    }


    /**
     * Retrieve the description attribute from the vehicle's details.
     *
     * This accessor method retrieves the description of the vehicle from the JSON-decoded
     * details attribute. If the description is not set, it returns null.
     *
     * @return string|null The description of the vehicle, or null if not set.
     */
    public function getDescriptionAttribute()
    {
        return $this->details->description ?? null;
    }


    /**
     * Get the exterior attribute from the vehicle's details.
     *
     * This accessor method retrieves the exterior details of the vehicle from the JSON-decoded
     * details attribute. If the exterior details are not set, it returns null.
     *
     * @return string|null The exterior details of the vehicle, or null if not set.
     */
    public function getExteriorAttribute()
    {
        return $this->getDetails()->exterior ?? null;
    }

    /**
     * Get the interior attribute from the vehicle's details.
     *
     * This accessor method retrieves the interior details of the vehicle from the JSON-decoded
     * details attribute. If the interior details are not set, it returns null.
     *
     * @return string|null The interior details of the vehicle, or null if not set.
     */
    public function getInteriorAttribute()
    {
        return $this->getDetails()->interior ?? null;
    }

    /**
     * Get the dimensions attribute from the vehicle's details.
     *
     * This accessor method retrieves the dimensions of the vehicle from the JSON-decoded
     * details attribute. If the dimensions are not set, it returns null.
     *
     * @return string|null The dimensions of the vehicle, or null if not set.
     */
    public function getDimensionsAttribute()
    {
        return $this->getDetails()->dimensions ?? null;
    }

    /**
     * Get the engine attribute from the vehicle's details.
     *
     * This accessor method retrieves the engine details of the vehicle from the JSON-decoded
     * details attribute. If the engine details are not set, it returns null.
     *
     * @return string|null The engine details of the vehicle, or null if not set.
     */
    public function getEngineAttribute()
    {
        return $this->getDetails()->engine ?? null;
    }

    /**
     * Get the transmission attribute from the vehicle's details.
     *
     * This accessor method retrieves the transmission details of the vehicle from the JSON-decoded
     * details attribute. If the transmission details are not set, it returns null.
     *
     * @return string|null The transmission details of the vehicle, or null if not set.
     */
    public function getTransmissionAttribute()
    {
        return $this->getDetails()->transmission ?? null;
    }

    /**
     * Get the fuel attribute from the vehicle's details.
     *
     * This accessor method retrieves the fuel details of the vehicle from the JSON-decoded
     * details attribute. If the fuel details are not set, it returns null.
     *
     * @return string|null The fuel details of the vehicle, or null if not set.
     */
    public function getFuelAttribute()
    {
        return $this->getDetails()->fuel ?? null;
    }

    /**
     * Get the modifications attribute from the vehicle's details.
     *
     * This accessor method retrieves the modifications details of the vehicle from the JSON-decoded
     * details attribute. If the modifications details are not set, it returns null.
     *
     * @return string|null The modifications details of the vehicle, or null if not set.
     */
    public function getModificationsAttribute()
    {
        return $this->getDetails()->modifications ?? null;
    }

    /**
     * Get the safety attribute from the vehicle's details.
     *
     * This accessor method retrieves the safety details of the vehicle from the JSON-decoded
     * details attribute. If the safety details are not set, it returns null.
     *
     * @return string|null The safety details of the vehicle, or null if not set.
     */
    public function getSafetyAttribute()
    {
        return $this->getDetails()->safety ?? null;
    }

    /**
     * Get the service attribute from the vehicle's details.
     *
     * This accessor method retrieves the service details of the vehicle from the JSON-decoded
     * details attribute. If the service details are not set, it returns null.
     *
     * @return string|null The service details of the vehicle, or null if not set.
     */
    public function getServiceAttribute()
    {
        return $this->getDetails()->service ?? null;
    }

    /**
     * Get the faults attribute from the vehicle's details.
     *
     * This accessor method retrieves the faults of the vehicle from the JSON-decoded
     * details attribute. If the faults are not set, it returns null.
     *
     * @return string|null The faults of the vehicle, or null if not set.
     */
    public function getFaultsAttribute()
    {
        return $this->getDetails()->faults ?? null;
    }

    /**
     * Define a polymorphic relationship to the owner model.
     *
     * This method sets up a polymorphic relationship, allowing the vehicle to belong to
     * multiple types of models (e.g., User, Admin) through a single association.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo The polymorphic relationship instance.
     */
    public function ownerable()
    {
        return $this->morphTo();
    }

    /**
     * Define a relationship with the User model for the owner.
     *
     * This method sets up a belongs-to relationship with the User model,
     * indicating that each vehicle is owned by a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo The related User or Admin model instance.
     */
    public function getOwnerAttribute()
    {
        return $this->ownerable;
    }

    /**
     * Retrieve the gallery attribute for the vehicle.
     *
     * This method returns the gallery associated with the vehicle, specifically for the 'car' category.
     *
     * @return mixed The gallery data for the 'car' category.
     */
    public function getGalleryAttribute()
    {
        return $this->gallery('car');
    }

    /**
     * Retrieve the featured image attribute for the vehicle.
     *
     * This accessor method returns the featured image associated with the vehicle,
     * specifically for the 'car' category.
     *
     * @return mixed The featured image data for the 'car' category.
     */
    public function getFeaturedImageAttribute()
    {
        return $this->featuredImage('car');
    }

    /**
     * Retrieve the URL of the featured image for the vehicle.
     *
     * This accessor method returns the URL of the featured image associated with the vehicle,
     * specifically for the 'car' category.
     *
     * @return string The URL of the featured image for the 'car' category.
     */
    public function getFeaturedImageUrlAttribute()
    {
        return $this->featuredImage('car')->url;
    }


    /**
     * Set the price attribute for the vehicle.
     *
     * This method formats and sanitizes the price data before storing it.
     * It handles various price-related fields including sale status, amount, sale price,
     * currency, and discount information.
     *
     * @param array $value An associative array containing price-related data.
     *                     Expected keys:
     *                     - 'on_sale' (bool): Whether the vehicle is on sale.
     *                     - 'amount' (string|int): The regular price of the vehicle.
     *                     - 'sale' (string|int): The sale price of the vehicle, if applicable.
     *                     - 'currency' (string): The currency code for the price.
     *                     - 'discount' (array): Contains discount information.
     *                       - 'days' (int): Number of days for the discount period.
     *
     * @return void
     */
    public function setPriceAttribute($value)
    {
        // Helper function to clean and convert price values
        $cleanPrice = function($price) {
            if (is_null($price)) return null;
            return (int) str_replace(',', '', $price);
        };

        // Check that each key exists and has the right type
        $formattedPrice = [
            'on_sale' => filter_var($value['on_sale'] ?? false, FILTER_VALIDATE_BOOLEAN),
            'amount' => $cleanPrice($value['amount'] ?? null) ?? 50000,
            'sale' => $cleanPrice($value['sale'] ?? null) ?? 0,
            'currency' => $value['currency'] ?? app_currency(),
            'discount' => [
                'days' => (int) ($value['discount']['days'] ?? 1),
            ],
            // add more as needed
        ];

        // Store the correctly formatted data
        $this->attributes['price'] = json_encode($formattedPrice);
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
        return $this->discount() > 0 ? 'green-400' : 'white';
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
}
