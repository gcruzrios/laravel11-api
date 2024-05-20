<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return PostResource::collection($posts);
    }
    public function show(string $id)
    {
        
        $post = Post::findOrFail($id); 
        return new PostResource($post); 
    }

    
    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->validated());
        return new PostResource($post);
    }

    public function update(StorePostRequest $request, Post $post)
    {
        $post->update($request->validated());
        return new PostResource($post);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response(null, 204);
    }
}
