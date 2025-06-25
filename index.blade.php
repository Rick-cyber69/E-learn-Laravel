@extends('layouts.app')

@section('content')
    <h2>All Courses</h2>

    @if(auth()->user()->isAdmin())
        <a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">Add New Course</a>
    @endif

    @foreach ($courses as $course)
        <div class="card mb-3">
            <div class="card-body">
                <h5>{{ $course->title }}</h5>
                <p>{{ $course->description }}</p>

                <a href="{{ route('courses.show', $course->id) }}" class="btn btn-sm btn-info">View</a>

                @if(auth()->user()->isAdmin())
                    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                @endif
            </div>
        </div>
    @endforeach
@endsection
