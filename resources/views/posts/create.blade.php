@extends('layouts.app')

@section('content')
<h1>Add Post</h1>
<form action="{{ route('post.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Post Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Post Description</label>
        <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
    </div>
    <div class="form-group">
        <label for="forum_id">Forum</label>
        <select name="forum_id" id="forum_id" class="form-control" required>
            @foreach($forums as $forum)
            <option value="{{ $forum->id }}">{{ $forum->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
</form>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@endsection