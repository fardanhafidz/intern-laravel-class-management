<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.subject.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30',
        ]);

        Subject::create([
            'name' => $request->name,
        ]);

        return redirect()->route('home');
    }
}
