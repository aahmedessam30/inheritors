<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use BezhanSalleh\FilamentShield\Traits\HasPanelShield;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;
use Filament\Panel;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, HasPanelShield;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function canAccessPanel(Panel $panel): bool
    {
        return match ($panel->getId()) {
            'admin'            => $this->hasRole(['super_admin', 'admin']),
            'inheritor'        => $this->hasRole(['super_admin', 'admin', 'inheritor']),
            'inheritor-family' => $this->hasRole(['super_admin', 'admin', 'inheritor_family']),
            default            => false,
        };
    }

    // Relationships
    public function inheritor()
    {
        return $this->belongsTo(User::class, 'inheritor_id')->whereNull('inheritor_id');
    }

    public function inheritorFamily()
    {
        return $this->hasMany(User::class, 'inheritor_id', 'id')->whereNotNull('inheritor_id');
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function receipts()
    {
        return $this->hasMany(Receipt::class);
    }
}
