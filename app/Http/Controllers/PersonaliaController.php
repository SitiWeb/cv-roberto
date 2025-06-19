<?php

namespace App\Http\Controllers;

use App\Models\Personalia;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'key' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'hidden' => 'nullable|boolean',
            'icon' => 'nullable|string|max:255',
        ]);

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
        $validated = $request->validate([
            'key' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'hidden' => 'nullable|boolean',
            'icon' => 'nullable|string|max:255',
        ]);

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
