<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Handle course purchase by the authenticated user.
     */
    public function buy(Course $course)
    {
        $user = auth()->user();

        // Check if the user already bought the course
        if ($user->purchasedCourses->contains($course->id)) {
            return redirect()->route('courses.show', $course->id)->with('info', 'You already own this course.');
        }

        // Attach the course to the user's purchases
        $user->purchasedCourses()->attach($course->id);

        return redirect()->route('dashboard')->with('success', 'Course purchased successfully!');
    }
}
