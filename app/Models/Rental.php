<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'contract_id',
        'status',
        'amount',
        'paid',
        'remaining',
        'description',
        'paid_date',
    ];

    protected $casts = [
        'amount'    => 'float',
        'paid'      => 'float',
        'remaining' => 'float',
    ];

    protected $appends = [
        'is_paid',
    ];

    // Relationships
    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }

    public function transactions()
    {
        return $this->morphMany(Transaction::class, 'transactionable');
    }

    // Accessors
    public function getIsPaidAttribute()
    {
        return $this->status === 'paid';
    }
}
