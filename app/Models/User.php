<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'currency',
        'hourly_rate',        
    ];

    public function setHourlyRateAttribute($value)
    {
        $this->attributes['hourly_rate'] = $value * 100;
    }

    public function getHourlyRateAttribute()
    {
        return $this->attributes['hourly_rate'] / 100;
    }
}
