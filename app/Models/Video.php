<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'path', 'ext', 'meta_description', 'purpose', 'storage_type_id', 'videoable_type', 'videoable_id'];

    protected $hidden = ['videoable_type', 'videoable_id', 'updated_at','created_at', 'deleted_at'];


    public function videoable()
    {
        return $this->morphTo();
    }
}
