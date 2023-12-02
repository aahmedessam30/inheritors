<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'renter_id',
        'floor_id',
        'type',
        'status',
        'duration',
        'start_date',
        'end_date',
        'price',
        'paid',
        'remaining',
        'insurance_price',
        'insurance_paid',
        'insurance_remaining',
        'description',
        'is_paid',
        'completed_date',
        'terminated_date',
        'terminated_reason',
        'canceled_date',
        'canceled_reason',
        'notes',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'completed_date' => 'date',
        'terminated_date' => 'date',
        'canceled_date' => 'date',
    ];

    // Relationships
    public function renter()
    {
        return $this->belongsTo(Renter::class);
    }

    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }

    public function receipts()
    {
        return $this->hasMany(Receipt::class);
    }
}
