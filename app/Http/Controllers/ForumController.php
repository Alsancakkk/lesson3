<?php


namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Category;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        $forums = Forum::with('category')->get();
        $categories = Category::all();
        return view('forums.index', compact('forums', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('forums.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        Forum::create($validatedData);

        return redirect()->route('forumhome')->with('success', 'Forum created successfully.');
    }

    public function edit($id)
    {
        $forum = Forum::findOrFail($id);
        $categories = Category::all();
        return view('forums.edit', compact('forum', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $forum = Forum::findOrFail($id);
        $forum->update($validatedData);

        return redirect()->route('forumhome')->with('success', 'Forum updated successfully.');
    }

    public function destroy($id)
    {
        $forum = Forum::findOrFail($id);
        $forum->delete();
        return redirect()->route('forumhome')->with('success', 'Forum deleted successfully.');
    }
}
