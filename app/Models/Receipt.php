<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'receiptable_id',
        'receiptable_type',
        'type',
        'status',
        'amount',
        'paid',
        'remaining',
        'description',
        'paid_date',
        'due_date',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'paid_date' => 'date',
        'due_date' => 'date',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    // Relationships
    public function receiptable()
    {
        return $this->morphTo();
    }
}
