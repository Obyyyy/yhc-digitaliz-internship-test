<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeMaterialRequest;
use App\Models\Course;
use App\Models\Material;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function createMaterial($course_id ,$title, $slug, $link, $description) {
        Material::create([
            'course_id' => $course_id,
            'title' => $title,
            'slug' => Str::slug($slug),
            'link' => $link,
            'description' => $description,
        ]);
    }

    public function updateMaterial($material, $title, $slug, $link, $description) {
        return $material->update([
            'title' => $title,
            'slug' => Str::slug($slug),
            'link' => $link,
            'description' => $description,
        ]);
    }

    public function getMaterials() {
        $materials = Material::filter(request(['search', 'course']))->orderBy('id', 'desc')->with('course')->paginate(10)->withQueryString();
        $courses = Course::select()->orderBy('id', 'desc')->get();
        return view('materials.materials', compact('materials', 'courses'));
    }

    public function formAddMaterial() {
        $courses = Course::latest()->get();
        return view('materials.add-material', compact('courses'));
    }

    public function formAddMaterialFromCourse(Course $course) {
        return view('materials.add-material-from-course', compact('course'));
    }

    public function addMaterial(storeMaterialRequest $request) {
        $course = Course::find($request->course);
        $combinedTitle = $course->title . ' ' . $request->title;
        $checkSlug = Material::select()->where('slug', Str::slug($combinedTitle))->first();
        if ($checkSlug) {
            return redirect()->route('materials')->with(['error' => 'Gagal menambahkan materi, berikan judul materi yang berbeda!']);
        }

        $this->createMaterial($request->course, $request->title, $combinedTitle, $request->link, $request->description);

        return redirect()->route('materials')->with(['success' => 'Berhasil menambahkan materi']);
    }

    public function addMaterialFromCourse(storeMaterialRequest $request) {
        $course = Course::find($request->course_id);
        $combinedTitle = $course->title . ' ' . $request->title;
        $checkSlug = Material::select()->where('slug', Str::slug($combinedTitle))->first();
        if ($checkSlug) {
            return redirect()->to('/materials?course='.$course->slug)->with(['error' => 'Gagal menambahkan materi, berikan judul materi yang berbeda!']);
        }

        $this->createMaterial($request->course_id, $request->title, $combinedTitle, $request->link, $request->description);

        return redirect()->to('/materials?course='.$course->slug)->with(['success' => 'Materi berhasil ditambahkan']);
    }

    public function formEditMaterial(Material $material) {
        return view('materials.edit-material', compact('material'));
    }

    public function editMaterial(storeMaterialRequest $request, Material $material) {
        $combinedTitle = $material->course->title . ' ' . $request->title;
        $courseQueryParam = $request->course;

        if ($request->title !== $material->title) {
            $checkSlug = Material::select()->where('slug', Str::slug($combinedTitle))->first();
            if ($checkSlug) {
                if ($courseQueryParam) {
                    return redirect()->to('/materials?course='.$courseQueryParam)->with('error', 'Gagal memperbarui materi, berikan judul materi yang berbeda!');;
                }
                return redirect()->route('materials')->with('error', 'Gagal memperbarui materi, berikan judul materi yang berbeda!');
            }
        }

        $updated = $this->updateMaterial($material, $request->title, $combinedTitle, $request->link, $request->description);

        if ($updated) {
            if ($courseQueryParam) {
                return redirect()->to('/materials?course='.$courseQueryParam)->with('success', 'Berhasil memperbarui materi');;
            }
            return redirect()->route('materials')->with('success', 'Berhasil memperbarui materi');
        } else {
            if ($courseQueryParam) {
                return redirect()->to('/materials?course='.$courseQueryParam)->with('success', 'Gagal memperbarui  materi');;
            }
            return redirect()->route('materials')->with('error', 'Gagal memperbarui  materi');
        }
    }

    public function deleteMaterial(Material $material, Request $request,) {
        $courseQueryParam = $request->course;
        $deleted = $material->delete();

        if ($deleted) {
            if ($courseQueryParam) {
                return redirect()->to('/materials?course='.$courseQueryParam)->with('success', 'Berhasil menghapus materi');
            } else {
                return redirect()->route('materials')->with('success', 'Berhasil menghapus materi');
            }
        } else {
            if ($courseQueryParam) {
                return redirect()->to('/materials?course='.$courseQueryParam)->with('success', 'Gagal menghapus materi');;
            } else {
                return redirect()->route('materials')->with('error', 'Gagal menghapus materi');
            }
        }
    }
}