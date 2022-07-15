<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ['url', 'path', 'ext', 'meta_description', 'purpose', 'storage_type_id', 'imageable_type', 'imageable_id'];

    protected $hidden = ['imageable_type', 'imageable_id', 'updated_at','created_at', 'deleted_at'];

    public function imageable()
    {
        return $this->morphTo();
    }


    public function storageType(){
        return $this->belongsTo(StorageType::class);
    }
}
