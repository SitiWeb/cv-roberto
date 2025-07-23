<?php

namespace App\Http\Controllers;

use App\Models\Personalia;
use Illuminate\Http\Request;
use App\Http\Requests\PersonaliaRequest;

class PersonaliaController extends Controller
{
    public function index()
    {
        $personalia = Personalia::all();

        return view('personalia.index', compact('personalia'));
    }

    public function create()
    {
        return view('personalia.create');
    }

    public function store(PersonaliaRequest $request)
    {
        $validated = $request->validated();

        Personalia::create([
            ...$validated,
            'hidden' => $request->boolean('hidden'),
        ]);

        return redirect()->route('personalia.index')->with('success', 'Persoonlijk item toegevoegd.');
    }

    public function edit(Personalia $personalium)
    {

        return view('personalia.edit', ['personalia' => $personalium]);
    }

    public function update(Request $request, Personalia $personalium)
    {
        $validated = $request->validated();

        $personalium->update([
            ...$validated,
            'hidden' => $request->boolean('hidden'),
        ]);
        return redirect()->route('personalia.index')->with('success', 'Persoonlijk item bijgewerkt.');
    }

    public function destroy(Personalia $personalia)
    {
        $personalia->delete();

        return redirect()->route('personalia.index')->with('success', 'Persoonlijk item verwijderd.');
    }
}
