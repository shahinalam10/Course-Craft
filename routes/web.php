<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

//HomeController
Route::get('/',[HomeController::class, 'index'])->name('home');

// CourseController
Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index'); // List
Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show'); // Show
Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit'); // Edit
Route::put('/courses/{course}', [CourseController::class, 'update'])->name('courses.update'); // Update
Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy'); // Delete