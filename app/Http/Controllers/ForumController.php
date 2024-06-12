<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;
use App\Models\Category;

class ForumController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('forums.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
        ]);

        $forum = Forum::create(['name' => $request->input('name')]);

        $forum->categories()->attach($request->input('categories'));

        return redirect()->route('forums.create')->with('success', 'The form has been successfully created and linked to categories.');
    }
}
