<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $courses = Course::when($search, function ($query) use ($search) {
            $query->where('course_name', 'like', '%' . $search . '%');
        })->get();

        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_name' => 'required',
        ]);

        Course::create([
            'course_name' => $request->course_name,
        ]);

        return redirect()->route('courses.index')
            ->with('success', 'Course added successfully');
    }
}