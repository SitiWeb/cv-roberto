<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Requests\SkillRequest;


class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::latest()->get();
        return view('skills.index', compact('skills'));
    }

    public function create()
    {
        return view('skills.create');
    }

    public function store(SkillRequest $request)
    {
        $skill = Skill::create($request->validated());

        if ($request->hasFile('image')) {
            $skill->addMediaFromRequest('image')->toMediaCollection('image', 'public');
        }

        return redirect()->route('skills.index')->with('success', 'Vaardigheid toegevoegd.');
    }

    public function show(Skill $skill)
    {
        return view('skills.show', compact('skill'));
    }

    public function edit(Skill $skill)
    {
        return view('skills.edit', compact('skill'));
    }

    public function update(SkillRequest $request, Skill $skill)
    {
        $skill->update($request->validated());

        if ($request->hasFile('image')) {
            $skill->clearMediaCollection('image');
            $skill->addMediaFromRequest('image')->toMediaCollection('image', 'public');
        }

        return redirect()->route('skills.index')->with('success', 'Vaardigheid bijgewerkt.');
    }

    public function destroy(Skill $skill)
    {
        $skill->clearMediaCollection('image');
        $skill->delete();

        return redirect()->route('skills.index')->with('success', 'Vaardigheid verwijderd.');
    }
}
