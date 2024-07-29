@extends('layout')

@section('title')
    {{ 'Home Page' }}
@endsection
@section('content')
    <div class="container">
        <h3 class="my-3">
            Student Table,
            <small class="text-muted">call admin to do more actions</small>
        </h3>
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
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->nis }}</td>
                        <td>
                            @if ($student->getSubjects == '[]')
                                <button disabled class="btn btn-secondary btn-sm">Unassigned</button>
                            @else
                                @foreach ($student->getSubjects as $subject)
                                    <button disabled class="btn btn-warning btn-sm">{{ $subject->name }}</button>
                                @endforeach
                            @endif
                        </td>
                        <td><a type="button" href="{{ route('detailStudent', $student->id) }}"
                                class="btn btn-primary btn-sm">Detail</a>
                        </td>
                    </tr>
                @empty
                    <div class="alert alert-danger">
                        Data siswa belum tersedia.
                    </div>
                @endforelse

            </tbody>
        </table>
        @if (auth()->user()->role == 'ADMIN')
            <a type="button" href="{{ route('addStudent') }}" class="btn btn-secondary">Add Student</a>
        @endif
    </div>
@endsection
