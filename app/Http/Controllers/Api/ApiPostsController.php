<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class ApiPostsController extends Controller
{
    public function all()
    {
        $posts = Post::all();

        return $posts;
    }

    public function create(Request $request)
    {
        $post = new Post;

        $post->title = $request->title;
        $post->body = $request->body;

        $post->save();

        return $post;
    }
}
