<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'inheritor_id',
        'name',
        'balance',
        'currency',
    ];

    protected $casts = [
        'balance'           => 'float',
        'balance_available' => 'float',
    ];

    // Relationships
    public function inheritor()
    {
        return $this->belongsTo(User::class, 'inheritor_id');
    }

    public function inheritorFinancialRequests()
    {
        return $this->hasMany(FinancialRequest::class, 'requested_by_id');
    }

    public function tackledFinancialRequests()
    {
        return $this->hasMany(FinancialRequest::class, 'tackled_by_id');
    }

    public function transactionable_by()
    {
        return $this->morphMany(Transaction::class, 'transactionable_by');
    }
}
