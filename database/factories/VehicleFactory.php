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
        return [
            'name' => fake()->word,
            'slug' => fake()->slug,
            'vin' => $this->generateVin(),
            'description' => fake()->paragraph,
            'price' => $this->generatePrice(),
            'location' => $this->generateLocation(),
            'status' => fake()->randomElement(['available', 'unavailable', 'rented']),
            'rating' => fake()->randomElement(['1.0', '1.5', '2.0', '2.5', '3.0', '3.5', '4.0', '4.2', '4.5', '4.6', '4.7', '4.8', '5.0']),
            'details' => $this->generateDetails(),
            'ownerable_id' => $this->generateOwnerable()->id,
            'ownerable_type' => $this->generateOwnerable()->getMorphClass(),

            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    /**
     * Generate a Vehicle Identification Number (VIN) or similar identifier.
     *
     * This function creates a JSON-encoded string representing a vehicle identifier,
     * which includes a type and a randomly generated number.
     *
     * @return string JSON-encoded string containing the vehicle identifier type and number.
     */
    protected function generateVin()
    {
        return json_encode([
            'type' => fake()->randomElement(['VIN', 'HIN', 'TN', 'SN', 'UIC', 'PIN', 'VSN']),
            'number' => strtoupper(fake()->bothify('??######??######'))
        ]);
    }

    /**
     * Generate the price details for the vehicle.
     *
     * This function creates an array containing the sale price, amount, and sale status of the vehicle.
     *
     * @return array<string, mixed> An associative array with the following keys:
     * - 'sale': The sale price of the vehicle, a random number between 1000 and 100000.
     * - 'amount': The amount price of the vehicle, a random number between 1000 and 100000.
     * - 'on_sale': A boolean indicating whether the vehicle is on sale.
     */
    protected function generatePrice()
    {
        return [
            'sale' => fake()->numberBetween(1000, 100000),
            'amount' => fake()->numberBetween(1000, 100000),
            'on_sale' => fake()->randomElement([true, false]),
        ];
    }

    /**
     * Generate the location details for the vehicle.
     *
     * This function creates an array containing the pickup and dropoff addresses for the vehicle.
     *
     * @return array<string, string> An associative array with the following keys:
     * - 'pickup': A randomly generated address for the pickup location.
     * - 'dropoff': A randomly generated address for the dropoff location.
     */
    protected function generateLocation()
    {
        return [
            'pickup' => [
                'street' => fake()->streetAddress,
                'unit' => fake()->buildingNumber,
                'city' => fake()->city,
                'state' => fake()->state,
                'country' => fake()->country,
                'postal_code' => fake()->postcode,
                'latitude' => fake()->latitude,
                'longitude' => fake()->longitude,
            ],
            'dropoff' => [
                'street' => fake()->streetAddress,
                'unit' => fake()->buildingNumber,
                'city' => fake()->city,
                'state' => fake()->state,
                'country' => fake()->country,
                'postal_code' => fake()->postcode,
                'latitude' => fake()->latitude,
                'longitude' => fake()->longitude,
            ],
        ];
    }

    /**
     * Generate detailed information about the vehicle.
     *
     * This function creates a JSON-encoded string containing various details about the vehicle,
     * including make, model, year, dimensions, exterior and interior features, engine specifications,
     * transmission details, fuel type, security features, safety features, modifications, and service status.
     *
     * @return string JSON-encoded string containing the vehicle details.
     */
    protected function generateDetails(): string
    {
        return json_encode([
            'make' => fake()->company,
            'manufacturer' => fake()->company,
            'model' => fake()->word,
            'year' => fake()->year,
            'mileage' => fake()->numberBetween(0, 200000),
            'type' => fake()->randomElement(['car', 'truck', 'motorcycle', 'bicycle', 'bus', 'airplane', 'boat']),
            'dimensions' => [
                'length' => fake()->randomFloat(2, 3, 5),
                'width' => fake()->randomFloat(2, 1.5, 2.5),
                'height' => fake()->randomFloat(2, 1, 2),
            ],
            'exterior' => [
                'color' => fake()->safeColorName,
                'type' => fake()->randomElement(['Sedan', 'SUV', 'Coupe']),
                'doors' => fake()->numberBetween(2, 5),
                'windows' => fake()->randomElement(['Power windows', 'Tinted windows']),
            ],
            'interior' => [
                'seats' => fake()->numberBetween(2, 7),
                'upholstery' => fake()->randomElement(['Leather', 'Cloth']),
                'ac' => fake()->boolean,
                'heater' => fake()->boolean,
            ],
            'engine' => [
                'size' => fake()->randomElement(['2.5L', '3.0L', '1.8L']),
                'hp' => fake()->numberBetween(100, 500),
                'type' => fake()->randomElement(['Inline 4', 'V6', 'V8']),
            ],
            'transmission' => [
                'type' => fake()->randomElement(['Automatic', 'Manual', 'Semi-Automatic']),
                'gear_ratio' => fake()->randomFloat(1, 4, 7) . ':1',
                'gears' => fake()->numberBetween(4, 8),
                'oil' => fake()->randomElement(['Castrol', 'Mobil', 'Valvoline']),
                'drivetrain' => fake()->randomElement(['FWD', 'RWD', 'AWD']),
            ],
            'fuel' => [
                'type' => fake()->randomElement(['Gasoline', 'Diesel']),
                'economy' => fake()->randomFloat(2, 5, 15) . ' L/100km',
            ],
            'security' => [
                'auto_lock' => fake()->boolean,
                'alarm_system' => fake()->boolean,
                'tracking_system' => fake()->boolean,
            ],
            'safety' => [
                'airbags' => fake()->randomElement(['Driver', 'Passenger', 'Side', 'Rear']),
                'emergency_braking' => fake()->randomElement(['Automatic', 'Manual']),
            ],
            'modifications' => [
                'performance' => fake()->sentence,
                'aesthetic' => fake()->sentence,
                'interior' => fake()->sentence,
            ],
            'service' => [
                'status' => fake()->randomElement(['serviced', 'in service', 'overdue', 'pending']),
                'last_service_date' => fake()->date,
                'last_inspection_date' => fake()->date,
            ],
        ]);
    }


    /**
     * Generate a random ownerable entity.
     *
     * This function fetches a random user or admin from the database and returns one of them
     * as the ownerable entity.
     *
     * @return \App\Models\User|\App\Models\Admin A randomly selected user or admin model instance.
     */
    protected function generateOwnerable()
    {
        // Fetch a random user or admin
        $user = \App\Models\User::inRandomOrder()->first();
        $admin = \App\Models\User::inRandomOrder()->first(); //replace admin with user so all users will have a vehicle association
        // $admin = \App\Models\Admin::inRandomOrder()->first();
        // Determine which one to use as authorable
        return fake()->randomElement(['user', 'admin']) === 'user' ? $user : $admin;
    }
}
