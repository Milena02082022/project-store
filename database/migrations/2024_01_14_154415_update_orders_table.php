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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('shipping_address')->nullable();
            $table->enum('postal_service', ['nova_poshta', 'ukrposhta']);
            $table->enum('payment_method', ['card', 'cash']);
            $table->decimal('total_amount', 10, 2); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['name', 'phone_number', 'shipping_address', 'postal_service', 'payment_method', 'total_amount']);
        });
    }
};
