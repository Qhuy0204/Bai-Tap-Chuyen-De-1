<?php

namespace App\Http\Controllers;
<<<<<<< HEAD
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
     public function index(Request $request)
    {
        $query = Student::query();

        // tìm kiếm
        if ($request->keyword) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        // sắp xếp
        $students = $query->orderBy('name', 'asc')->paginate(5);

        return view('students.index', compact('students'));
    }
    
=======

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

>>>>>>> a82435391ceea19b1bb587b982fffff116369fd6
    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
<<<<<<< HEAD
        // VALIDATION (BẮT BUỘC)
        $request->validate([
            'name' => 'required',
            'major' => 'required',
            'email' => 'required|email|unique:students'
        ]);

        Student::create($request->all());

        return redirect('/students')->with('success', 'Thêm thành công');
=======
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
>>>>>>> a82435391ceea19b1bb587b982fffff116369fd6
    }
}
