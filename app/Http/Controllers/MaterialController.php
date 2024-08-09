<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function getMaterials() {
        $materials = Material::latest()->with('course')->paginate(10)->withQueryString();

        return view('materials.materials', compact('materials'));
    }

    public function formAddMaterialFromCourse(Course $course) {
        return view('materials.add-material-from-course', compact('course'));
    }

    public function addMaterialFromCourse(Request $request) {
        $request->validate([
            'title' => 'required|min:5|max:100',
            'description' => 'required|min:20|max:500',
            'link' => 'required|min:35|max:200',
        ], [
            'title.required' => 'Judul wajib diisi.',
            'title.min' => 'Judul tidak boleh kurang dari 5 karakter.',
            'title.max' => 'Judul tidak boleh lebih dari 100 karakter.',
            'link.required' => 'Link embed wajib diisi.',
            'link.min' => 'Judul tidak boleh kurang dari 35 karakter.',
            'link.max' => 'Judul tidak boleh lebih dari 200 karakter.',
            'description.required' => 'Deskripsi wajib diisi.',
            'description.min' => 'Deskripsi tidak boleh kurang dari 20 karakter.',
            'description.max' => 'Deskripsi tidak boleh lebih dari 500 karakter.',
        ]);

        Material::create([
            'course_id' => $request->course_id,
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link
        ]);
        $course = Course::find($request->course_id);
        return redirect()->route('course.detail', $course->slug)->with(['success' => 'Materi berhasil ditambahkan']);
    }
}