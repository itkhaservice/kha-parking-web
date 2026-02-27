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
        Schema::create('parking_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('card_id')->nullable()->constrained('cards')->nullOnDelete();
            $table->foreignId('vehicle_id')->nullable()->constrained('vehicles')->nullOnDelete();
            $table->string('plate_in')->nullable();
            $table->string('plate_out')->nullable();
            $table->dateTime('time_in');
            $table->dateTime('time_out')->nullable();
            $table->string('image_in')->nullable();
            $table->string('image_out')->nullable();
            $table->foreignId('gate_in_id')->nullable()->constrained('gates')->noActionOnDelete();
            $table->foreignId('gate_out_id')->nullable()->constrained('gates')->noActionOnDelete();
            $table->foreignId('staff_in_id')->nullable()->constrained('users')->noActionOnDelete();
            $table->foreignId('staff_out_id')->nullable()->constrained('users')->noActionOnDelete();
            $table->decimal('amount', 15, 2)->default(0);
            $table->enum('status', ['in_park', 'completed', 'cancelled'])->default('in_park');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parking_transactions');
    }
};
