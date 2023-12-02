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
        Schema::create('financial_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inheritor_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->enum('request_type', ['personal_needs', 'house_improvement', 'other'])->default('personal_needs');
            $table->decimal('amount', 10, 2);
            $table->text('reason')->nullable();
            $table->text('rejection_reason')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_requests');
    }
};
