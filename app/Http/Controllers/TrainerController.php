<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:trainers',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Trainer::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'], // Akan di-hash oleh model
        ]);

        return redirect()->back()->with('success', 'Trainer account created successfully!');
    }
}
