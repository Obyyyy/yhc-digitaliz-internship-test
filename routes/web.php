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

Route::group(['prefix'=>'courses'], function(){
    Route::get('/', [CourseController::class, 'getCourses'])->name('courses');
    Route::get('/add', [CourseController::class, 'formAddCourse'])->name('course.form.add');
    Route::post('/add', [CourseController::class, 'addCourse'])->name('course.add');
    Route::get('/{course:slug}', [CourseController::class, 'detailCourse'])->name('course.detail');
    Route::delete('/delete/{course:slug}', [CourseController::class, 'deleteCourse'])->name('course.delete');
    Route::get('/{course:slug}/edit', [CourseController::class, 'formEditCourse'])->name('course.form.edit');
    Route::put('/{course:slug}/edit', [CourseController::class, 'editCourse'])->name('course.edit');

    Route::get('/{course:slug}/material/add', [MaterialController::class, 'formAddMaterialFromCourse'])->name('course.form.add.material');
    Route::post('/{course:slug}/material/add', [MaterialController::class, 'addMaterialFromCourse'])->name('course.add.material');
});

Route::group(['prefix'=>'materials'], function(){
    Route::get('/', [MaterialController::class, 'getMaterials'])->name('materials');
});