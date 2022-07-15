<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fullname',
        'username',
        'phone',
        'email',
        'age',
        'gender',
        'interest',
        'email_verified',
        'email_verified_at',
        'status',
        'password',
        'city_id','state_id','country_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'id',
        'city_id',
        'state_id',
        'country_id'
    ];

    protected $appends = [
        'city', 'state', 'country'
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function state(){
        return $this->belongsTo(State::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }


    public function getCityAttribute(){
       return $this->city()->first() ? $this->city()->first()->name : null;
    }

    public function getStateAttribute(){
        return $this->state()->first() ? $this->state()->first()->name : null;
     }

     public function getCountryAttribute(){
        return $this->country()->first() ? $this->country()->first()->name : null;
     }
}
