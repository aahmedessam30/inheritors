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
        Schema::create('real_estates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->decimal('lat', 10, 2)->nullable();
            $table->decimal('lng', 11, 8)->nullable();
            $table->decimal('price', 10, 2);
            $table->integer('floors')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['for_sale', 'for_rent'])->default('for_sale');
            $table->boolean('is_sold')->default(false);
            $table->string('sold_price')->nullable();
            $table->timestamp('sold_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('real_estates');
    }
};
