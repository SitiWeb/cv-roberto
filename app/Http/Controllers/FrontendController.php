<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Personalia;
use App\Models\Skill;
use App\Models\WorkExperience;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $skills = Skill::all();
        $personalia = Personalia::all();
        $education = Education::all();
        $experience = WorkExperience::all();
        return view('welcome', compact('skills', 'personalia', 'education', 'experience'));
    }
}
