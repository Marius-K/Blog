<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\StoreBlogPost;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        return view('index');
    }

    public function create()
    {
        return view('create');
    }

    public function store(StoreBlogPost $request)
    {
        $post = new Post;
        $post->post_title = $request->title;
        $post->post_body = $request->content;
        $post->save();
        return redirect('posts')->with('status', 'A post has been successfully published!');
    }

    public function show($post)
    {
        $post = Post::where('id', $post)
            ->with('comments.user')
            ->first();
        return view('show', compact('post'));
    }
}
