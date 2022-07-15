<?php

namespace Modules\Post\Http\Controllers;

use App\Http\Services\ImageService;
use App\Http\Services\PostService;
use App\Models\Post;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        // return view('post::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'body' => 'required|string',
            'moneytize' =>  'boolean',
            'amount' => 'integer',
            'images.*' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'videos.*' =>  'image|mimes:jpeg,png,gif,jpg|max:8048',
        ]);

        if ($validator->fails()) {
            return response(['status' => false, 'message' => 'Validation errors. ' .  $validator->errors(), 'data'=>false], 422);
        }

        $input = $request->all();
        $body = isset($input['body']) ? trim($input['body']) : '';
        $moneytize = isset($input['moneytize']) ? trim($input['moneytize']) : false;
        $amount = ($input['amount'] == true) ? trim($input['amount']) : '';

        $saved_post = PostService::create($body, $moneytize, $amount);
        if(!$saved_post){
            return response(['status' => false, 'message' => 'error encountered while creating post', 'data'=>false], 422);
        }
        if($request->hasFile('images')){
            $failed_img_upload = 0;
            foreach($request->file('images') as $image) {
                $image = ImageService::upload($image, 'posts/images', Post::class, $saved_post->id, 'local', substr($body, 10));
                if(!$image){
                    $failed_img_upload++;
                }
            }
        }

        $saved_post['images'] = $saved_post->images;
        if($failed_img_upload > 0){
            return response(['status' => true, 'message' => 'post created successfully. but '. $failed_img_upload. ' failed to upload!', 'data'=>$saved_post], 201);
        }
        return response(['status' => true, 'message' => 'post created successfully', 'data'=>$saved_post], 201);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('post::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('post::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
