@extends('layouts.app')

@section('content')
    <h2>{{ $course->title }}</h2>
    <p>{{ $course->description }}</p>

    @if($course->video_url)
        <div class="ratio ratio-16x9 mb-3">
            <iframe src="{{ $course->video_url }}" frameborder="0" allowfullscreen></iframe>
        </div>
    @endif

    {{-- Buy Button for non-admin users --}}
    @if(auth()->check() && !auth()->user()->isAdmin())
        @if(auth()->user()->purchasedCourses->contains($course->id))
            <div class="alert alert-info mt-3">You have already purchased this course.</div>
        @else
            <form method="POST" action="{{ route('courses.buy', $course->id) }}">
                @csrf
                <button type="submit" class="btn btn-success mt-3">Buy This Course</button>
            </form>
        @endif
    @endif

    <a href="{{ route('courses.index') }}" class="btn btn-secondary mt-3">Back to Courses</a>
@endsection
