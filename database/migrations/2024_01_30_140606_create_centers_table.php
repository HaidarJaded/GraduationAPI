<?php

use App\Enums\CenterStatus;
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
        Schema::create('centers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->enum('status',CenterStatus::values())->default(CenterStatus::Active->value);
            $table->string('address');
            $table->time('start_work')->format('H:i')->nullable();
            $table->time('end_work')->format('H:i')->nullable();
            $table->string('logo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centers');
    }
};
