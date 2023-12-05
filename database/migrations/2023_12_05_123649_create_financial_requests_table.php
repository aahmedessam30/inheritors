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
            $table->foreignIdFor(\App\Models\User::class, 'requested_by_id')->nullable()->constrained('users')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(\App\Models\User::class, 'tackled_by_id')->nullable()->constrained('users')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(\App\Models\FinancialAccount::class)->nullable()->constrained()->nullOnDelete()->cascadeOnUpdate();
            $table->enum('request_type', ['personal_needs', 'house_improvement', 'other'])->default('personal_needs');
            $table->enum('transaction_type', ['withdrawal', 'deposit', 'transfer'])->default('withdrawal');
            $table->decimal('amount', 10, 2);
            $table->text('reason')->nullable();
            $table->text('rejection_reason')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected', 'canceled'])->default('pending');
            $table->enum('transaction_status', ['pending', 'completed', 'failed'])->default('pending');
            $table->timestamp('requested_at')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->timestamp('rejected_at')->nullable();
            $table->timestamp('canceled_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('failed_at')->nullable();
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
