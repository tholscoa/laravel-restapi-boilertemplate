<?php

namespace App\Http\Traits;
use Keygen\Keygen;
use Illuminate\Support\Str;

trait GenerateCodeTrait{
        
    protected function CodeGenerator($length = 20, $splitIndex = 4, $splitKey = '', $prefix = '', $inclusive=false)
    {
         

        // return Keygen::alphanum($length)->generate();

        return Keygen::bytes()->generate(
            function($key) use ($length, $prefix, $inclusive) {
                // Generate a random numeric key
                return $random = Keygen::alphanum($length)->prefix($prefix)->generate($inclusive);

                // Manipulate the random bytes with the numeric key
                return substr(md5($key . $random . strrev($key)), mt_rand(0,8), $length);
            },
            function($key) use ($splitIndex, $splitKey){
                // Add a (-) after every fourth character in the key
                if ($splitIndex)
                    return join($splitKey, str_split($key, $splitIndex));
                return $key;
            }
        );
    }

    protected function numericCodeGenerator($length = 20)
    {
         
        return Keygen::numeric($length)->generate();

    }

    protected function generateCode($model, $column, $length, $splitIndex, $codeData = null, $splitKey = '', $prefix='', $inclusive= false){

        if ($codeData)
            $code = Str::slug($codeData);
        else
            $code =  Str::slug($this->CodeGenerator($length, $splitIndex, $splitKey, $prefix, $inclusive));

        // Ensure ID does not exist
        // Generate new one if ID already exists
        while ($model::where($column, $code)->count() > 0) {

            $code = $this->CodeGenerator($length, $splitIndex, $splitKey,  $prefix);
        }

        return $code;
    }

    protected function generateCodeV2($model, $column, $model2, $column2, $length, $splitIndex, $codeData = null, $splitKey = '', $prefix='', $inclusive= false){

        if ($codeData)
            $code = Str::slug($codeData);
        else
            $code =  Str::slug($this->CodeGenerator($length, $splitIndex, $splitKey, $prefix, $inclusive));

        // Ensure ID does not exist
        // Generate new one if ID already exists
        while (($model::where($column, $code)->count() > 0) || ($model2::where($column2, $code)->count() > 0)) {

            $code = $this->CodeGenerator($length, $splitIndex, $splitKey,  $prefix);
        }

        return $code;
    }

    protected function generateNumericCode($model, $column, $length, $splitIndex, $splitKey = ''){

        $code = $this->numericCodeGenerator($length, $splitIndex, $splitKey);
        // Ensure ID does not exist
        // Generate new one if ID already exists
        while ($model::where($column, $code)->count() > 0) {

            $code = $this->numericCodeGenerator($length, $splitIndex, $splitKey);
        }

        return $code;
    }
}
