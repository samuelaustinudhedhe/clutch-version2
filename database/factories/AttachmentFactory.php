<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Vehicle;
use App\Models\User;
use App\Models\Admin;
use App\Models\Post;
use App\Models\Attachment;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attachment>
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
        $user = User::inRandomOrder()->first();
        $admin = Admin::inRandomOrder()->first();
        // Fetch a random post or vehicle
        $post = Post::inRandomOrder()->first();
        $vehicle = Vehicle::inRandomOrder()->first();

        // Determine which one to use as authorable
        $authorable = $user ?? $admin;
        if (!$authorable) {
            throw new \Exception('No User or Admin found.');
        }

        $attachable = $vehicle ?? $post;
        if (!$attachable) {
            throw new \Exception('No Vehicle or Post found.');
        }

        // Determine mime type and type
        $mimeType = $faker->randomElement(array_merge(Attachment::$imageMimeTypes, Attachment::$documentMimeTypes));
        $type = in_array($mimeType, Attachment::$imageMimeTypes) ? $faker->randomElement(['image', 'gallery_image']) : 'document';

        // Ensure vehicle has one featured image
        $is_featured = false;
        if ($type === 'gallery_image' || $type === 'image') {
            $is_featured = $vehicle && $vehicle->attachments()->where('is_featured', true)->doesntExist();
        }

        // Ensure vehicle has specific documents
        if ($type === 'document') {
            $documentTypes = ['proof of ownership', 'registration document', 'insurance document'];
            $type = $faker->randomElement($documentTypes);
        }

        return [
            'name' => $faker->word,
            'description' => $faker->sentence,
            'status' => $faker->randomElement(['active', 'inactive', 'suspended']),
            'is_featured' => $is_featured,
            'type' => $type,
            'mime_type' => $mimeType,
            'metadata' => json_encode([
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