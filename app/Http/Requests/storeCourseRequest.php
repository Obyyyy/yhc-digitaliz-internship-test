<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:5',
            'duration' => 'required|numeric|min:1',
            'description' => 'required|min:20|max:500',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul wajib diisi.',
            'title.min' => 'Judul tidak boleh kurang dari 5 karakter.',
            'duration.required' => 'Durasi Kursus wajib diisi.',
            'duration.numeric' => 'Masukkan durasi kursus dalam angka.',
            'duration.min' => 'Angka durasi tidak boleh kurang dari 1.',
            'description.required' => 'Deskripsi wajib diisi.',
            'description.min' => 'Deskripsi tidak boleh kurang dari 20 karakter.',
            'description.max' => 'Deskripsi tidak boleh lebih dari 500 karakter.',
        ];
    }
}