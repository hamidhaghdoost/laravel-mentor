@extends('master')

@section('title', 'Blog')

@section('content')
    <h1>Blog</h1>
    <p>Welcome to my blog.</p>
    <p>Here are some of my latest posts:</p>

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Category</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ Str::limit($post->title, 20) }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>{{ $post->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>{{ $post->updated_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ url('post/' . $post->id) }}">Read more</a>
                        <a class="btn btn-sm btn-danger" href="{{ url('blog/' . $post->id . '/delete') }}">Delete</a>
                        <a class="btn btn-sm btn-warning" href="{{ url('blog/' . $post->id . '/edit') }}">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
