@extends('layout')

@section('content')
    <div class="container mt-5 col-md-4">
        <form action="{{ route('addClassroom') }}" method="POST">
            @csrf
            @method('POST')
            <!-- Name input -->
            <label class="mt-5 form-label">Class Name</label>
            <div data-mdb-input-init class="form-outline mb-2">
                <input name="name" class="form-control" />
            </div>

            <!-- Teacher input -->
            <label class="form-label">Teacher</label>
            <select class="form-select mb-2" name="teacher_id">
                <option disabled selected>Select class teacher</option>
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                @endforeach
            </select>

            {{-- Alert --}}
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Submit button -->
            <button type="submit" data-mdb-button-init data-mdb-ripple-init
                class="btn btn-primary btn-block mt-3 mb-5">Create
                Classroom</button>

            <!-- Student buttons -->
            <div class="mt-5 text-center">
                <p>Student can added after classroom created, <a href="{{ route('addStudent') }}">add student</a></p>
            </div>
        </form>
    </div>
@endsection
