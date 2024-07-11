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
        return view('posts.create', compact('forums'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'forum_id' => 'required|exists:forums,id',
        ]);

        Post::create($validatedData);
        return redirect()->route('posthome')->with('success', 'Post created successfully');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $forums = Forum::all();
        return view('posts.edit', compact('post', 'forums'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'forum_id' => 'required|exists:forums,id',
        ]);

        $post = Post::findOrFail($id);
        $post->update($validatedData);

        return redirect()->route('posthome')->with('success', 'Post updated successfully.');
    }



    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posthome')->with('success', 'Post deleted successfully');
    }
}
