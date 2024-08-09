<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;

use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'usertype',
        'name',
        'email',
        'password',
        'contact_number',
        'stadium_address',
        'available_sports',
        'coaching_sport',
        'years_of_experience',
        'level_of_experience',
        'preferred_sports',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'preferred_sports' => 'array',
            'available_sports' => 'array',
        ];
    }

    public function canAccessPanel(\Filament\Panel $panel): bool
{
    // Admins can access all panels
    if (str_ends_with($this->email, '@stride.com')) {
        return true;
    }

    // Stride users can access only the app panel
    if ($panel->getId() === 'app') {
        return str_ends_with($this->email, '@strideuser.com');
    }

    // Stride ground users can access only the ground panel
    if ($panel->getId() === 'ground') {
        return str_ends_with($this->email, '@strideground.com');
    }

    // Default to false if none of the conditions are met
    return false;
}
}
