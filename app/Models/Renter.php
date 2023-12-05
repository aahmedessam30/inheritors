<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renter extends Model
{
    use HasFactory;

    protected $fillable = [
        'floor_id',
        'name',
        'phone_number',
        'national_id',
        'address',
    ];

    // Relationships
    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function transactionable_by()
    {
        return $this->morphMany(Transaction::class, 'transactionable_by');
    }
}
