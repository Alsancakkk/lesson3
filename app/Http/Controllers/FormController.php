<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\Category;

class FormController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('forms.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
        ]);

        $form = Form::create(['name' => $request->input('name')]);

        $form->categories()->attach($request->input('categories'));

        return redirect()->route('forms.create')->with('success', 'The form has been successfully created and linked to categories.');
    }
}
