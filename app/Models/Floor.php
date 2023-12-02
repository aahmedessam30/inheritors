<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;

protected $fillable = [
        'real_estate_id',
        'floor',
        'type',
        'status',
        'rent',
        'insurance',
        'description',
    ];

    // Relationship
    public function realEstate()
    {
        return $this->belongsTo(RealEstate::class);
    }

    public function renters()
    {
        return $this->hasMany(Renter::class);
    }
}
