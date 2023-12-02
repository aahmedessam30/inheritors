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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Contract::class)->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->enum('status', ['paid', 'unpaid'])->default('unpaid');
            $table->decimal('amount', 10, 2)->default(0);
            $table->decimal('paid', 10, 2)->default(0);
            $table->decimal('remaining', 10, 2)->default(0);
            $table->string('description')->nullable();
            $table->timestamp('paid_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
