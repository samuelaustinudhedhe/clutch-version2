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
        Schema::create('users', function (Blueprint $table) {
            $table->id()->startingValue(100312900983);
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('status')->default('onboarding'); // user status (active or inactive or suspended)
            $table->float('rating')->default(0);
            $table->rememberToken();
            $table->json('details')->default(json_encode([
                'phone' => [
                    'work' => ['country_code' => '', 'number' => '', 'verified_at' => null],
                    'home' => ['country_code' => '', 'number' => '', 'verified_at' => null]
                ],
                'date_of_birth' => null,
                'gender' => 'Rather not say',
                'address' => null,
                'social' => null,
            ]));
            $table->json('records')->default(json_encode([
                'password' => [
                    'resets_count' => 0,
                    'changed_at' => null,
                    'changed_count' => 0,
                ],
                'email' => [
                    'changed_at' => null,
                    'changed_from' => null,
                    'changed_count' => 0,
                ],
                'phone' => [
                    'home' => [
                        'changed_at' => null,
                        'changed_from' => null,
                        'changed_count' => 0,
                    ],
                    'work' => [
                        'changed_at' => null,
                        'changed_from' => null,
                        'changed_count' => 0,
                    ],
                ],
                'onboarding' => [
                    'status' => 'start', // start, completed, skipped
                    'step' => 0,
                    'restart_at' => '',
                    'completed_at' => '',
                ],
            ]));
            $table->json('verification')->default(json_encode([
                'account' => [
                    'status' => 'pending', // pending, approved, rejected
                    'verified_at' => null,
                ],
                'owner'=> [
                    'status' => 'pending', // pending, approved, rejected
                    'verified_at' => null,
                ],
                'driver'=> [
                    'status' => 'pending', // pending, approved, rejected
                    'verified_at' => null,
                ],
                'email' => [
                    'code' => null,
                    'code_sent_at' => null,
                    'code_expires_at' => null,
                    'attempts' => 0,
                ],
                'phone' => [
                    'home' => [
                        'code' => null,
                        'code_sent_at' => null,
                        'attempts' => 0,
                    ],
                    'work' => [
                        'code' => null,
                        'code_sent_at' => null,
                        'attempts' => 0,
                    ],
                ],
            ]));
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
