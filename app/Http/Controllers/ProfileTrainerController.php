<?php

namespace App\Http\Controllers;


use App\Models\Trainer;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ProfileTrainerController extends Controller
{
    // public function index()
    // {
    //     return view('user.profil');
    // }   
    public function index()
    {
        $trainer = Auth::user();
        return view('trainer.profiletrainer', compact('trainer'));
    }
    public function edit(User $edit)
    {
        $trainer = Auth::user();
        return view('trainer.editprofiletrianer', compact('trainer'));
    }

    public function update(Request $request)
    {
        //validate form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8',
        ],);
        
        $trainer = Auth::user();

        $trainer->name = $request->input('name');
        $trainer->email = $request->input('email');

        if ($request->filled('password')) {
            $trainer->password = Hash::make($request->password);
        }

        //check if image is uploaded
        $trainer->update(); // Menyimpan perubahan ke database

        // Redirect kembali ke halaman profil dengan pesan sukses
        return redirect()->route('profiletrainer.edit')->with('success', 'Profile updated successfully!');
    }
    


}
