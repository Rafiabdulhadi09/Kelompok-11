<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    // public function index()
    // {
    //     return view('user.profil');
    // }   
    public function index()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }
    public function edit(User $edit)
    {
        $user = Auth::user();
        return view('user.editprofile', compact('user'));
    }

    public function update(Request $request, User $edit)
    {
        //validate form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ],);
        
        $edit->name = $request->input('name');
        $edit->email = $request->input('email');

        //check if image is uploaded
        $edit->update(); // Menyimpan perubahan ke database

        // Redirect kembali ke halaman profil dengan pesan sukses
        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully!');
    }
    

}

