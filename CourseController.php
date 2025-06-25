<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Display all courses
    public function index()
    {
        $courses = Course::latest()->get();
        return view('courses.index', compact('courses'));
    }

    // Show the form for creating a new course
    public function create()
    {
        return view('courses.create');
    }

    // Store a newly created course
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video_url' => 'nullable|url',
        ]);

        Course::create($request->all());

        return redirect()->route('courses.index')->with('success', 'Course created successfully!');
    }

    // Display a specific course
    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    // Show the form for editing a course
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    // Update the specified course
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video_url' => 'nullable|url',
        ]);

        $course->update($request->all());

        return redirect()->route('courses.index')->with('success', 'Course updated successfully!');
    }

    // Delete a course
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully!');
    }
}
