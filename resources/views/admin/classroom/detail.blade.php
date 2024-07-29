@extends('layout')

@section('title')
    {{ 'Detail Page' }}
@endsection
@section('content')
    <div class="container">
        <h5 class="mt-3">
            {{ $student->name }}'s Detail Student,
            <small class="text-muted">call admin to do more actions</small>
        </h5>
        <table class="table mt-3 mb-5 table-striped table-bordered">
            <tbody>
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
            </tbody>
        </table>
        <div class="d-flex justify-content-between">
            <div class="d-flex justify-content-between gap-2">
                <a type="button" href="{{ route('editStudent', $student->id) }}" class="btn btn-outline-warning">Edit
                    Student</a>
                <form action="{{ route('deleteStudent', $student->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Delete
                        Student</button>
                </form>
            </div>
            <div class="">
                <a type="button" href="{{ route('home') }}" class="btn btn-primary">Go Back</a>
            </div>
        </div>
    </div>
@endsection
