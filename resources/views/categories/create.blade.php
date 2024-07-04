@extends('layouts.app')

@section('content')

<h1>Create Category</h1>

<form action="{{ route('category.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="Category">Name</label>
        <input type="text" name="name" id="name" placeholder="Category Name">
        <label for="Category">Description</label>
        <input type="text" name="description" id="description" placeholder="Category Description">
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>


@endsection