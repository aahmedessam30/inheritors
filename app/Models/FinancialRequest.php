<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'requested_by_id',
        'tackled_by_id',
        'request_type',
        'transaction_type',
        'amount',
        'reason',
        'rejection_reason',
        'status',
        'transaction_status',
        'requested_at',
        'approved_at',
        'rejected_at',
        'canceled_at',
        'completed_at',
        'failed_at',
    ];

    protected $casts = [
        'amount' => 'float',
    ];

    // Relationships
    public function requestedBy()
    {
        return $this->belongsTo(User::class, 'requested_by_id');
    }

    public function tackledBy()
    {
        return $this->belongsTo(User::class, 'tackled_by_id');
    }

    public function financialAccount()
    {
        return $this->belongsTo(FinancialAccount::class);
    }

    public function transaction()
    {
        return $this->morphOne(Transaction::class, 'transactionable');
    }

    // Scopes
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }
}
