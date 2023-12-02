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
        'paid_date' => 'datetime',
    ];

    // Relationships
    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}
