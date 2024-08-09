<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CourseController extends Controller
{
    public function getCourses() {
        // $courses = Course::latest();
        // if(request('search')) {
        //     $courses->where('title', 'like', '%'.request('search').'%');
        // }

        $courses = Course::filter(request(['search']))->latest()->paginate(10)->withQueryString()->onEachSide(1);

        return view('courses/courses',compact('courses') );
    }

    public function formAddCourse(Request $request) {
        return view('courses/add-course');
    }

    public function AddCourse(Request $request) {
        $request->validate([
            'title' => 'required|min:5',
            'duration' => 'required|numeric|not_in:0',
            'description' => 'required|min:20|max:500',
        ], [
            'title.required' => 'Judul wajib diisi.',
            'title.min' => 'Judul tidak boleh kurang dari 5 karakter.',
            'duration.required' => 'Durasi Kursus wajib diisi.',
            'duration.numeric' => 'Masukkan durasi kursus dalam angka.',
            'duration.not_in' => 'Angka durasi tidak boleh 0.',
            'description.required' => 'Deskripsi wajib diisi.',
            'description.min' => 'Deskripsi tidak boleh kurang dari 20 karakter.',
            'description.max' => 'Deskripsi tidak boleh lebih dari 500 karakter.',
        ]);

        $course = Course::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'duration' => $request->duration,
            'description' => $request->description
        ]);
        if($course) {
            return redirect()->route('courses')->with('success', 'Kursus Berhasil Ditambahkan');
        } else {
            return redirect()->route('courses')->with('success', 'Kursus Gagal Ditambahkan');
        }
    }

    public function detailCourse(Course $course) {
        $materials = $course->materials()->get();
        return view('courses/course-detail', compact('course', 'materials'));
    }

    public function deleteCourse(Course $course) {
        $course->delete();
        return redirect()->route('courses')->with('success', 'Kursus Berhasil Dihapus.');
    }

    public function formEditCourse(Course $course) {
        return view('courses/edit-course', compact('course'));
    }

    public function editCourse(Request $request, Course $course) {
        $request->validate([
            'title' => 'required|min:5',
            'duration' => 'required|numeric|not_in:0',
            'description' => 'required|min:20|max:500',
        ], [
            'title.required' => 'Judul wajib diisi.',
            'title.min' => 'Judul tidak boleh kurang dari 5 karakter.',
            'duration.required' => 'Durasi Kursus wajib diisi.',
            'duration.numeric' => 'Masukkan durasi kursus dalam angka.',
            'duration.not_in' => 'Angka durasi tidak boleh 0.',
            'description.required' => 'Deskripsi wajib diisi.',
            'description.min' => 'Deskripsi tidak boleh kurang dari 20 karakter.',
            'description.max' => 'Deskripsi tidak boleh lebih dari 500 karakter.',
        ]);

        $course->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'duration' => $request->duration,
            'description' => $request->description
        ]);

        return redirect()->route('courses')->with(['success' => 'Kursus Berhail Diedit']);
    }
}