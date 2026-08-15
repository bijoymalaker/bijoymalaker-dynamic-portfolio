<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Service;
use App\Models\Project;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Skill;
use App\Models\ContactMessage;

class AdminController extends Controller
{
    public function dashboard()
    {
        return Inertia::render('admin/Dashboard', [
            'stats' => [
                'projects' => Project::count(),
                'messages' => ContactMessage::count(),
                'services' => Service::count(),
            ]
        ]);
    }

    // --- Profile ---
    public function profile()
    {
        return Inertia::render('admin/Profile', [
            'profile' => Profile::first()
        ]);
    }

    public function updateProfile(Request $request)
    {
        $profile = Profile::first();
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'bio1' => 'required|string',
            'bio2' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
            'birthday' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'facebook' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'github' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'avatar' => 'nullable|image|max:2048',
        ]);
        
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('profile', 'public');
            $validated['avatar_path'] = $path;
        }

        unset($validated['avatar']); // remove avatar from array before update
        
        $profile->update($validated);
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    // --- Projects ---
    public function projects()
    {
        return Inertia::render('admin/Projects', [
            'projects' => Project::all()
        ]);
    }

    public function storeProject(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
            'link' => 'nullable|string',
            'image' => 'nullable|image|max:2048'
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('projects', 'public');
        }

        Project::create([
            'title' => $validated['title'],
            'category' => $validated['category'],
            'description' => $validated['description'],
            'link' => $validated['link'],
            'image_path' => $path,
        ]);

        return redirect()->back()->with('success', 'Project created successfully.');
    }

    public function updateProject(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
            'link' => 'nullable|string',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('projects', 'public');
            $project->image_path = $path;
        }

        $project->title = $validated['title'];
        $project->category = $validated['category'];
        $project->description = $validated['description'];
        $project->link = $validated['link'] ?? '';
        $project->save();

        return redirect()->back()->with('success', 'Project updated successfully.');
    }

    public function destroyProject(Project $project)
    {
        $project->delete();
        return redirect()->back()->with('success', 'Project deleted.');
    }

    // --- Services ---
    public function services() {
        return Inertia::render('admin/Services', ['services' => Service::all()]);
    }
    public function storeService(Request $request) {
        $validated = $request->validate(['name' => 'required', 'description' => 'nullable']);
        Service::create($validated);
        return redirect()->back()->with('success', 'Service created.');
    }
    public function updateService(Request $request, Service $service) {
        $validated = $request->validate(['name' => 'required', 'description' => 'nullable']);
        $service->update($validated);
        return redirect()->back()->with('success', 'Service updated.');
    }
    public function destroyService(Service $service) {
        $service->delete();
        return redirect()->back()->with('success', 'Service deleted.');
    }

    // --- Education ---
    public function education() {
        return Inertia::render('admin/Education', ['education' => Education::all()]);
    }
    public function storeEducation(Request $request) {
        $validated = $request->validate(['degree' => 'required', 'institution' => 'required', 'years' => 'required']);
        Education::create($validated);
        return redirect()->back()->with('success', 'Education added.');
    }
    public function updateEducation(Request $request, Education $education) {
        $validated = $request->validate(['degree' => 'required', 'institution' => 'required', 'years' => 'required']);
        $education->update($validated);
        return redirect()->back()->with('success', 'Education updated.');
    }
    public function destroyEducation(Education $education) {
        $education->delete();
        return redirect()->back()->with('success', 'Education deleted.');
    }

    // --- Experience ---
    public function experience() {
        return Inertia::render('admin/Experience', ['experience' => Experience::latest()->get()]);
    }
    public function storeExperience(Request $request) {
        $validated = $request->validate(['title' => 'required', 'company' => 'required', 'years' => 'required', 'expertise' => 'nullable', 'description' => 'nullable']);
        Experience::create($validated);
        return redirect()->back()->with('success', 'Experience added.');
    }
    public function updateExperience(Request $request, Experience $experience) {
        $validated = $request->validate(['title' => 'required', 'company' => 'required', 'years' => 'required', 'expertise' => 'nullable', 'description' => 'nullable']);
        $experience->update($validated);
        return redirect()->back()->with('success', 'Experience updated.');
    }
    public function destroyExperience(Experience $experience) {
        $experience->delete();
        return redirect()->back()->with('success', 'Experience deleted.');
    }

    // --- Skills ---
    public function skills() {
        return Inertia::render('admin/Skills', ['skills' => Skill::all()]);
    }
    public function storeSkill(Request $request) {
        $validated = $request->validate(['name' => 'required', 'percentage' => 'required|numeric']);
        Skill::create($validated);
        return redirect()->back()->with('success', 'Skill added.');
    }
    public function updateSkill(Request $request, Skill $skill) {
        $validated = $request->validate(['name' => 'required', 'percentage' => 'required|numeric']);
        $skill->update($validated);
        return redirect()->back()->with('success', 'Skill updated.');
    }
    public function destroySkill(Skill $skill) {
        $skill->delete();
        return redirect()->back()->with('success', 'Skill deleted.');
    }

    // --- Messages ---
    public function messages()
    {
        return Inertia::render('admin/Messages', [
            'messages' => ContactMessage::latest()->get()
        ]);
    }

    public function destroyMessage(ContactMessage $message)
    {
        $message->delete();
        return redirect()->back()->with('success', 'Message deleted.');
    }
}
