<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class AttachmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = fake();

        // Fetch a random user or admin
        $user = \App\Models\User::inRandomOrder()->first();
        $admin = \App\Models\Admin::inRandomOrder()->first();
        // Fetch a random post or vehicle
        $post = \App\Models\Post::inRandomOrder()->first();
        $vehicle = \App\Models\Vehicle::inRandomOrder()->first();

        // Determine which one to use as authorable
        $authorable = $faker->randomElement(['user', 'admin']) === 'user' ? $user : $admin;

        $attachable = $faker->randomElement(['vehicle', 'post']) === 'vehicle' ? $vehicle : $vehicle;

        return [
            'name' => $faker->word,
            'description' => $faker->sentence,
            'status' => $faker->randomElement(['active', 'inactive', 'suspended']),
            'is_featured' => $faker->boolean(20), // 50% chance of being true
            'mime_type' => $faker->mimeType(),
            'metadata' => json_encode([
                // Add more metadata fields as needed
                'dimensions' => json_encode([
                    'width' => $faker->randomFloat(2, 1, 5),
                    'height' => $faker->randomFloat(2, 0.1, 3),
                ]),
            ]),

            'file_path' => $faker->imageUrl(),

            'attachable_id' => $attachable->id,
            'attachable_type' => $attachable->getMorphClass(),
            
            'authorable_id' => $authorable->id,
            'authorable_type' => $authorable->getMorphClass(),

            'created_at' => $faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d H:i:s'),            
            'updated_at' => now(),
        ];
    }
}
