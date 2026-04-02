<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'major' => 'required'
        ]);

        Student::create([
            'name' => $request->name,
            'major' => $request->major
        ]);

        return redirect('/students');
    }

    public function edit($id)
    {
        $student = Student::find($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        $student->update([
            'name' => $request->name,
            'major' => $request->major
        ]);

        return redirect('/students');
    }

    public function delete($id)
    {
        Student::destroy($id);
        return redirect('/students');
    }
}
