<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAboutController extends Controller
{
    // Display list of about data
    public function index()
    {
        $abouts = About::all();
        return view('admin.about.index', compact('abouts'));
    }

    // Show create form
    public function create()
    {
        return view('admin.about.create');
    }

    // Store new about data
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
        ]);

        $photoPath = $request->file('photo')->store('photos', 'public');

        About::create([
            'photo' => $photoPath,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
        ]);

        return redirect()->route('admin.about.index')->with('success', 'About content created successfully.');
    }

    // Show edit form
    public function edit(About $about)
    {
        return view('admin.about.edit', compact('about'));
    }

    // Update about data
    public function update(Request $request, About $about)
    {
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $about->photo = $photoPath;
        }

        $about->title = $request->title;
        $about->subtitle = $request->subtitle;
        $about->save();

        return redirect()->route('admin.about.index')->with('success', 'About content updated successfully.');
    }

    // Delete about data
    public function destroy(About $about)
    {
        $about->delete();
        return redirect()->route('admin.about.index')->with('success', 'About content deleted successfully.');
    }
}
