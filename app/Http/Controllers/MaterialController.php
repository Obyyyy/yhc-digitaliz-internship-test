<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function getMaterials() {
        $materials = Material::latest();

        return view('materials.materials', compact('materials'));
    }
}
