@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-8">

    {{-- Success Message --}}
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif


    <!-- Page Header -->
    <div class="flex justify-between items-center mb-6">

        <h2 class="text-2xl font-bold text-gray-800">
            Courses
        </h2>

        <div class="flex gap-3">

            <!-- Search -->
            <form method="GET" action="{{ route('courses.index') }}" class="flex">
                <input 
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search courses..."
                   class="border border-gray-300 rounded-l px-4 py-2 outline-none focus:outline-none focus:ring-0 focus:border-gray-300"
                >

                <button type="submit"
                    class="bg-gray-800 text-white px-4 rounded-r hover:bg-gray-900 transition">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>

            <!-- Add Course -->
            <a href="{{ route('courses.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded-md shadow hover:bg-blue-700 transition">
                <i class="fa-solid fa-plus"></i> Add Course
            </a>

        </div>

    </div>


    <!-- Courses Table Card -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full border border-gray-200">

                <!-- Table Header -->
                <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
                    <tr>
                        <th class="px-6 py-3 text-left">ID</th>
                        <th class="px-6 py-3 text-left">Course Name</th>
                    </tr>
                </thead>

                <!-- Table Body -->
                <tbody class="divide-y divide-gray-200">

                    @forelse($courses as $course)

                        <tr class="hover:bg-gray-50 transition">

                            <td class="px-6 py-4 text-gray-700">
                                {{ $course->id }}
                            </td>

                            <td class="px-6 py-4 font-medium text-gray-800">
                                {{ $course->course_name }}
                            </td>

                        </tr>

                    @empty

                        <!-- Empty State -->
                        <tr>
                            <td colspan="2" class="text-center py-6 text-gray-500">
                                No courses found.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection