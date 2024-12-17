@extends('master')

@section('title', 'Categories')

@section('content')
    <h1>Categories</h1>

    {{-- add new category --}}
    <a href="#" class="btn btn-success">Add new Category</a>

    <hr>

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Posts count</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ Str::limit($category->name, 20) }}</td>
                    <td>{{ $category->posts->count() }}</td>
                    <td>{{ $category->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>{{ $category->updated_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                       {{-- TODO:: ... --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
