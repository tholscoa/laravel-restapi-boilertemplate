<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'shortname',
        'name',
        'is_active',
    ];

    public function states(){
        return $this->hasMany(State::class);
    }
}