<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Profile;
use App\Models\Service;
use App\Models\Project;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Skill;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function about()
    {
        $profile = Profile::first();
        $services = Service::all();
        $projects = Project::all(); // Assuming about page shows some projects too based on existing code

        return Inertia::render('About', [
            'profile' => $profile,
            'services' => $services,
            'projects' => $projects,
        ]);
    }

    public function resume()
    {
        $education = Education::all();
        $experience = Experience::latest()->get();
        $skills = Skill::all();

        return Inertia::render('Resume', [
            'education' => $education,
            'experience' => $experience,
            'skills' => $skills,
        ]);
    }

    public function portfolio()
    {
        $projects = Project::all();

        return Inertia::render('Portfolio', [
            'projects' => $projects,
        ]);
    }

    public function contact()
    {
        return Inertia::render('Contact');
    }
}
