<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'type',
        'notifible_id',
        'notifible_type',
        'data',
        'read_at',
        'created_at',
        'updated_at',
    ];

    public function notifible()
    {
        return $this->morphTo();
    }
}