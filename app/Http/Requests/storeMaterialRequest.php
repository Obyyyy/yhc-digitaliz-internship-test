<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeMaterialRequest extends FormRequest
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
            'title' => 'required|min:5|max:100',
            'description' => 'required|min:20|max:500',
            'link' => 'required|min:35|max:200',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul wajib diisi.',
            'title.min' => 'Judul tidak boleh kurang dari 5 karakter.',
            'title.max' => 'Judul tidak boleh lebih dari 100 karakter.',
            'link.required' => 'Link embed wajib diisi.',
            'link.min' => 'Judul tidak boleh kurang dari 35 karakter.',
            'link.max' => 'Judul tidak boleh lebih dari 200 karakter.',
            'description.required' => 'Deskripsi wajib diisi.',
            'description.min' => 'Deskripsi tidak boleh kurang dari 20 karakter.',
            'description.max' => 'Deskripsi tidak boleh lebih dari 500 karakter.',
        ];
    }
}