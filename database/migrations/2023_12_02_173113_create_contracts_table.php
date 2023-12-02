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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class)->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->foreignIdFor(\App\Models\Renter::class)->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->foreignIdFor(\App\Models\Floor::class)->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->enum('type', ['rent', 'insurance']);
            $table->enum('status', ['pending', 'active', 'expired', 'terminated', 'completed', 'canceled'])->default('pending');
            $table->integer('duration')->default(1);
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('price', 10, 2)->default(0);
            $table->decimal('paid', 10, 2)->default(0);
            $table->decimal('remaining', 10, 2)->default(0);
            $table->decimal('insurance_price', 10, 2)->default(0);
            $table->decimal('insurance_paid', 10, 2)->default(0);
            $table->decimal('insurance_remaining', 10, 2)->default(0);
            $table->text('description')->nullable();
            $table->boolean('is_paid')->default(false);
            $table->date('completed_date')->nullable();
            $table->date('terminated_date')->nullable();
            $table->text('terminated_reason')->nullable();
            $table->date('canceled_date')->nullable();
            $table->text('canceled_reason')->nullable();
            $table->text('notes')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
