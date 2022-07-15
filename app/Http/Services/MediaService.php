<?php

namespace App\Http\Services;

use App\Models\StorageType;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class MediaService
{

    public static function upload($file, $path, $storageDisk, $visibility='public', $classId = null, $purpose = null, $metaDescription = null)
    {

        //process image before store in future
        $optimized_file = self::optimizedMedia($file);

        try{
            $media_path = Storage::disk($storageDisk->type_name)->put($path, $optimized_file, $visibility);
        }catch(\Exception $e){
            Log::error($e);
            return false;
        }


        return  $media_path;
    }

    public static function optimizedMedia($file){
        return $file;
    }


}
