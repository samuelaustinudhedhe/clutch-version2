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
        Schema::create('trips', function (Blueprint $table) {
            $table->id()->startingValue(10061100044);
            $table->string('status')->nullable();
            $table->json('details')->default(json_encode([
                'start' => [
                    'location' => [
                        'latitude' => '',
                        'longitude' => '',
                        'full' => '',
                        'city' => '',
                        'country' => '',
                        'state' => '',
                        'postal_code' => '',
                        'street' => '',
                    ],
                    'date' => '',
                ],
                'end' => [
                    'location' => [
                        'latitude' => '',
                        'longitude' => '',
                        'full' => '',
                        'city' => '',
                        'country' => '',
                        'state' => '',
                        'postal_code' => '',
                        'street' => '',
                    ],
                    'date' => '',
                ],
                'distance' => 0,
                'price' => [],
                'passengers' => [],
                'insurance' => [],
            ])); //Details about the trip, including details about the start and end locations, distance, price, passengers, insurance, etc.
            $table->morphs('traveler'); // Polymorphic fields for traveler (User or Admin)
            $table->foreignId('vehicle_id')->constrained('vehicles'); // The vehicle being booked
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
