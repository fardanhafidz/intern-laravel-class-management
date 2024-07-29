@extends('layout')

@section('content')
    <div class="container mt-5 col-md-4">
        <form action="{{ route('addSubject') }}" method="POST">
            @csrf
            @method('POST')
            <!-- Name input -->
            <label class="mt-5 form-label">Subject Name</label>
            <div data-mdb-input-init class="form-outline mb-2">
                <input name="name" class="form-control" />
            </div>

            {{-- Alert --}}
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Submit button -->
            <button type="submit" data-mdb-button-init data-mdb-ripple-init
                class="btn btn-primary btn-block mt-3 mb-5">Create
                Subject</button>

            <!-- Student buttons -->
            <div class="mt-5 text-center">
                <p>Student can be attached with several subjects</p>
            </div>
        </form>
    </div>
@endsection
