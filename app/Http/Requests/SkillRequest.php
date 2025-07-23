<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'rating' => ['required', 'numeric', 'min:1', 'max:10'],
            'image' => ['nullable', 'image', 'max:2048'],
            'type' => ['required', 'in:rating,tag,other'],
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'Een titel is verplicht.',
            'rating.required' => 'Geef een beoordeling tussen 1 en 10.',
            'type.in' => 'Het type moet rating, tag of other zijn.',
        ];
    }

}
