@extends('layouts.app')

@section('title', 'Web')

@section('content')
<div class="title">Edit Forum</div>
<form action="{{ route ('forum.update', ['id' => $forum->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="Forum" name="name" value="{{ old('name', $forum->name) }}" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="Forum" name="description" value="{{ $forum->description }}">
    </div>
    <div class="form-group">
        <label for="category_id">Category</label>
        <select name="category_id" id="category_id" class="form-control" required>
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update Forum</button>
</form>
@endsection