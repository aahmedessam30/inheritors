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
        Schema::create('floors', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\RealEstate::class)->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->enum('name', ['ground', 'first', 'second', 'third', 'fourth', 'fifth', 'sixth', 'seventh', 'eighth', 'ninth', 'tenth'])->default('ground');
            $table->enum('type', ['apartment', 'shop', 'office', 'warehouse', 'land', 'villa', 'building', 'other'])->default('apartment');
            $table->enum('status', ['rented', 'available'])->default('rented');
            $table->decimal('rent', 10, 2)->nullable();
            $table->decimal('insurance', 10, 2)->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('floors');
    }
};
