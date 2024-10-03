<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Database\Factories\NotificationFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // // Ensure you have users and admin in the database
        // $user = User::first();
        // $admin = Admin::first();
        // $notifiables = collect([$user, $admin]);

        // $notifiables->each(function ($notifiable) {
        //     if ($notifiable) {
        //         // Generate 10 notifications for each notifiable
        //         $notifiable::factory()->count(10)->create()->each(function ($notifiableInstance) use ($notifiable) {
        //             NotificationFactory::new()->create([
        //                 'notifiable_id' => $notifiableInstance->id,
        //                 'notifiable_type' => $notifiableInstance->getMorphClass(),
        //             ]);
        //         });
        //     }
        // });

        // NotificationFactory::new()->count(10)->create();
    }
}
