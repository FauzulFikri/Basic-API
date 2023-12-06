<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostDetailResource;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Models\Post as Post;

class PostController extends Controller
{
    public function index()
    {
        // jangan lupa import model Post dengan cara klik kanan untuk import
        $post = Post::all();
        // berfungsi untuk mengatur jenis data yang akan ditampilan
        return response()->json(['data' => $post]);
    }

    public function getResource()
    {
        $post = Post::all();
        // jangan lupa import PostResources
        return PostResource::collection($post);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return new PostDetailResource($post);
    }

    public function show2($id)
    {
        $post = Post::with('writer:id,username')->findOrFail($id);
        return new PostDetailResource($post);
    }
}
