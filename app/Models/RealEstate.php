<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealEstate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'city',
        'state',
        'zip',
        'lat',
        'lng',
        'price',
        'floors',
        'description',
        'status',
        'is_sold',
        'sold_price',
        'sold_at',
    ];

    protected $casts = [
        'is_sold' => 'boolean',
        'sold_at' => 'datetime'
    ];

    public function scopeForSale($query)
    {
        return $query->where('status', 'for_sale');
    }

    public function scopeForRent($query)
    {
        return $query->where('status', 'for_rent');
    }

    public function scopeSold($query, $sold = true)
    {
        return $query->where('is_sold', $sold);
    }

    // Relationship
    public function floors()
    {
        return $this->hasMany(Floor::class);
    }

    public function contracts()
    {
        return $this->hasManyThrough(Contract::class, Floor::class);
    }

    public function receipts()
    {
        return $this->morphMany(Receipt::class, 'receiptable');
    }
}
