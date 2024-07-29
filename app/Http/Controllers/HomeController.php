<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $students = Student::with('getSubjects')->get();
        return view('home', compact('students'));
    }
}
