<?php

use App\Models\Course;
use App\Models\Material;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MaterialController;

Route::get('/', function () {
    $courseCount = Course::all()->count();
    $materialCount = Material::all()->count();
    return view('index', compact('courseCount', 'materialCount'));
})->name('home');

Route::group(['prefix'=>'courses'], function(){
    Route::get('/', [CourseController::class, 'getCourses'])->name('courses');
    Route::get('/add', [CourseController::class, 'formAddCourse'])->name('course.form.add');
    Route::post('/add', [CourseController::class, 'addCourse'])->name('course.add');

    Route::group(['prefix' => '{course:slug}'], function(){
        Route::get('/', [CourseController::class, 'detailCourse'])->name('course.detail');
        Route::get('/edit', [CourseController::class, 'formEditCourse'])->name('course.form.edit');
        Route::put('/edit', [CourseController::class, 'editCourse'])->name('course.edit');
        Route::get('/material/add', [MaterialController::class, 'formAddMaterialFromCourse'])->name('course.form.add.material');
        Route::post('/material/add', [MaterialController::class, 'addMaterialFromCourse'])->name('course.add.material');
        Route::delete('/delete', [CourseController::class, 'deleteCourse'])->name('course.delete');
    });
});

Route::group(['prefix'=>'materials'], function(){
    Route::get('/', [MaterialController::class, 'getMaterials'])->name('materials');
    Route::get('/add', [MaterialController::class, 'formAddMaterial'])->name('material.form.add');
    Route::post('/add', [MaterialController::class, 'addMaterial'])->name('material.add');

    Route::group(['prefix'=>'{material:slug}'], function(){
        Route::get('/edit', [MaterialController::class, 'formEditMaterial'])->name('material.form.edit');
        Route::put('/edit', [MaterialController::class, 'editMaterial'])->name('material.edit');
        Route::delete('/delete', [MaterialController::class, 'deleteMaterial'])->name('material.delete');
    });
});