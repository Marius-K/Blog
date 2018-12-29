<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostComment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        return view('comments');
    }

    public function store(StorePostComment $request, Post $post)
    {
        $post->comments()->create([
            'comment_body' => $request->body,
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->back()->with('status', 'A comment has been posted');
    }
}
