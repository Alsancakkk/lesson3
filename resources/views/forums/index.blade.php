@extends('layouts.app')

@section('title', 'Web')

@section('content')

<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">Forum Name</th>
            <th scope="col">Description</th>
            <th scope="col">Category Name</th>
            <th scope="col">Post Count</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($forums as $forum)
        <tr>
            <td>{{$forum->name}}</td>
            <td>{{$forum->description}}</td>
            <td>{{$forum->category->name}}</td>
            <td>{{$forum->posts->count() }}</td>

            <form action="{{ route ('forum.destroy', ['id' => $forum->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <td><button type="submit" onclick="return confirm('Are you sure you want to delete this forum?')" class="btn btn-danger btn-sm">Delete</button></td>
            </form>

            <form action="{{ route('forum.edit', ['id' => $forum->id]) }}" method="GET">
                @csrf
                <td><button type="submit">Edit</button></td>
            </form>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('forum.create') }}" class="btn btn-primary">Create Forum</a>
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