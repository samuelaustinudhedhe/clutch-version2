<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id()->startingValue(28450000051);
            $table->string('name');
            $table->json('price')->nullable();
            $table->string('status')->default('active');
            $table->json('location');
            $table->json('details')->default(
                json_encode([
                    'vin' => [
                        'type' => '', // vehicle identification type VIN, HIN, TN, SN, UIC, PIN, VSN etc
                        'number' => '', // vehicle identification number 
                    ],
                    'description' => '',
                    
                    // Vehicle Basic Information
                    'type' => '', // vehicle type (e.g., car, motorcycle, truck, van, bus, pickup truck, SUV, convertible, etc.)
                    'make' => '', // Vehicle make (e.g., Toyota, Honda, Ford, Chevrolet, etc.)
                    'manufacturer' => '', // Vehicle manufacturer (e.g., Toyota, Honda, Ford, Chevrolet)
                    'model' => '', // Vehicle model (e.g., Camry, Accord, Explorer, Corvette, etc.)
                    'year' => '', // Vehicle year (e.g., 2020, 2019, 2018, etc.)
                    'millage' => 'unknown ', // Vehicle mileage (e.g., 15000, 20000, 25000, etc.)
                    // Exterior Details
                    'exterior' => [
                        'color' => '', // Exterior color
                        'type' => '', // Exterior type
                        'doors' => 0, // Number of doors
                        'windows' => '', // Type of windows
                    ],

                    // Interior Details
                    'interior' => [
                        'seats' => 0, // Number of seats
                        'upholstery' => '', // Upholstery type
                        'ac' => '', // Air conditioning availability
                        'heater' => '', // Heater availability
                    ],

                    // Dimensions
                    'dimensions' => [
                        'length' => '', // Length of the vehicle
                        'width' => '', // Width of the vehicle
                        'height' => '', // Height of the vehicle
                    ],

                    // Engine Details
                    'engine' => [
                        'size' => '', // Engine size
                        'hp' => '', // Horsepower
                        'type' => '', // Engine type
                    ],

                    // Transmission Details
                    'transmission' => [
                        'type' => '', // Transmission type
                        'gear_ratio' => '', // Gear ratio
                        'gears' => '', // Number of gears
                        'oil' => '', // Oil type
                        'drivetrain' => '', // Drivetrain type
                    ],

                    // Fuel Details
                    'fuel' => [
                        'type' => '', // Fuel type
                        'economy' => '', // Fuel economy
                    ],

                    // Modifications
                    'modifications' => [
                        'performance' => '', // Performance modifications
                        'aesthetic' => '', // Aesthetic modifications
                        'interior' => '', // Interior modifications
                    ],

                    // Security Features
                    'security' => [
                        'auto_lock' => '', // Auto lock availability
                        'alarm_system' => '', // Alarm system availability
                        'tracking_system' => '', // Tracking system availability
                    ],

                    // Safety Features
                    'safety' => [
                        'airbags' => '', // Airbags availability
                        'emergency_braking' => '', // Emergency braking system availability
                    ],

                    // Service Information
                    'service' => [
                        'status' => '', // Service status (e.g., serviced, in service, overdue, pending etc.)
                        'last_service_date' => '', // Last service date
                        'last_inspection_date' => '', // Last inspection date
                    ],
                    'faults' => '', // Faults (e.g., brakes, tires, air conditioning, lights, etc.)
                ])
            )->nullable();
            $table->json('insurance')->nullable();
            $table->json('chauffeur')->nullable();
            $table->morphs('ownerable'); // Polymorphic fields for author (User or Admin)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
