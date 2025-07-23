<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'opleiding' => ['required', 'string', 'max:255'],
            'instituut' => ['required', 'string', 'max:255'],
            'startdatum' => ['required', 'date'],
            'einddatum' => ['nullable', 'date', 'after_or_equal:startdatum'],
            'beschrijving' => ['nullable', 'string'],
            'afbeelding' => ['nullable', 'image', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'opleiding.required' => 'De naam van de opleiding is verplicht.',
            'opleiding.string' => 'De opleiding moet een geldige tekst zijn.',
            'opleiding.max' => 'De opleiding mag maximaal 255 tekens bevatten.',

            'instituut.required' => 'Het instituut is verplicht.',
            'instituut.string' => 'Het instituut moet een geldige tekst zijn.',
            'instituut.max' => 'Het instituut mag maximaal 255 tekens bevatten.',

            'startdatum.required' => 'De startdatum is verplicht.',
            'startdatum.date' => 'De startdatum moet een geldige datum zijn.',

            'einddatum.date' => 'De einddatum moet een geldige datum zijn.',
            'einddatum.after_or_equal' => 'De einddatum mag niet vóór de startdatum liggen.',

            'beschrijving.string' => 'De beschrijving moet een geldige tekst zijn.',

            'afbeelding.image' => 'De geüploade afbeelding moet een geldig afbeeldingsbestand zijn.',
            'afbeelding.max' => 'De afbeelding mag niet groter zijn dan 2MB.',
        ];
    }
}
