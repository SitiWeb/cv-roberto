<?php

namespace App\Http\Controllers;

use App\Models\WorkExperience;
use Illuminate\Http\Request;

class WorkExperienceController extends Controller
{
    public function index()
    {
        $experiences = WorkExperience::with('media')->latest()->get();

        return view('work_experiences.index', compact('experiences'));
    }

    public function create()
    {
        return view('work_experiences.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'werkgever' => 'required|string|max:255',
            'functie' => 'required|string|max:255',
            'startdatum' => 'required|date',
            'einddatum' => 'nullable|date|after_or_equal:startdatum',
            'beschrijving' => 'nullable|string',
            'afbeelding' => 'nullable|image|max:2048',
        ]);

        $experience = WorkExperience::create($data);

        if ($request->hasFile('afbeelding')) {
            $experience->addMediaFromRequest('afbeelding')->toMediaCollection('image');
        }

        return redirect()->route('work-experiences.index')->with('success', 'Ervaring toegevoegd.');
    }

    public function show(WorkExperience $workExperience)
    {
        return view('work_experiences.show', compact('workExperience'));
    }

    public function edit(WorkExperience $workExperience)
    {
        return view('work_experiences.edit', compact('workExperience'));
    }

    public function update(Request $request, WorkExperience $workExperience)
    {
        $data = $request->validate([
            'werkgever' => 'required|string|max:255',
            'functie' => 'required|string|max:255',
            'startdatum' => 'required|date',
            'einddatum' => 'nullable|date|after_or_equal:startdatum',
            'beschrijving' => 'nullable|string',
            'afbeelding' => 'nullable|image|max:2048',
        ]);

        $workExperience->update($data);

        if ($request->hasFile('afbeelding')) {
            $workExperience->clearMediaCollection('image');
            $workExperience->addMediaFromRequest('afbeelding')->toMediaCollection('image');
        }

        return redirect()->route('work-experiences.index')->with('success', 'Ervaring bijgewerkt.');
    }

    public function destroy(WorkExperience $workExperience)
    {
        $workExperience->delete();

        return redirect()->route('work-experiences.index')->with('success', 'Ervaring verwijderd.');
    }
}
