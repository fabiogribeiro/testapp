<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function new()
    {
        return view('posts.new');
    }

    public function create(Request $request)
    {
        $post = new Post;

        $post->title = $request->title;
        $post->body = $request->body;

        $post->save();

        return redirect(route('posts.index'));
    }

    public function index()
    {
        $posts = Post::all();

        return view('posts.index', ['posts' => $posts]);
    }
}
