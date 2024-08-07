<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Admin;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class NotificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $notifiable = $this->getRandomNotifiable();

        return [
            'id' => Str::uuid()->toString(),
            'type' => \App\Notifications\Onboarding\Skipped::class,
            'notifiable_id' => $notifiable->id,
            'notifiable_type' => $notifiable->getMorphClass(),
            'data' => json_encode([
                'title' => $this->faker->text(60),
                'message' => $this->faker->text(200),
                'action'=> $this->faker->url(),
                'image_url' => $this->faker->imageUrl(),
            ]),
            'read_at' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    /**
     * Get a random notifiable entity (user or admin).
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    protected function getRandomNotifiable()
    {
        $user = User::inRandomOrder()->first();
        $admin = Admin::inRandomOrder()->first();

        return $this->faker->randomElement([$user, $admin]);
    }
}