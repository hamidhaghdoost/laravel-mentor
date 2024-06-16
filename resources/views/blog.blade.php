@extends('master')

@section('title', 'Blog')

@section('content')
    <h1>Blog</h1>
    <p>Welcome to my blog.</p>
    <p>Here are some of my latest posts:</p>
    <ul>
        <li><a href="{{ url('post/1') }}">Post 1</a></li>
        <li><a href="{{ url('post/2') }}">Post 2</a></li>
        <li><a href="{{ url('post/3') }}">Post 3</a></li>
    </ul>
@endsection
