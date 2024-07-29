@extends('layout')

@section('title')
    {{ 'Detail Page' }}
@endsection
@section('content')
    <div class="container">
        <h5 class="mt-3">
            {{ $student->name }}'s Detail,
            <small class="text-muted">call admin to do more actions</small>
        </h5>

        @if (session()->has('success'))
            <div class="alert alert-success my-3" role="alert">
                {{ session('success') }}
            </div>
        @elseif (session()->has('error'))
            <div class="alert alert-danger my-3" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <table class="table mt-3 mb-5 table-striped table-bordered">
            <tbody>
                <tr>
                    <th scope="row">Photo</th>
                    <td>
                        @if (!$student->image)
                            <img width="100" src="{{ url('storage/student/image-dummy.jpg') }}" class="img-thumbnail">
                        @else
                            <img width="100" src="{{ url('storage/student/' . $student->image) }}" class="img-thumbnail">
                        @endif
                    </td>
                </tr>
                <tr>
                    <th scope="row">Name</th>
                    <td>{{ $student->name }}</td>
                </tr>
                <tr>
                    <th scope="row">NIS</th>
                    <td>{{ $student->nis }}</td>
                </tr>
                <tr>
                    <th scope="row">Classroom</th>
                    <td>{{ $student->getClassroom->name }}</td>
                </tr>
                <tr>
                    <th scope="row">Teacher</th>
                    <td>{{ $student->getClassroom->getTeacher->name }}</td>
                </tr>
                <tr>
                    <th scope="row">Subject</th>
                    <td>
                        @if ($student->getSubjects == '[]')
                            <button disabled class="btn btn-secondary btn-sm">Unassigned</button>
                        @else
                            @foreach ($student->getSubjects as $subject)
                                <button disabled class="btn btn-warning btn-sm">{{ $subject->name }}</button>
                            @endforeach
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="d-flex justify-content-between">
            <div class="d-flex justify-content-between gap-2">
                @if (auth()->user()->role == 'ADMIN')
                    <a type="button" href="{{ route('editStudent', $student->id) }}" class="btn btn-outline-warning">Edit
                        Student</a>
                    <form action="{{ route('deleteStudent', $student->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Delete
                            Student</button>
                    </form>
                @endif
            </div>
            <div class="">
                <a type="button" href="{{ route('home') }}" class="btn btn-primary">Go Back</a>
            </div>
        </div>
    </div>
@endsection
