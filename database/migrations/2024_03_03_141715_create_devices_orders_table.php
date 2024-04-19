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
        Schema::create('devices_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('device_id')->constrained()->cascadeOnDelete();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->unique(['device_id', 'order_id']);
            $table->foreignId('service_id')->nullable()->constrained()->cascadeOnDelete();
            $table->text('info')->nullable();
            $table->enum('order_type',['تسليم','استلام']);
            $table->boolean('deliver_to_client')->default(false);
            $table->boolean('deliver_to_user')->default(false);
            $table->time('deliver_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices_orders');
    }
};
