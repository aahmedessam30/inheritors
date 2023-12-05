<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DueAmount extends Model
{
    use HasFactory;

    protected $fillable = [
        'financial_account_id',
        'financial_request_id',
        'balance_before',
        'amount',
        'balance_after',
    ];

    public function financialAccount()
    {
        return $this->belongsTo(FinancialAccount::class);
    }

    public function financialRequest()
    {
        return $this->belongsTo(FinancialRequest::class);
    }
}
