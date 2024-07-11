@extends('layouts.app')

@section('title', 'Web')

@section('content')

<h1 style="text-align:center">Welcome</h1>
<ul>
    <h2><a href="{{ route('categoryhome') }}">Categories</a></h2>
    <h2><a href="{{ route('forumhome') }}">Forums</a></h2>
    <h2><a href="{{ route('posthome') }}">Posts</a></h2>
</ul>

@endsection