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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('plate', 10)->unique();
            $table->string('model', 100);
            $table->string('brand', 50);
            $table->integer('year');
            $table->string('color', 20);
            $table->string('owner_name', 100);
            $table->string('owner_phone', 15);
            $table->boolean('in_workshop')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
