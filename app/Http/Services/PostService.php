<?php

namespace App\Http\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Log;

class PostService 
{
    public static function create($body, $moneytize, $amount){
        try{
            $post = Post::create([
                'body'=>$body,
                'moneytize' => $moneytize,
                'amount' => $amount
            ]);
        }catch(\Exception $e){
            Log::error($e);
            return false;
        }
        return $post;
    }
}
