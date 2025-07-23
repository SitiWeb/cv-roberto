<?php

namespace App\Http\Controllers;

use App\Http\Requests\EducationRequest;
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

    public function store(EducationRequest $request)
    {
        $education = Education::create($request->validated());

        $this->handleImageUpload($request, $education);

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

    public function update(EducationRequest $request, Education $education)
    {
        $education->update($request->validated());

        $this->handleImageUpload($request, $education, true);

        return redirect()->route('educations.index')->with('success', 'Opleiding bijgewerkt.');
    }

    public function destroy(Education $education)
    {
        $education->clearMediaCollection('image');
        $education->delete();

        return redirect()->route('educations.index')->with('success', 'Opleiding verwijderd.');
    }

    protected function handleImageUpload(Request $request, Education $education, bool $replace = false): void
    {
        if ($request->hasFile('afbeelding')) {
            if ($replace) {
                $education->clearMediaCollection('image');
            }

            $education->addMediaFromRequest('afbeelding')->toMediaCollection('image');
        }
    }
}
