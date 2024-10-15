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
        // Create Roles Column in Users Table
        if (!Schema::hasColumn('users', 'role')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('role')->default('subscriber')->after('password');
            });
        }

        // Create Roles Column in Admins Table
        if (!Schema::hasColumn('admins', 'role')) {
            Schema::table('admins', function (Blueprint $table) {
                $table->string('role')->default('subscriber')->after('password');
            });
        }

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->json('permissions')->nullable();
            $table->string('guard')->default('web');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop Roles Column in Users Table
        if (Schema::hasColumn('users', 'role')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('role');
            });
        }

        // Drop Roles Column in Admins Table
        if (Schema::hasColumn('admins', 'role')) {
            Schema::table('admins', function (Blueprint $table) {
                $table->dropColumn('role');
            });
        }

        Schema::dropIfExists('roles');
    }
};