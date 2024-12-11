<?php

namespace App\Http\Controllers\Admin;

use App\Models\Skill;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminSkillController extends Controller
{
    // Display list of skill data
    public function index()
    {
        $skills = Skill::all();
        return view('admin.skill.index', compact('skills'));
    }

    // Show create form
    public function create()
    {
        return view('admin.skill.create');
    }

    // Store new skill data
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'required|string|max:255',
        ]);

        $photoPath = $request->file('photo')->store('photos', 'public');

        Skill::create([
            'photo' => $photoPath,
            'title' => $request->title,
        ]);

        return redirect()->route('admin.skill.index')->with('success', 'Skill content created successfully.');
    }

    // Show edit form
    public function edit(Skill $skill)
    {
        return view('admin.skill.edit', compact('skill'));
    }

    // Update skill data
    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'required|string|max:255',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $skill->photo = $photoPath;
        }

        $skill->title = $request->title;
        $skill->save();

        return redirect()->route('admin.skill.index')->with('success', 'Skill content updated successfully.');
    }

    // Delete skill data
    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('admin.skill.index')->with('success', 'Skill content deleted successfully.');
    }
}
