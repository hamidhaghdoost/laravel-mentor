@extends('master')

@section('title', 'Home')

@section('content')
    <h1>Home page</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta enim accusamus optio qui voluptatibus, impedit
        tempore assumenda, ad accusantium, voluptatem sed. Sequi cum temporibus animi velit laborum ipsum, dolor in?</p>

    <a href="{{ route('about') }}" class="btn btn-primary">About</a>
@endsection
