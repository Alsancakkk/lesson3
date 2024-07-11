@extends('layouts.app')

@section('title', 'Web')

@section('content')
<div class="title">Edit Post</div>
<form action="{{ route ('post.update', ['id' => $post->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="Post" name="name" value="{{ old('name', $post->name) }}" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="Post" name="description" value="{{ $post->description }}">
    </div>
    <div class="form-group">
        <label for="forum_id">Forum</label>
        <select name="forum_id" id="forum_id" class="form-control" required>
            @foreach($forums as $forum)
            <option value="{{ $forum->id }}">{{ $forum->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update Post</button>
</form>
@endsection