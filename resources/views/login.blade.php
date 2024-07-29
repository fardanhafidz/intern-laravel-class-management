@extends('layout')
@section('title')
    {{ 'Login Page' }}
@endsection
@section('content')
    <div class="container mt-5 col-md-4">
        <form action="{{ route('actionLogin') }}" method="POST">
            @csrf
            @method('POST')
            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="email" name="email" class="form-control" />
                <label class="form-label">Email Address</label>
            </div>

            <!-- Password input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="password" name="password" class="form-control" />
                <label class="form-label">Password</label>
            </div>

            {{-- Alert --}}
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Submit button -->
            <button type="submit" data-mdb-button-init data-mdb-ripple-init
                class="btn btn-primary btn-block mb-4">Login</button>

            <!-- Register buttons -->
            <div class="text-center">
                <p>Dont have account yet? <a href="{{ route('register') }}">Register</a></p>
            </div>
        </form>
    </div>
@endsection
