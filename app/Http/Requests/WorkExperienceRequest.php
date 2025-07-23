<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkExperienceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'werkgever' => ['required', 'string', 'max:255'],
            'functie' => ['required', 'string', 'max:255'],
            'startdatum' => ['required', 'date'],
            'einddatum' => ['nullable', 'date', 'after_or_equal:startdatum'],
            'beschrijving' => ['nullable', 'string'],
            'afbeelding' => ['nullable', 'image', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'werkgever.required' => 'De naam van de werkgever is verplicht.',
            'werkgever.string' => 'De werkgever moet een geldige tekst zijn.',
            'werkgever.max' => 'De werkgever mag maximaal 255 tekens bevatten.',

            'functie.required' => 'De functietitel is verplicht.',
            'functie.string' => 'De functie moet een geldige tekst zijn.',
            'functie.max' => 'De functie mag maximaal 255 tekens bevatten.',

            'startdatum.required' => 'De startdatum is verplicht.',
            'startdatum.date' => 'De startdatum moet een geldige datum zijn.',

            'einddatum.date' => 'De einddatum moet een geldige datum zijn.',
            'einddatum.after_or_equal' => 'De einddatum mag niet vóór de startdatum liggen.',

            'beschrijving.string' => 'De beschrijving moet een geldige tekst zijn.',

            'afbeelding.image' => 'De afbeelding moet een geldig afbeeldingsbestand zijn.',
            'afbeelding.max' => 'De afbeelding mag niet groter zijn dan 2MB.',
        ];
    }
}
