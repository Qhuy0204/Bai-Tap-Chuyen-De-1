<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        $courses = Course::all();
        $enrollments = Enrollment::with('student','course')->get();

        return view('enrollments.index', compact('students','courses','enrollments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id'=>'required',
            'course_id'=>'required'
        ]);

        // ❌ kiểm tra trùng
        $exists = Enrollment::where('student_id',$request->student_id)
            ->where('course_id',$request->course_id)
            ->exists();

        if ($exists) {
            return back()->with('error','Đã đăng ký môn này');
        }

        // ❌ kiểm tra tổng tín chỉ
        $total = Enrollment::join('courses','courses.id','=','enrollments.course_id')
            ->where('student_id',$request->student_id)
            ->sum('credits');

        $course = Course::find($request->course_id);

        if ($total + $course->credits > 18) {
            return back()->with('error','Vượt quá 18 tín chỉ');
        }

        Enrollment::create($request->all());

        return back()->with('success','Đăng ký thành công');
    }
}
