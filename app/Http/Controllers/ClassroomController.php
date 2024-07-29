<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view('admin.classroom.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20|unique:classrooms,name',
        ]);

        Classroom::create([
            'name' => $request->name,
            'teacher_id' => $request->teacher_id,
        ]);

        return redirect()->route('home');
    }
}
