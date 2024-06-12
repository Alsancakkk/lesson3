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
        <div class="col-md-6 offset-md-3">
            <h1>Manage Categories</h1>

            <ul class="list-group mt-4">
                @foreach($categories as $category)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $category->name }}

                    <a href="{{ route('categories.edit', ['category' => $category->id]) }}" class="btn btn-sm btn-warning">Edit</a>

                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@endsection