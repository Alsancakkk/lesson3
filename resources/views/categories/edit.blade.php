@extends('layouts.app')

@section('title', 'Web')

@section('content')
<div class="title">Edit Category</div>
<form action="{{ route ('category.update', ['id' => $category->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="Category" name="name" value="{{ old('name', $category->name) }}" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="Category" name="description" value="{{ $category->description }}">
    </div>
    <button type="submit" class="btn btn-primary">Update Category</button>
</form>
@endsection