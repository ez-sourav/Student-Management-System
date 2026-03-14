@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">

<h2 class="text-2xl font-semibold text-gray-800 mb-6">
    Dashboard
</h2>

<!-- Statistics -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

    <!-- Total Students -->
    <div class="bg-white shadow rounded-lg p-6 flex items-center justify-between hover:shadow-lg transition">
        
        <div>
            <p class="text-sm text-gray-500">Total Students</p>
            <p class="text-4xl font-bold text-blue-600 mt-2">
                {{ $totalStudents }}
            </p>
        </div>

        <div class=" text-blue-600 p-4 rounded-full text-3xl">
            <i class="fa-solid fa-users"></i>
        </div>

    </div>

    <!-- Total Courses -->
    <div class="bg-white shadow rounded-lg p-6 flex items-center justify-between hover:shadow-lg transition">
        
        <div>
            <p class="text-sm text-gray-500">Total Courses</p>
            <p class="text-4xl font-bold text-green-600 mt-2">
                {{ $totalCourses }}
            </p>
        </div>

        <div class=" text-green-600 p-4 rounded-full text-3xl">
            <i class="fa-solid fa-book"></i>
        </div>

    </div>

</div>

<!-- Latest Students -->

<div class="bg-white shadow rounded-lg p-6">

<h3 class="text-lg font-semibold text-gray-700 mb-4">
    Latest Students
</h3>

<div class="overflow-x-auto">

    <table class="min-w-full divide-y divide-gray-200">

        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Name</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Email</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Phone</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Course</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Added</th>
            </tr>
        </thead>

        <tbody class="bg-white divide-y divide-gray-200">

            @forelse($latestStudents as $student)

            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-3">{{ $student->name }}</td>
                <td class="px-6 py-3">{{ $student->email }}</td>
                <td class="px-6 py-3">{{ $student->phone }}</td>
                <td class="px-6 py-3 text-gray-700">
                    {{ $student->course->course_name ?? 'No Course' }}
                </td>
                <td class="px-6 py-3 text-gray-500 text-sm">
                    <i class="fa-solid fa-clock mr-1"></i>
                    {{ $student->created_at->diffForHumans() }}
                </td>
            </tr>

            @empty
            <tr>
                <td colspan="4" class="px-6 py-6 text-center text-gray-500">
                    No students found
                </td>
            </tr>
            @endforelse

        </tbody>

    </table>

</div>

</div>

</div>

@endsection
