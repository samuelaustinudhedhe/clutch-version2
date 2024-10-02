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
            $table->enum('status', [
                'upcoming',      // The trip is booked but hasn't started yet
                'ongoing',       // The trip is currently active
                'completed',     // The trip has ended successfully
                'canceled',      // The trip was canceled by either the driver or the owner
                'emergency',     // A serious issue occurred, such as an accident or kidnapping
                'accident',      // A vehicle accident occurred during the trip
                'legal_issue',   // A legal complication such as kidnapping or other criminal activity
                'under_investigation' // The trip is under investigation due to an incident
            ]);
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
