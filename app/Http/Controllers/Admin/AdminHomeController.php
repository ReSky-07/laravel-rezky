<?php

namespace App\Http\Controllers\Admin;

use App\Models\Home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    // Display list of home data
    public function index()
    {
        $homes = Home::all();
        return view('admin.home.index', compact('homes'));
    }

    // Show create form
    public function create()
    {
        return view('admin.home.create');
    }

    // Store new home data
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'tagline' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $photoPath = $request->file('photo')->store('photos', 'public');

        Home::create([
            'photo' => $photoPath,
            'tagline' => $request->tagline,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.home.index')->with('success', 'Home content created successfully.');
    }

    // Show edit form
    public function edit(Home $home)
    {
        return view('admin.home.edit', compact('home'));
    }

    // Update home data
    public function update(Request $request, Home $home)
    {
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tagline' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $home->photo = $photoPath;
        }

        $home->tagline = $request->tagline;
        $home->description = $request->description;
        $home->save();

        return redirect()->route('admin.home.index')->with('success', 'Home content updated successfully.');
    }

    // Delete home data
    public function destroy(Home $home)
    {
        $home->delete();
        return redirect()->route('admin.home.index')->with('success', 'Home content deleted successfully.');
    }
}
