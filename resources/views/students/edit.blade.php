@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto mt-6 bg-white p-6 rounded shadow">

    <h2 class="text-2xl font-bold mb-4">Edit Student</h2>

    <form action="{{ route('students.update', $student->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1">Name</label>
            <input 
                type="text" 
                name="name" 
                value="{{ $student->name }}" 
                class="border p-2 w-full"
            >
        </div>

        <div class="mb-4">
            <label class="block mb-1">Email</label>
            <input 
                type="email" 
                name="email" 
                value="{{ $student->email }}" 
                class="border p-2 w-full"
            >
        </div>

        <div class="mb-4">
            <label class="block mb-1">Phone</label>
            <input 
                type="text" 
                name="phone" 
                value="{{ $student->phone }}" 
                class="border p-2 w-full"
            >
        </div>

        <div class="mb-4">
            <label class="block mb-1">Course</label>

            <select name="course_id" class="border p-2 w-full">

                @foreach($courses as $course)

                    <option value="{{ $course->id }}"
                        {{ $student->course_id == $course->id ? 'selected' : '' }}>

                        {{ $course->course_name }}

                    </option>

                @endforeach

            </select>

        </div>

        <button class="bg-blue-500 text-black px-4 py-2 rounded">
            Update Student
        </button>

    </form>

</div>

@endsection