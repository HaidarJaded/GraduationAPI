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
            $table->id();
            $table->string('email')->unique();
            $table->string('name');
            $table->string('last_name');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('rule_id')->constrained()->cascadeOnDelete();
            $table->string('phone',10)->nullable();
            $table->string('address')->nullable();
            $table->boolean('at_work')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
