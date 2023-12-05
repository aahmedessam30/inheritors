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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->morphs('transactionable_by'); // (user_id, renter_id, etc.)
            $table->morphs('transactionable'); // (financial_request_id, rental_id, etc.)
            $table->enum('type', ['withdrawal', 'deposit', 'transfer'])->default('withdrawal');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->decimal('balance_before', 10, 2)->default(0);
            $table->decimal('amount', 10, 2)->default(0);
            $table->decimal('balance_after', 10, 2)->default(0);
            $table->string('currency')->nullable();
            $table->text('log')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
