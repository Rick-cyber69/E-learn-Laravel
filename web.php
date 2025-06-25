<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PurchaseController;

// --- Authentication Routes ---
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- Dashboard (Authenticated Users Only) ---
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// --- Default Landing Redirect to Dashboard ---
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// --- Public Course Viewing (for logged-in users) ---
Route::middleware('auth')->group(function () {
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
    Route::post('/courses/{course}/buy', [PurchaseController::class, 'buy'])->name('courses.buy');
});

// --- Admin-Only Course Management ---
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::put('/courses/{course}', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');
});
