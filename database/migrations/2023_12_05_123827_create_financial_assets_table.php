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
        Schema::create('financial_assets', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\FinancialAccount::class)->nullable()->constrained()->nullOnDelete()->cascadeOnUpdate();
            $table->decimal('amount', 10, 2)->default(0);
            $table->text('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_assets');
    }
};
