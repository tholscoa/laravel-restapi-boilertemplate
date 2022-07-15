<?php

namespace App\Http\Services;

use Illuminate\Http\File;



class VideoService{
    
    public static function upload(File $file, $path, $class_type, $class_id, $storage_type, $meta_desc=''){
        $upload = MediaService::upload($file, $path, $storage_type, 'public', $class_type, $class_id, $meta_desc);
        if(!$upload){
            return false;
        }
        return $upload;
    }

}
