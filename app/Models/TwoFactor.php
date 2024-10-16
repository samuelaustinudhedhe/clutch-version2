<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TwoFactor extends Model
{
    use HasFactory;

    /**
     * The attributes that should be fillable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'secret', 
        'recovery_codes', 
        'confirmed_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'recovery_codes',
        'secret',
    ];


    /**
     * The attributes that should be casts.
     *
     * @var array<int, string>
     */
    protected $casts = [
        'confirmed_at' => 'datetime',
    ];

    /**
     * Get the parent authenticatable model.
     *
     * This function defines a polymorphic relationship, allowing the
     * TwoFactor model to be associated with multiple other models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     *   The morphTo relationship instance, representing the parent model
     *   that this TwoFactor instance is associated with.
     */
    public function authenticatable()
    {
        return $this->morphTo();
    }
}