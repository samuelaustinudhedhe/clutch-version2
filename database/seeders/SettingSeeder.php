<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Insert default settings into the 'settings' table.
         *
         * This method seeds the 'settings' table with initial values for the application.
         * It inserts three key-value pairs: 'app_name', 'app_url', and 'app_logo'.
         * Each entry also includes timestamps for 'created_at' and 'updated_at'.
         *
         */
        DB::table('settings')->insert([
            ['key' => 'app_name', 'value' => 'Clutch', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'app_url', 'value' => 'https://clutch.africa', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'app_logo', 'value' => '/assets/images/logos/clutch.png', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
