@extends('master')

@section('title', 'Register')

@section('content')

    <div class="card">
        <div class="card-header">Register</div>

        <div class="card-body">
            <form method="post">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                {{-- submit --}}
                <button type="submit" class="btn btn-primary">Register</button>
                
            </form>
        </div>
    </div>

@endsection
