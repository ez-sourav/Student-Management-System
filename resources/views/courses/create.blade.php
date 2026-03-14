@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto sm:px-6 lg:px-8 py-6">

    <div class="bg-white shadow-md rounded-lg p-6">

        <h2 class="text-2xl font-semibold text-gray-800 mb-6">
            Add Course
        </h2>

        <form action="{{ route('courses.store') }}" method="POST">

            @csrf

            <!-- Course Name -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Course Name
                </label>

                <input
                    type="text"
                    name="course_name"
                    placeholder="Enter course name"
                    class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 px-3 py-2"
                >
            </div>

            <!-- Buttons -->
            <div class="flex gap-3">

                <button
                    type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition"
                >
                    Save Course
                </button>

                <a
                    href="{{ route('courses.index') }}"
                    class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 transition"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

@endsection