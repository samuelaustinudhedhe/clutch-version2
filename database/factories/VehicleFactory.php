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
            'name' => fake()->sentence(4) . fake()->year($max = 'now', $min = 2006),
            'price' => $this->generatePrice(),
            'location' => $this->generateLocation(),
            'details' => $this->generateDetails(),
            'ownerable_id' => $this->generateOwnerable()->id,
            'ownerable_type' => $this->generateOwnerable()->getMorphClass(),
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
        return [
            'type' => fake()->randomElement(['VIN', 'HIN', 'TN', 'SN', 'UIC', 'PIN', 'VSN']),
            'number' => strtoupper(fake()->bothify('??######??######'))
        ];
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
     * This function creates an array containing the pickup and drop_off addresses for the vehicle.
     *
     * @return array<string, string> An associative array with the following keys:
     * - 'pickup': A randomly generated address for the pickup location.
     * - 'drop_off': A randomly generated address for the drop_off location.
     */
    protected function generateLocation()
    {
        $statesAndCities = [
            'Lagos' => [
                'cities' => ['Lagos', 'Ikeja', 'Epe'],
                'lat_range' => [6.5244, 6.6000],
                'lng_range' => [3.3792, 3.5000]
            ],
            'FCT' => [
                'cities' => ['Abuja'],
                'lat_range' => [9.0579, 9.1000],
                'lng_range' => [7.4951, 7.6000]
            ],
            'Kano' => [
                'cities' => ['Kano', 'Wudil'],
                'lat_range' => [11.9998, 12.1000],
                'lng_range' => [8.5167, 8.6000]
            ],
            'Oyo' => [
                'cities' => ['Ibadan', 'Ogbomosho'],
                'lat_range' => [7.3775, 7.5000],
                'lng_range' => [3.9470, 4.0000]
            ],
            'Rivers' => [
                'cities' => ['Port Harcourt', 'Obio-Akpor'],
                'lat_range' => [4.8156, 4.9000],
                'lng_range' => [7.0498, 7.1000]
            ],
            'Kaduna' => [
                'cities' => ['Kaduna', 'Zaria'],
                'lat_range' => [10.5105, 10.6000],
                'lng_range' => [7.4165, 7.5000]
            ],
            'Enugu' => [
                'cities' => ['Enugu', 'Nsukka'],
                'lat_range' => [6.5244, 6.6000],
                'lng_range' => [7.5086, 7.6000]
            ],
            'Anambra' => [
                'cities' => ['Awka', 'Onitsha'],
                'lat_range' => [6.2100, 6.3000],
                'lng_range' => [7.0741, 7.2000]
            ],
            'Ogun' => [
                'cities' => ['Abeokuta', 'Sagamu'],
                'lat_range' => [7.1600, 7.2000],
                'lng_range' => [3.3500, 3.5000]
            ],
            'Delta' => [
                'cities' => ['Asaba', 'Warri'],
                'lat_range' => [5.5000, 5.6000],
                'lng_range' => [6.0000, 6.2000]
            ],
            'Edo' => [
                'cities' => ['Benin City', 'Auchi'],
                'lat_range' => [6.3400, 6.4000],
                'lng_range' => [5.6200, 5.7000]
            ],
            'Cross River' => [
                'cities' => ['Calabar', 'Ikom'],
                'lat_range' => [4.9500, 5.0000],
                'lng_range' => [8.3300, 8.4000]
            ],
            'Borno' => [
                'cities' => ['Maiduguri', 'Biu'],
                'lat_range' => [11.8333, 11.9000],
                'lng_range' => [13.1500, 13.2000]
            ],
            'Sokoto' => [
                'cities' => ['Sokoto', 'Tambuwal'],
                'lat_range' => [13.0059, 13.1000],
                'lng_range' => [5.2476, 5.3000]
            ],
            'Katsina' => [
                'cities' => ['Katsina', 'Daura'],
                'lat_range' => [12.9908, 13.1000],
                'lng_range' => [7.6000, 7.7000]
            ],
        ];
    
        $state = fake()->randomElement(array_keys($statesAndCities));
        $city = fake()->randomElement($statesAndCities[$state]['cities']);
        $lat_range = $statesAndCities[$state]['lat_range'];
        $lng_range = $statesAndCities[$state]['lng_range'];
    
        return [
            'pickup' => [
                'street' => fake()->streetAddress,
                'unit' => fake()->buildingNumber,
                'city' => $city,
                'state' => $state,
                'country' => 'Nigeria',
                'postal_code' => fake()->postcode,
                'latitude' => fake()->latitude($lat_range[0], $lat_range[1]),
                'longitude' => fake()->longitude($lng_range[0], $lng_range[1]),
                'full' => fake()->address,
            ],
            'drop_off' => [
                'street' => fake()->streetAddress,
                'unit' => fake()->buildingNumber,
                'city' => $city,
                'state' => $state,
                'country' => 'Nigeria',
                'postal_code' => fake()->postcode,
                'latitude' => fake()->latitude($lat_range[0], $lat_range[1]),
                'longitude' => fake()->longitude($lng_range[0], $lng_range[1]),
                'full' => fake()->address,
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
            'vin' => $this->generateVin(),
            'description' => fake()->paragraph,
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
