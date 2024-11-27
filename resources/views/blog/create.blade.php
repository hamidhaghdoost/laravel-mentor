@extends('master')

@section('title', 'Create a post')

@section('content')

    <h1>Create a post</h1>

    <form action="{{ route('blog.save') }}" method="post">

        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control mt-1" value="{{ old('title') }}">
        </div>

        <div class="form-group mt-3">
            <label for="body">Body</label>
            <textarea name="body" id="body" class="form-control mt-1" rows="10">{{ old('body') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Create post</button>

    </form>

@endsection
