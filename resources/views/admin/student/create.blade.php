@extends('layout')

@section('content')
    <div class="container mt-5 col-md-4">
        <form action="{{ route('addStudent') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <!-- Name input -->
            <label class="form-label">Name</label>
            <div data-mdb-input-init class="form-outline mb-2">
                <input required name="name" class="form-control" />
            </div>

            <!-- NIS input -->
            <label class="form-label">NIS</label>
            <div data-mdb-input-init class="form-outline mb-2">
                <input required name="nis" class="form-control" />
            </div>

            <!-- File input -->
            <label class="form-label">Upload Photo</label>
            <div class="form-outline mb-2">
                <input type="file" class="form-control-file form-control" name="image">
            </div>

            <!-- Class input -->
            <label class="form-label">Student's Classroom</label>
            <select required class="form-select mb-2" name="classroom_id">
                <option disabled selected>Select student's classroom</option>
                @foreach ($classrooms as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>

            <!-- Subject input -->
            <label class="form-label">Student's Subject</label>
            <select multiple class="form-select" name="subjects[]">
                <option disabled selected>Select student's subject</option>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            </select>

            {{-- Alert --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Submit button -->
            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block my-5">Add
                Student</button>

            <!-- Add Classroom buttons -->
            <div class="mt-5 text-center">
                <p>Classroom must added first, <a href="{{ route('addClassroom') }}">create classroom</a></p>
            </div>
        </form>
    </div>
@endsection
