<?php

namespace App\Http\Controllers\Admin;

use App\Models\Certificate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminCertificateController extends Controller
{
    // Display list of certificate data
    public function index()
    {
        $certificates = Certificate::all();
        return view('admin.certificates.index', compact('certificates'));
    }

    // Show create form
    public function create()
    {
        return view('admin.certificates.create');
    }

    // Store new certificate data
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'issued_at' => 'required|date',
            'issued_by' => 'required|string|max:255',
            'file' => 'required|mimes:pdf|max:5120', // Max size 5MB
            'description' => 'nullable|string',
        ]);

        $filePath = $request->file('file')->store('certificates', 'public');

        Certificate::create([
            'title' => $request->title,
            'issued_at' => $request->issued_at,
            'issued_by' => $request->issued_by,
            'file' => $filePath,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.certificates.index')->with('success', 'Certificate created successfully.');
    }

    // Show edit form
    public function edit(Certificate $certificate)
    {
        return view('admin.certificates.edit', compact('certificate'));
    }

    // Update certificate data
    public function update(Request $request, Certificate $certificate)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'issued_at' => 'required|date',
            'issued_by' => 'required|string|max:255',
            'file' => 'nullable|mimes:pdf|max:5120', // Max size 5MB
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('certificates', 'public');
            $certificate->file = $filePath;
        }

        $certificate->title = $request->title;
        $certificate->issued_at = $request->issued_at;
        $certificate->issued_by = $request->issued_by;
        $certificate->description = $request->description;
        $certificate->save();

        return redirect()->route('admin.certificates.index')->with('success', 'Certificate updated successfully.');
    }

    // Delete certificate data
    public function destroy(Certificate $certificate)
    {
        $certificate->delete();
        return redirect()->route('admin.certificates.index')->with('success', 'Certificate deleted successfully.');
    }
}
