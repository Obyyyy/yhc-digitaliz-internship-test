<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeCourseRequest;
use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CourseController extends Controller
{
    public function getCourses() {
        $courses = Course::filter(request(['search']))->latest()->paginate(10)->withQueryString()->onEachSide(1);
        return view('courses/courses',compact('courses') );
    }

    public function formAddCourse(Request $request) {
        return view('courses/add-course');
    }

    public function AddCourse(storeCourseRequest $request) {
        $checkTitle = Course::select()->where('title', $request->title)->first();
        if ($checkTitle) {
            return redirect()->route('courses')->with('error', 'Gagal menambahkah kursus, berikan Judul berbeda');
        }

        $course = Course::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'duration' => $request->duration,
            'description' => $request->description
        ]);

        if($course) {
            return redirect()->route('courses')->with('success', 'Berhasil menambahkan kursus');
        } else {
            return redirect()->route('courses')->with('error', 'Gagal menambahkan kursus');
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

    public function editCourse(storeCourseRequest $request, Course $course) {
        if ($request->title !== $course->title) {
            $checkTitle = Course::select()->where('title', $request->title)->first();
            if ($checkTitle) {
                return redirect()->route('courses')->with('error', 'Gagal menambahkah kursus, berikan Judul berbeda');
            }
        }

        $course->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'duration' => $request->duration,
            'description' => $request->description
        ]);

        return redirect()->route('courses')->with(['success' => 'Berhasil mengedit kursus']);
    }
}