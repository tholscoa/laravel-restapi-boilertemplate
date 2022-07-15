<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable=[
        'state_id',
        'name',
        'is_active'
    ];

    protected $hidden = [
        'created_at',
        "deleted_at",
        "updated_at",
        'is_active',
    ];

    public function state(){
        return $this->belongsTo(State::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }
}
