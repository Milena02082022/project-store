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
            $table->unsignedBigInteger('user_id');
            $table->string('name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('shipping_address')->nullable();
            $table->enum('postal_service', ['nova_poshta', 'ukrposhta'])->nullable();
            $table->enum('payment_method', ['card', 'cash'])->nullable();
            $table->decimal('total_amount', 10, 2)->nullable();
            $table->enum('status', ['pending', 'processing', 'completed', 'cancelled']);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
