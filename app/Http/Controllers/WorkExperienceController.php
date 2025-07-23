<?php

namespace App\Http\Controllers;

use App\Models\WorkExperience;
use Illuminate\Http\Request;
use App\Http\Requests\WorkExperienceRequest;


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

    public function store(WorkExperienceRequest $request)
    {
        $experience = WorkExperience::create($request->validated());

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

    public function update(WorkExperienceRequest $request, WorkExperience $workExperience)
    {
        $workExperience->update($request->validated());

        if ($request->hasFile('afbeelding')) {
            $workExperience->clearMediaCollection('image');
            $workExperience->addMediaFromRequest('afbeelding')->toMediaCollection('image');
        }

        return redirect()->route('work-experiences.index')->with('success', 'Ervaring bijgewerkt.');
    }

    public function destroy(WorkExperience $workExperience)
    {
        $workExperience->clearMediaCollection('image');
        $workExperience->delete();

        return redirect()->route('work-experiences.index')->with('success', 'Ervaring verwijderd.');
    }
}
