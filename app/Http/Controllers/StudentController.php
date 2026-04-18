<?php

namespace App\Http\Controllers;
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
    
    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        // VALIDATION (BẮT BUỘC)
        $request->validate([
            'name' => 'required',
            'major' => 'required',
            'email' => 'required|email|unique:students'
        ]);

        Student::create($request->all());

        return redirect('/students')->with('success', 'Thêm thành công');
    }
}
