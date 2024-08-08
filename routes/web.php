<?php

use App\Models\Course;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MaterialController;

Route::get('/', function () {
    return view('index');
});


Route::get('/sales', function () {
    return view('404');
});

Route::get('/messages', function () {
    return view('404');
});

Route::get('/courses', [CourseController::class, 'getCourses'])->name('courses');
Route::get('/courses/add', [CourseController::class, 'formAddCourse'])->name('course.form.add');
Route::post('/courses/add', [CourseController::class, 'addCourse'])->name('course.add');
Route::get('/courses/{course:slug}', [CourseController::class, 'detailCourse'])->name('course.detail');
Route::get('/courses/delete/{course:slug}', [CourseController::class, 'deleteCourse'])->name('course.delete');
Route::get('/courses/{course:slug}/edit', [CourseController::class, 'formEditCourse'])->name('course.form.edit');
Route::post('/courses/{course:slug}/edit', [CourseController::class, 'editCourse'])->name('course.edit');


Route::get('/materials', [MaterialController::class, 'getMaterials'])->name('materials');