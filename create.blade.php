@extends('layouts.app')

@section('content')
    <h2>Create New Course</h2>
    <form method="POST" action="{{ route('courses.store') }}">
        @include('courses._form')
    </form>
@endsection
