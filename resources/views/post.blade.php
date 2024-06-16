@extends('master')

@section('title', 'Post')

@section('content')
    <h1>Post {{ $id }}</h1>
    <p>This is post number {{ $id }}.</p>
@endsection
