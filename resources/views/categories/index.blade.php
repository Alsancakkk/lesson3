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
            <a href="{{ route('categories.create') }}">Create Category</a>
        </div>
    </div>
</nav>
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
@endsection