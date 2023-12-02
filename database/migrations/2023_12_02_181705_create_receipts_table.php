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
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->morphs('receiptable');
            $table->enum('type', ['electricity', 'water', 'gas', 'other'])->nullable();
            $table->enum('status', ['paid', 'unpaid'])->default('unpaid');
            $table->decimal('amount', 10, 2);
            $table->decimal('paid', 10, 2);
            $table->decimal('remaining', 10, 2);
            $table->string('description')->nullable();
            $table->date('paid_date')->nullable();
            $table->date('due_date')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipts');
    }
};
