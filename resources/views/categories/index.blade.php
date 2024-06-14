@extends('layouts.app')

@section('title', 'Forum')

@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Categories</a>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            @foreach($categories as $category)
            <a class="nav-item nav-link" href="#">{{ $category->name }}</a>
            @endforeach
        </div>
        <div class="ml-auto">
            <a href="{{ route('categories.create') }}" class="btn btn-primary">Create Category</a>
            <a href="{{ route('forums.create') }}" class="btn btn-primary">Create Forum</a>
        </div>
    </div>
</nav>

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Manage Categories</h1>

            <ul class="list-group mt-4">
                @foreach($categories as $category)
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ $category->name }}</strong>
                        </div>
                        <div>
                            <a href="{{ route('categories.edit', ['category' => $category->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                        </div>
                    </div>
                    @if ($category->forums->count() > 0)
                    <ul class="list-group mt-2">
                        @foreach($category->forums as $forum)
                        <li class="list-group-item">
                            {{ $forum->name }}
                        </li>
                        @endforeach
                    </ul>
                    @else
                    <p class="text-muted mt-2">No forums available for this category.</p>
                    @endif
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@endsection