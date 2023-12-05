<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'financial_account_id',
        'financial_request_id',
        'user_id',
        'type',
        'status',
        'balance_before',
        'amount',
        'balance_after',
        'currency',
        'log',
    ];

    protected $casts = [
        'balance_before' => 'float',
        'amount'         => 'float',
        'balance_after'  => 'float',
    ];

    // Relationships
    public function transactionable_by()
    {
        return $this->morphTo();
    }

    public function transactionable()
    {
        return $this->morphTo();
    }
}
