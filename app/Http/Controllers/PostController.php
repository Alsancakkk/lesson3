<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('forum')->get();
        $forums = Forum::all();
        return view('posts.index', compact('posts', 'forums'));
    }

    public function create()
    {
        $forums = Forum::all();
        return view('posts.create', compact('posts', 'forums'));
    }
}
