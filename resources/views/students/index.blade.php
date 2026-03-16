@extends('layouts.app')

@section('content')


<div class="max-w-7xl mx-auto px-6 py-8">

    @if(session('success'))
<div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded">
    {{ session('success') }}
</div>
@endif
    <!-- Page Header -->
    
<div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-6">

<h2 class="text-2xl font-bold text-gray-800">
Students
</h2>

<div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">

<!-- Search -->
<form method="GET" action="{{ route('students.index') }}" class="flex w-full sm:w-auto">

<input type="text"
       name="search"
       value="{{ request('search') }}"
       placeholder="Search students..."
       class="border border-gray-300 rounded-l px-4 py-2 w-full outline-none focus:outline-none focus:ring-0 focus:border-gray-300">

<button type="submit"
        class="bg-gray-800 text-white px-4 rounded-r">
        <i class="fa-solid fa-magnifying-glass"></i>
</button>

</form>

<!-- Add Student Button -->
<a href="{{ route('students.create') }}"
class="bg-blue-600 text-white px-4 py-2 rounded-md shadow hover:bg-blue-700 transition text-center">
<i class="fa-solid fa-plus"></i> Add Student
</a>

</div>

</div>

    <!-- Students Table Card -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">

        <div class="overflow-x-auto w-full">

        <table class="w-full border border-gray-200">

            <!-- Table Header -->
            <thead class="bg-gray-100 text-gray-700 text-sm uppercase">

                <tr>
                    <th class="px-6 py-3 text-left">Name</th>
                    <th class="px-6 py-3 text-left">Email</th>
                    <th class="px-6 py-3 text-left">Phone</th>
                    <th class="px-6 py-3 text-left">Course</th>
                    <th class="px-6 py-3 text-center">Action</th>
                </tr>

            </thead>

            <!-- Table Body -->
            <tbody class="divide-y divide-gray-200">

                @forelse($students as $student)

                <tr class="hover:bg-gray-50 transition">

                    <td class="px-6 py-4 font-medium text-gray-800">
                        {{ $student->name }}
                    </td>

                    <td class="px-6 py-4 text-gray-600">
                        {{ $student->email }}
                    </td>

                    <td class="px-6 py-4 text-gray-600">
                        {{ $student->phone }}
                    </td>

                    <td class="px-6 py-4 text-gray-600">
                        {{ $student->course->course_name }}
                    </td>

                    <td class="px-6 py-4 flex justify-center gap-3">

                        <a href="{{ route('students.edit',$student->id) }}"
                           class="bg-yellow-500 text-white px-3 py-2 rounded hover:bg-yellow-600 transition">
                           <i class="fa-solid fa-pen-to-square"></i>
                        </a>

                        <form action="{{ route('students.destroy',$student->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Are you sure you want to delete this student?')"
                                class="bg-red-500 text-white px-3 py-2 rounded hover:bg-red-600 transition">
                               <i class="fa-solid fa-trash-can"></i>
                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <!-- Empty State -->
                <tr>
                    <td colspan="5" class="text-center py-6 text-gray-500">
                        No students found.
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

        </div>
        
        <div class="p-4  flex justify-end">
    {{ $students->links() }}
    </div>
    </div>

</div>

@endsection