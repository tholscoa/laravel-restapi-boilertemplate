<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable =[
        'moneytize',
        'amount',
        'body',
        'country_id',
        'state_id',
        'city_id'
    ];

    public function images(){
        return $this->morphMany(Image::class, 'imageable');
    }

    public function videos(){
       return $this->morphMany(Video::class, 'videoable');
    }
}
