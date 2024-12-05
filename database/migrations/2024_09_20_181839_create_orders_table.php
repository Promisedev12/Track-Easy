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
            $table->string('trackinNum');
            $table->string('name');
            $table->string('numItems');
            $table->string('items');
            $table->string('totalWeight');
            $table->string('Destination');
            $table->string('CurrentLocation');
            $table->string('departureLocation');
            $table->date('depatureDate');
            $table->date('arivalDate');
            $table->string('customerName');
            $table->string('customerEmail');
            $table->string('customerLocation');
            $table->string('customerPhoneNum');
            $table->string('status');
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
