<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;

class AdminContactController extends Controller
{

    public function index()
    {
        $contact = Contact::latest()->get();
        return view('admin.contact.index', compact('contact'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required',
        ]);

        Contact::create($request->all());

        return redirect('/')->with('success', 'Your message has been sent successfully!');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin.contact.index')->with('success', 'Contact deleted successfully.');
    }
}
