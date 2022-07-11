<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class State extends Model
{
    use HasFactory;

    protected $fillable=[
        'country_id',
        'name',
        'is_active'
    ];

    public function cities(){
        return $this->hasMany(City::class);
    }

    public function country(){
        return $this->BelongsTo(Country::class);
    }
}
