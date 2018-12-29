<?php

namespace App\Providers;

use App\Post;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('index', function ($view) {
            $posts = Post::all();
            $view->with('posts', $posts);
        });
        View::composer('comments', function ($view) {
            $comments = auth()->user()->userComments();
            $view->with('comments', $comments);
        });
    }

    public function register()
    {

    }
}