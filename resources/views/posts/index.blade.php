@extends('layouts.app')

@section('title', 'Web')

@section('content')

<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">Post Name</th>
            <th scope="col">Description</th>
            <th scope="col">Forum Name</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{$post->name}}</td>
            <td>{{$post->description}}</td>
            <td>{{$post->forum->name}}</td>

            <form action="{{ route ('post.destroy', ['id' => $post->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <td><button type="submit" onclick="return confirm('Are you sure you want to delete this post?')" class="btn btn-danger btn-sm">Delete</button></td>
            </form>

            <form action="{{ route('post.edit', ['id' => $post->id]) }}" method="GET">
                @csrf
                <td><button type="submit">Edit</button></td>
            </form>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('post.create') }}" class="btn btn-primary">Create Post</a>
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif


@endsection