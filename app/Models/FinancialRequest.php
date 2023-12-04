<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'inheritor_id',
        'request_type',
        'amount',
        'reason',
        'rejection_reason',
        'status',
    ];

    public function inheritor()
    {
        return $this->belongsTo(User::class, 'id', 'inheritor_id');
    }
}
