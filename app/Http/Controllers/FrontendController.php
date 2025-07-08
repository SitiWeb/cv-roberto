<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Personalia;
use App\Models\Skill;
use App\Models\WorkExperience;
use Illuminate\Http\Request;
use App\Jobs\NotifyTelegramAboutPersonaliaClick;
use App\Jobs\NotifyTelegramAboutContactMessage;

class FrontendController extends Controller
{
    public function index()
    {
        $skills = Skill::all()->groupBy('type');

        $personalia = Personalia::all();
        $education = Education::orderBy('startdatum', 'desc')->get();
        $experience = WorkExperience::orderBy('startdatum', 'desc')->get();

        return view('welcome', compact('skills', 'personalia', 'education', 'experience'));
    }

    public function getPersonalia($id)
    {
        $item = Personalia::findOrFail($id);
        NotifyTelegramAboutPersonaliaClick::dispatch(
            $item,
            request()->ip(),
            request()->userAgent()
        );

        return response()->json([
            'value' => $item->value,
        ]);
    }

   public function message(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'message' => 'required|string|max:5000',
        'email' => 'nullable|email|max:255',
        'phone' => 'nullable|string|max:50',
    ]);

    NotifyTelegramAboutContactMessage::dispatch(
        $validated['name'],
        $validated['message'],
        $request->ip(),
        $request->userAgent(),
        $validated['email'] ?? null,
        $validated['phone'] ?? null
    );

    return response()->json(['status' => 'success']);
}

}
