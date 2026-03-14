<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStudents = Student::count();
        $totalCourses = Course::count();
        $latestStudents = Student::latest()->take(5)->get();

        return view('dashboard.index', compact(
            'totalStudents',
            'totalCourses',
            'latestStudents'
        ));
    }
}
