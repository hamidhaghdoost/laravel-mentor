@extends('master')

@section('title', 'Edit post')

@section('content')

    <h1>Edit post</h1>

    <form action="{{ route('blog.update', $post->id) }}" method="post">

        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control mt-1" value="{{ $post->title }}">
        </div>

        <div class="form-group mt-3">
            <label for="body">Body</label>
            <textarea name="body" id="body" class="form-control mt-1" rows="10">{{ $post->body }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update post</button>

    </form>

@endsection
