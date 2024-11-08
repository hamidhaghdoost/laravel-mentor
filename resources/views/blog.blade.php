@extends('master')

@section('title', 'Blog')

@section('content')
    <h1>Blog</h1>
    <p>Welcome to my blog.</p>
    <p>Here are some of my latest posts:</p>
    <ul>
        @foreach ($posts as $post)
            <li><a href="{{ url('post/' . $post->id) }}">{{ $post->title }}</a></li>
        @endforeach
    </ul>
@endsection
