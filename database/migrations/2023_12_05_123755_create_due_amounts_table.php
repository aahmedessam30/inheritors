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
        Schema::create('due_amounts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\FinancialAccount::class)->nullable()->constrained()->nullOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(\App\Models\FinancialRequest::class)->nullable()->constrained()->nullOnDelete()->cascadeOnUpdate();
            $table->decimal('balance_before', 10, 2)->default(0);
            $table->decimal('amount', 10, 2)->default(0);
            $table->decimal('balance_after', 10, 2)->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('due_amounts');
    }
};
