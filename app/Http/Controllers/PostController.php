<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdatePostRequest;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->latest()->paginate(10);
        return view('Admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $users = User::select('id', 'name')->get();
        $posts = Post::with('user')->latest()->paginate(10);
        return view('Admin.posts.create', compact('posts'));

    }

    /**
     * Store a newly created resource in storage.
     */
public function store(StorePostRequest $request)
{
    // dd($request->file('image'));
    $data = $request->validated();
    $data['user_id'] = auth()->id();

    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('storage/images'), $imageName);
        // dd(File::exists(public_path('images/' . $imageName)));

        $data['image'] = $imageName;
    }
    $post = Post::create($data);

    return $post
        ? redirect()->route('posts.index')->with('success', 'Post created successfully')
        : redirect()->back()->withErrors('Post creation failed');
}



    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $post = Post::with('user')->findOrFail($post->id);
        return view('Admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        if ($request->hasFile('image')) {

        if ($post->image && Storage::exists('storage/images/' . $post->image)) {
            Storage::delete('storage/images/' . $post->image);
        }

        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('storage/images/', $imageName);
        $data['image'] = $imageName;
    }

    $post->update($data);

        return $post
            ? redirect()->route('posts.index')->with('success', 'Post updated successfully')
            : redirect()->back()->withErrors('Post update failed');
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
        ? redirect()->route('posts.index')->with('success', 'Post deleted successfully')
        : redirect()->back()->withErrors('Post deletion failed');
    }
}
