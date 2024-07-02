<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DataFormController extends Controller
{
    public function showDataForm()
    {
        return view('dataform');
    }

    public function processDataForm(Request $request)
    {
        // dd($request->all());
        $existingUser = User::where('email', $request->input('email'))->first();
    
        if ($existingUser) {
            return redirect()->back()->withInput()->withErrors(['email' => 'Email already exists.']);
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'number' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);
    // dd($validatedData);
        User::create($validatedData);
    
        return redirect()->route('show.form.data')->with('success', 'Form submitted successfully!');
    }
    
    public function showStoredData()
{
    $formData = User::all();
    return view('showStoredData', compact('formData'));
}


    public function showFormData()
    {
        $formData = User::latest()->get();
        return view('showFormData', compact('formData'));
    }
    
    
    public function editForm($id)
    {
        $formData = User::findOrFail($id);
        return view('editForm', compact('formData'));
    }

    public function updateDtaForm(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'number' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
        ]);

        $user = User::findOrFail($id);
        $user->update($validatedData);

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Form data updated successfully!']);
        } else {
            return redirect()->route('show.form.data')->with('success', 'Form data updated successfully!');
        }
    }
}
