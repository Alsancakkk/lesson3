<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',

        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }



    public function show(string $id)
    {
        return view('categories.show', compact('category'));
    }


    public function edit(string $id)
    {
        return view('categories.edit', compact('category'));
    }


    public function update(Request $request, string $id)
    {

        return view('categories.index', compact('category'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
