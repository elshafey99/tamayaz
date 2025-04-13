<?php

namespace App\Http\Requests\Admin\Course;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'image' => 'nullable|array',
            'link_zoom' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
            'file' => 'nullable|array',
            'video' => 'nullable|string',
            'price' => 'required|numeric',
            'status' => 'required|in:1,0',
            'stage_id' => 'nullable|exists:stages,id',
            'grade_id' => 'nullable|exists:grades,id',
            'instructor_id' => 'required|exists:instructors,id',
        ];
    }
}
