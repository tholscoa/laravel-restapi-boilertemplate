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

    protected $hidden = [
        'created_at',
        "deleted_at",
        "updated_at",
        'is_active',
        'country_id'
    ];

    public function cities(){
        return $this->hasMany(City::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
