@extends('layout')

@section('content')
    <div class="container mt-5 col-md-4">
        <form action="{{ route('editStudent', $student->id) }}" method="POST">
            @csrf
            @method('PUT')
            <!-- Name input -->
            <label class="form-label">Name</label>
            <div data-mdb-input-init class="form-outline mb-2">
                <input value="{{ $student->name }}" name="name" class="form-control" />
            </div>

            <!-- NIS input -->
            <label class="form-label">NIS</label>
            <div data-mdb-input-init class="form-outline mb-2">
                <input value="{{ $student->nis }}" name="nis" class="form-control" />
            </div>

            <!-- NIS input -->
            <label class="form-label">Student's Classroom</label>
            <select class="form-select" name="classroom_id">
                @foreach ($classrooms as $class)
                    @if ($class->id == $student->getClassroom->id)
                        <option selected value="{{ $class->id }}">{{ $class->name }}
                        </option>
                    @else
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @endif
                @endforeach
            </select>

            {{-- Alert --}}
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Submit button -->
            <div class="d-flex justify-content-between">
                <a type="button" href="{{ route('detailStudent', $student->id) }}" class="btn btn-primary btn-block my-5">Back</a>
                <button type="submit" class="btn btn-outline-warning my-5">Update
                    Student</button>
            </div>
        </form>
    </div>
@endsection
