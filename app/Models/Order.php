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
}