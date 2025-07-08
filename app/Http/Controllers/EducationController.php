<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::with('media')->latest()->get();
        return view('educations.index', compact('educations'));
    }

    public function create()
    {
        return view('educations.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'opleiding' => 'required|string|max:255',
            'instituut' => 'required|string|max:255',
            'startdatum' => 'required|date',
            'einddatum' => 'nullable|date|after_or_equal:startdatum',
            'beschrijving' => 'nullable|string',
            'afbeelding' => 'nullable|image|max:2048',
        ]);

        $education = Education::create($data);

        if ($request->hasFile('afbeelding')) {
            $education->addMediaFromRequest('afbeelding')->toMediaCollection('image');
        }

        return redirect()->route('educations.index')->with('success', 'Opleiding toegevoegd.');
    }

    public function show(Education $education)
    {
        return view('educations.show', compact('education'));
    }

    public function edit(Education $education)
    {
        return view('educations.edit', compact('education'));
    }

    public function update(Request $request, Education $education)
    {
        $data = $request->validate([
            'opleiding' => 'required|string|max:255',
            'instituut' => 'required|string|max:255',
            'startdatum' => 'required|date',
            'einddatum' => 'nullable|date|after_or_equal:startdatum',
            'beschrijving' => 'nullable|string',
            'afbeelding' => 'nullable|image|max:2048',
        ]);

        $education->update($data);

        if ($request->hasFile('afbeelding')) {
            $education->clearMediaCollection('image');

            $education->addMediaFromRequest('afbeelding')->toMediaCollection('image');
        }

        return redirect()->route('educations.index')->with('success', 'Opleiding bijgewerkt.');
    }

    public function destroy(Education $education)
    {
        $education->delete();
        return redirect()->route('educations.index')->with('success', 'Opleiding verwijderd.');
    }
}
