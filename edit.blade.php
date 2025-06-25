@extends('layouts.app')

@section('content')
    <h2>Edit Course</h2>
    <form method="POST" action="{{ route('courses.update', $course->id) }}">
        @method('PUT')
        @include('courses._form')
    </form>
@endsection
