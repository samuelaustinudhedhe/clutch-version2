<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'details',
        'price',
        'payment',
        'authorable_type',
        'authorable_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'details' => 'array',
        'price' => 'array',
        'payment' => 'array',
    ];

    /**
     * Get the parent orderable model (Trip, Refund, Insurance, etc.).
     */
    public function orderable()
    {
        return $this->morphTo();
    }

    /**
     * Get the author of the order (User, Admin, etc.).
     */
    public function authorable()
    {
        return $this->morphTo();
    }

    /**
     * Scope a query to only include orders with a specific status.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $status
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithStatus($query, $status)
    {
        return $query->whereJsonContains('payment->status', $status);
    }

    /**
     * Get the total price of the order.
     *
     * @return float
     */
    public function getTotalPriceAttribute()
    {
        return $this->price['total'] ?? 0;
    }

    /**
     * Get the humanized total price of the order.
     *
     * @return string
     */
    public function getHumanTotalPriceAttribute()
    {
        return humanizePrice($this->getTotalPriceAttribute());
    }

    /**
     * Get the tax amount of the order.
     *
     * @return float
     */
    public function getTaxAttribute()  
    {
        return $this->cleanValue($this->price['tax']) ?? 0;
    }

    private function cleanValue($value)
    {
        if (is_string($value)) {
            $value = preg_replace('/[^0-9.]/', '', $value);
        }
        return is_numeric($value) ? (float) $value : $value;
    }

    /**
     * Get the humanized tax amount of the order.
     *
     * @return string
     */
    public function getHumanTaxAttribute()
    {
        return humanizePrice($this->getTaxAttribute());
    }

    /**
     * Get the discount amount of the order.
     *
     * @return float
     */
    public function getDiscountAttribute()
    {
        return $this->price['discount'] ?? 0;
    }

    /**
     * Get the humanized discount amount of the order.
     *
     * @return string
     */
    public function getHumanDiscountAttribute()
    {
        return humanizePrice($this->getDiscountAttribute());
    }

}