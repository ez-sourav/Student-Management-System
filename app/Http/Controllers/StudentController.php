<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;

    $students = Student::with('course')
        ->when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
        })
        ->get();

    return view('students.index', compact('students'));
}

    public function create()
    {
        $courses = Course::all();
        return view('students.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'course_id' => 'required'
        ]);

        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'course_id' => $request->course_id
        ]);

        return redirect()->route('students.index');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $courses = Course::all();

        return view('students.edit', compact('student', 'courses'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'course_id' => 'required'
        ]);

        $student = Student::findOrFail($id);

        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'course_id' => $request->course_id
        ]);

       return redirect()->route('students.index')
                     ->with('success', 'Student updated successfully!');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index') ->with('success', 'Student deleted successfully!');
    }
}