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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->json('details'); // Scalable JSON column for order details like notes, payment gateway, etc.
            $table->json('price')->default([
                'amount' => 0, // Total amount of the order
                'currency' => 'USD', // Currency of the order
                'taxes' => [], // Array of taxes applied to the order
                'discounts' => [], // Array of discounts applied to the order
            ]); // Total price of the order
            $table->morphs('orderable'); // Polymorphic relation to Trip, Refund, Insurance, etc.
            $table->morphs('authorable'); // Polymorphic relation to User, Admin, etc.
            $table->json('payment'); // Payment status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
