@extends('layouts.app')

@section('title', 'Web')

@section('content')

<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">Category Name</th>
            <th scope="col">Description</th>
            <th scope="col">Forum Count</th>
            <th scope="col">Action</th>

        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td>{{ $category->forums->count() }}</td>
            <td>
                <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this category?')" class="btn btn-danger btn-sm">Delete</button>
                </form>
                <form action="{{ route('category.edit', $category->id) }}" method="GET" style="display:inline-block;">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('category.create') }}" class="btn btn-primary">Create Category</a>

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