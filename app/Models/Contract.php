<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
        'rent',
        'insurance',
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
        'start_date'      => 'date',
        'end_date'        => 'date',
        'completed_date'  => 'date',
        'terminated_date' => 'date',
        'canceled_date'   => 'date',
        'rent'            => 'float',
        'insurance'       => 'float',
    ];

    protected $appends = [
        'name',
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

    // Attributes
    public function getNameAttribute()
    {
        return __("trans.contract_name", [
            'floor'  => __('trans.' . Str::snake(strtolower($this->floor->name)) . '_floor'),
            'renter' => $this->renter->name,
        ]);
    }

    public function getDurationWithYears()
    {
        return $this->duration == 1
            ? "$this->duration " . (app()->getLocale() == 'ar' ? 'سنة' : 'Year')
            : "$this->duration " . (app()->getLocale() == 'ar' ? 'سنوات' : 'Years');
    }
}
