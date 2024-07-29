@extends('layout')

@section('content')
    <div class="container m-5">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            @method('POST')
            <!-- Name input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input name="name" class="form-control" />
                <label class="form-label">Fullname</label>
            </div>

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

            <!-- Submit button -->
            <button type="submit" data-mdb-button-init data-mdb-ripple-init
                class="btn btn-primary btn-block mb-4">Register</button>

            <!-- Register buttons -->
            <div class="text-center">
                <p>Already have an account ?<a href="{{ route('login') }}">Login</a></p>
            </div>
        </form>
    </div>
@endsection
