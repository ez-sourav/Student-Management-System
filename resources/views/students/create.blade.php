@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto px-6 py-8">

<div class="bg-white shadow-md rounded-lg p-6">

<h2 class="text-2xl font-bold text-gray-800 mb-6">
Add Student
</h2>

<form action="{{ route('students.store') }}" method="POST">

@csrf

<!-- Name -->
<div class="mb-4">

<label class="block text-sm font-medium text-gray-700 mb-1">
Name
</label>

<input
type="text"
name="name"
value="{{ old('name') }}"
placeholder="Enter student name"
class="w-full border-gray-300 rounded-md px-3 py-2 focus:ring-blue-500 focus:border-blue-500"
>

@error('name')
<p class="text-red-500 text-sm mt-1">{{ $message }}</p>
@enderror

</div>


<!-- Email -->
<div class="mb-4">

<label class="block text-sm font-medium text-gray-700 mb-1">
Email
</label>

<input
type="email"
name="email"
value="{{ old('email') }}"
placeholder="Enter email"
class="w-full border-gray-300 rounded-md px-3 py-2 focus:ring-blue-500 focus:border-blue-500"
>

@error('email')
<p class="text-red-500 text-sm mt-1">{{ $message }}</p>
@enderror

</div>


<!-- Phone -->
<div class="mb-4">

<label class="block text-sm font-medium text-gray-700 mb-1">
Phone
</label>

<input
type="text"
name="phone"
value="{{ old('phone') }}"
placeholder="Enter phone number"
class="w-full border-gray-300 rounded-md px-3 py-2 focus:ring-blue-500 focus:border-blue-500"
>

@error('phone')
<p class="text-red-500 text-sm mt-1">{{ $message }}</p>
@enderror

</div>


<!-- Course -->
<div class="mb-6">

<label class="block text-sm font-medium text-gray-700 mb-1">
Course
</label>

<select
name="course_id"
class="w-full border-gray-300 rounded-md px-3 py-2 focus:ring-blue-500 focus:border-blue-500"
>

<option value="">Select Course</option>

@foreach($courses as $course)

<option value="{{ $course->id }}"
{{ old('course_id') == $course->id ? 'selected' : '' }}>
{{ $course->course_name }}
</option>

@endforeach

</select>

@error('course_id')
<p class="text-red-500 text-sm mt-1">{{ $message }}</p>
@enderror

</div>


<!-- Buttons -->
<div class="flex gap-3">

<button
type="submit"
class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition"
>
Save Student
</button>

<a
href="{{ route('students.index') }}"
class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 transition"
>
Cancel
</a>

</div>

</form>

</div>

</div>

@endsection