<?php

namespace App\Http\Controllers\Apis\Posts;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Controllers\Apis\Traits\ApiResponseTrait;

class PostController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->latest()->paginate(10);
        return $posts
            ? $this->successResponse([PostResource::collection($posts), 'All Posts'], 200)
            : $this->errorResponse('No posts found', 404);
    }

    /**
     * Show the form for creating a new resource.
     */
    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $validation = $request->validated();
        if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('storage/images'), $imageName);


        $validation['image'] = $imageName;
    }
        $validation['user_id'] = auth()->check() ? auth()->id() : null;


        $post = Post::create($validation);

        return $post
            ? $this->successResponse(new PostResource($post), 'Post created successfully', 201)
            : $this->errorResponse('Post creation failed', 500);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $validation = $request->validated();
        $validation['user_id'] = $request->user()->id;

        if ($request->hasFile('image')) {

        if ($post->image && Storage::exists('storage/images/' . $post->image)) {
            Storage::delete('storage/images/' . $post->image);
        }

        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('storage/images/', $imageName);
        $validation['image'] = $imageName;
    }
    $post->update($validation);

        return $post
            ? $this->successResponse(new PostResource($post), 'Post updated successfully', 201)
            : $this->errorResponse('Post update failed', 500);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        if (File::exists(public_path('storage/images/' . $post->image))) {
            File::delete(public_path('storage/images/' . $post->image));
        }
        return $post
            ? $this->successResponse(null, 'Post deleted successfully', 200)
            : $this->errorResponse('Post deletion failed', 500);
    }
}
