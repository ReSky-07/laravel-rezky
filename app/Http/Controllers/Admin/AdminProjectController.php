<?php
namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProjectController extends Controller
{
    // Display list of project data
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    // Show create form
    public function create()
    {
        return view('admin.projects.create');
    }

    // Store new project data
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'link' => 'required|url',
            'date' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Store image
        $imagePath = $request->file('image')->store('projects', 'public');

        // Create project
        Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link,
            'date' => $request->date,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    // Show edit form
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    // Update project data
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'link' => 'required|url',
            'date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if new image is uploaded
            if ($project->image) {
                Storage::delete('public/' . $project->image);
            }

            $imagePath = $request->file('image')->store('projects', 'public');
            $project->image = $imagePath;
        }

        // Update project fields
        $project->title = $request->title;
        $project->description = $request->description;
        $project->link = $request->link;
        $project->date = $request->date;
        $project->save();

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    // Delete project data
    public function destroy(Project $project)
    {
        // Delete image from storage
        if ($project->image) {
            Storage::delete('public/' . $project->image);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }
}
