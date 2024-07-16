<?php

namespace App\Models;

use App\Traits\Attachments;
use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    use Attachments;

    protected $fillable = [
        'title', 'description', 'owner',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'object',
            'details' => 'array',
            'location' => 'array',
            'service' => 'array',
            'specifications' => 'array',
            'features' => 'array',
            'faults' => 'array',
            'insurance' => 'array',
            'chauffeur' => 'array',
        ];
    }

    // Example method to ensure specific keys and default values
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

            $this->exterior = $this->exterior ?? [
                'color' => '',
                'type' => '',
                'doors' => '',
                'windows' => ''
            ],

            $this->interior = $this->interior ?? [
                'seats' => 3,
                'upholstery' => 'Leather',
                'ac' => true,
                'heater' => false
            ],
            $this->dimensions = $this->dimensions ?? [
                'length' => '',
                'width' => '',
                'height' => ''
            ],

        ];

        $this->specifications = $this->specifications ?? [

            $this->engine = $this->engine ?? [
                'size' => '',
                'hp' => '',
                'type' => ''
            ],

            $this->transmission = $this->transmission ?? [
                'type' => 'Semi-Automatic',
                'gear_ratio' => '5:1',
                'gears' => 5,
                'oil' => 'Castrol',
                'drivetrain' => 'FWD'
            ],

            $this->fuel = $this->fuel ?? [
                'type' => '',
                'economy' => ''
            ]
        ];

        $this->features = $this->features ?? [

            $this->modifications = $this->modifications ?? [
                'performance' => '',
                'aesthetic' => '',
                'interior' => ''
            ],

            $this->security = $this->security ?? [
                'auto_lock' => false,
                'alarm_system' => false,
                'tracking_system' => false
            ],

            $this->safety = $this->safety ?? [
                'airbags' => '',
                'emergency_braking' => ''
            ]
        ];

        $this->service = $this->service ?? [
            'status' => '',
            'last_service_date' => null,
            'last_inspection_date' => null
        ];
    }


    public function owner()
    {
        return $this->belongsTo(User::class, 'owner');
    }
}
