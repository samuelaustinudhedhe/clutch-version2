<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = fake();
        return [
            'name' => $faker->word,
            'slug' => $faker->slug,
            'description' => $faker->paragraph,
            'price' => json_encode([
                'sale' => $faker->numberBetween(1000, 100000),
                'amount' => $faker->numberBetween(1000, 100000),
                'on_sale' => $faker->randomElement([true, false,]),
            ]),
            
            'type' => $faker->randomElement(['car', 'truck', 'motorcycle']),

            'location' => json_encode([
                'pickup' => $faker->address,
                'dropoff' => $faker->address,
            ]),

            'status' => $faker->randomElement(['available', 'unavailable', 'rented']),
            
            'rating' => $faker->randomElement(['1.0', '1.5', '2.0', '2.5', '3.0', '3.5', '4.0', '4.2', '4.5', '4.6', '4.7', '4.8', '5.0']),

            'details' => json_encode([
                'make' => $faker->company,
                'manufacturer' => $faker->company,
                'model' => $faker->word,
                'year' => $faker->year,
                'mileage' => $faker->numberBetween(0, 200000),
                'dimensions' => [
                    'length' => $faker->randomFloat(2, 3, 5), // length in meters
                    'width' => $faker->randomFloat(2, 1.5, 2.5), // width in meters
                    'height' => $faker->randomFloat(2, 1, 2), // height in meters
                ],
                'exterior' => [
                    'color' => $faker->safeColorName,
                    'type' => $faker->randomElement(['Sedan', 'SUV', 'Coupe']),
                    'doors' => $faker->numberBetween(2, 5),
                    'windows' => $faker->randomElement(['Power windows', 'Tinted windows']),
                ],
                'interior' => [
                    'seats' => $faker->numberBetween(2, 7),
                    'upholstery' => $faker->randomElement(['Leather', 'Cloth']),
                    'ac' => $faker->boolean,
                    'heater' => $faker->boolean,
                ],
            ]),

            'specifications' => json_encode([
                'engine' => [
                    'size' => $faker->randomElement(['2.5L', '3.0L', '1.8L']),
                    'hp' => $faker->numberBetween(100, 500),
                    'type' => $faker->randomElement(['Inline 4', 'V6', 'V8']),
                ],

                'transmission' => [
                    'type' => $faker->randomElement(['Automatic', 'Manual', 'Semi-Automatic']),
                    'gear_ratio' => $faker->randomFloat(1, 4, 7) . ':1',
                    'gears' => $faker->numberBetween(4, 8),
                    'oil' => $faker->randomElement(['Castrol', 'Mobil', 'Valvoline']),
                    'drivetrain' => $faker->randomElement(['FWD', 'RWD', 'AWD']),
                ],            'fuel' => [
                    'type' => $faker->randomElement(['Gasoline', 'Diesel']),
                    'economy' => $faker->randomFloat(2, 5, 15) . ' L/100km',
                ],
            ]),

            'features' => json_encode([
                'security' => json_encode([
                    'auto_lock' => $faker->boolean,
                    'alarm_system' => $faker->boolean,
                    'tracking_system' => $faker->boolean,
                ]),
                'safety' => json_encode([
                    'airbags' => $faker->randomElement(['Driver', 'Passenger', 'Side', 'Rear']),
                    'emergency_braking' => $faker->randomElement(['Automatic', 'Manual']),
                ]),
                'modifications' => json_encode([
                    'performance' => $faker->sentence,
                    'aesthetic' => $faker->sentence,
                    'interior' => $faker->sentence,
                ]),
            ]),

            'faults' => $faker->randomElement(['none', 'minor', 'major']),

            'service' => json_encode([
                'status' => $faker->randomElement(['good', 'fair', 'poor']),
                'last_service_date' => $faker->date,
                'last_inspection_date' => $faker->date,
            ]),

            'owner' => json_encode($faker->randomElement([
                [
                    'id' => \App\Models\User::inRandomOrder()->first()->id,
                    'type' => 'user',
                ],
                [
                    'id' => \App\Models\Admin::inRandomOrder()->first()->id,
                    'type' => 'admin',
                ]
            ])), // Assuming you have a User model

            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
