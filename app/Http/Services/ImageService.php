<?php

namespace App\Http\Services;

use InterImage;
use Carbon\Carbon;
use App\Models\Image;
use App\Models\StorageType;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use ImageOptimizer;

class ImageService
{

    public static function upload($file, $path, $class_type, $class_id, $storage_type_name, $meta_desc=''){

        $storageDisk = StorageType::where('type_name', $storage_type_name)->first();
        if (!$storageDisk) {
            $storageDisk = StorageType::where('is_default', 1)->first();
        }
        if (!$storageDisk) {
            $storageDisk = StorageType::first();
        }

        $storage_type_id = $storageDisk->id;

        $upload = MediaService::upload($file, $path, $storageDisk, 'public', $class_type, $class_id, $meta_desc);
        if(!$upload){
            return false;
        }
        $uploaded_image = Image::create([
            'url'=> $upload,
            'path'=> $upload,
            'ext'=> $file->getClientOriginalExtension(), 
            'meta_description'=> $meta_desc,
            'purpose'=> 'post',
            'storage_type_id'=> $storage_type_id, 
            'imageable_type'=> $class_type, 
            'imageable_id'=> $class_id
        ]);
        return $uploaded_image;
    }
    /**
     * Optimize your image
     *
     * @param string $pathToImage
     * @param string|null $pathToOptimizedImage
     *
     * @return mixed
     */
    protected function optimize_image($pathToImage, $pathToOptimizedImage = null)
    {
        return ImageOptimizer::optimize($pathToImage, $pathToOptimizedImage) &&
            ( // To furhter help reduce the size, use the image converter setting
                $this->image_converter_settings($pathToImage, $pathToOptimizedImage));
    }

    /**
     * Convert Optimized image to help reduce size further
     *
     * @param string $pathToImage
     * @param string|null $pathToOptimizedImage
     *
     * @return mixed
     */
    protected function image_converter_settings($from, $to = '')
    {
        return 'convert ' . $from . ' ' . '-sampling-factor 4:2:0 -strip -quality 65' . ' ' . $to;
    }

    protected function formatBytes($bytes, $precision = 2)
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        // Uncomment one of the following alternatives
        $bytes /= pow(1024, $pow);
        // $bytes /= (1 << (10 * $pow));

        return round($bytes, $precision) . ' ' . $units[$pow];
    }

    protected function uploadAnyFile(File $file, $path, $disk, $visibility = 'public', $imageClass = null, $classId = null, $purpose = null, $metaDescription = null)
    {

        $environment = config('app.env');



        $storageDisk = StorageType::where('type_name', $disk)->first();
        if (!$storageDisk) {
            $storageDisk = StorageType::where('is_default', 1)->first();
        }
        if (!$storageDisk) {
            $storageDisk = StorageType::first();
        }

        $imagePath = Storage::disk($storageDisk->type_name)->putFile($path, $file, $visibility);

        $image =  Image::create([
            'path' => $imagePath,
            'url' => Storage::disk($storageDisk->type_name)->url($imagePath),
            'ext' => $file->extension() ?? pathinfo($file, PATHINFO_EXTENSION),
            'size' => Storage::disk($storageDisk->type_name)->size($imagePath),
            'purpose' => $purpose,
            'meta_description' => $metaDescription,
            'storage_type_id' => $storageDisk->id,
            'imageable_type' => $imageClass,
            'imageable_id' => $classId,
        ]);

        return  $image;
    }

    protected function uploadwithSize(File $file, $path, $disk, $visibility = 'public', $imageClass = null, $classId = null, $purpose = null, $metaDescription = null, $height = null, $width = null)
    {

        $environment = config('app.env');

        // $ext = pathinfo($file, PATHINFO_EXTENSION);
        $ext = "png";


        $path = $this->generateCode(Image::class, 'path', 30, 0) . Carbon::now()->format('hms') . '.' . $ext;

        $storageDisk = StorageType::where('type_name', $disk)->first();
        if (!$storageDisk) {
            $storageDisk = StorageType::where('is_default', 1)->first();
        }
        if (!$storageDisk) {
            $storageDisk = StorageType::first();
        }

        // if($height && $width){
        // $imageChanged = InterImage::make($file);//->resize($width, $height, function ($constraint) {
        // $constraint->aspectRatio();
        // $constraint->upsize();
        // })->encode($ext, 100);

        // $file = $imageChanged->stream();

        // }

        // if($height && $width){
        $imageChanged = InterImage::make($file)->fit($width, $height, function ($constraint) {
            $constraint->upsize();
        })->encode($ext, 100);

        $file = $imageChanged->stream();

        // }

        if ($height) {
            // $imageChanged = InterImage::make($file)->resize(null, $height, function ($constraint) {
            //     $constraint->aspectRatio();
            //     $constraint->upsize();
            // })->encode($ext, 100);

            // $file = $imageChanged->stream();

        }


        $imagePath = Storage::disk($storageDisk->type_name)->put($path, $file, $visibility);

        $height = $height; // ? $height :InterImage::make($file)->height();
        $width =  $width; //?  $width : InterImage::make($file)->width();

        $image =  Image::create([
            'path' => $imagePath,
            'url' => Storage::disk($storageDisk->type_name)->url($path),
            'ext' => $ext,
            'size' => Storage::disk($storageDisk->type_name)->size($path),
            'height' => $height,
            'width' => $width,
            'purpose' => $purpose,
            'meta_description' => $metaDescription,
            'storage_type_id' => $storageDisk->id,
            'imageable_type' => $imageClass,
            'imageable_id' => $classId,
        ]);

        return  $image;
    }


    public function copyFile($fileId, $newClass, $newClassId, $path, $purpose = null)
    {

        $image = null;
        $environment = config('app.env');
        $newName = $this->generateCode(Image::class, 'path', 60, 0);

        $oldFile =  Image::find($fileId);

        if ($oldFile) {
            $storageDisk = StorageType::where('id', $oldFile->storage_type_id)->first();
            $path3 = $oldFile->path;

            $ext = Str::of($path3)->afterLast('.');



            if ($environment === 'production') {
                $path = 'live/' . $path . '/' . $newName . '.' . $ext;
            } else {
                $path = 'test/' . $path . '/' . $newName . '.' . $ext;
            }

            if (Storage::disk($storageDisk->type_name)->exists($path3)) {
                $uploaded = Storage::disk($storageDisk->type_name)->copy($path3, $path);

                if ($uploaded)
                    $image = $oldFile->replicate()->fill([
                        'path' =>  $path,
                        'ext' => $ext,
                        'url' => Storage::disk($storageDisk->type_name)->url($path),
                        'purpose' => $purpose,
                        'imageable_type' => $newClass,
                        'imageable_id' => $newClassId,
                    ]);
                $image->save();
                $image =  Image::find($image->id);
            }
        }
        return $image;
    }
}
