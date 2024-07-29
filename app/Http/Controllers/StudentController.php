<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects = Subject::all();
        $classrooms = Classroom::all();
        return view('admin.student.create', compact('classrooms', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'nis' => 'required|numeric|min:10|gt:0|unique:students,nis',
            'image' => 'image|mimes:png,jpg,jpeg,gif,svg|max:10240',
            'classroom_id' => 'required',
        ]);

        if ($request->file('image') == '') {
            $student = Student::create([
                'name' => $request->name,
                'nis' => $request->nis,
                'classroom_id' => $request->classroom_id,
            ]);
        } else {
            $image = $request->file('image');
            $image->storeAs('public/student', $image->hashName());

            $student = Student::create([
                'name' => $request->name,
                'nis' => $request->nis,
                'image' => $image->hashName(),
                'classroom_id' => $request->classroom_id,
            ]);
        }

        $student->getSubjects()->attach($request->input('subjects'));

        return redirect()->route('home')->with(['success' => 'Data Siswa Berhasil Ditambahkan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::with(['getClassroom.getTeacher'])->findOrFail($id);

        return view('admin.student.detail', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        $classrooms = Classroom::all();
        $subjects = Subject::all();

        return view('admin.student.edit', compact('classrooms', 'student', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'string|max:100',
            'nis' => 'numeric|min:10|gt:0|unique:students,nis,' . $id,
        ]);

        $student = Student::findOrFail($id);
        $student->update([
            'name' => $request->name,
            'nis' => $request->nis,
            'classroom_id' => $request->classroom_id,
        ]);

        $student->getSubjects()->detach();
        $student->getSubjects()->attach($request->input('subjects'));

        return redirect()->route('detailStudent', $id)->with(['success' => 'Data Siswa Berhasil Diperbarui!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        Storage::delete('public/student/' . $student->image);

        return redirect()->route('home')->with(['success' => 'Data Siswa Berhasil Dihapus!']);
    }
}
