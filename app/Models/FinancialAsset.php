<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialAsset extends Model
{
    use HasFactory;

    protected $fillable = [
        'financial_account_id',
        'amount',
        'description',
    ];

    protected $casts = [
        'amount' => 'float',
    ];

    public function financialAccount()
    {
        return $this->belongsTo(FinancialAccount::class);
    }
}
