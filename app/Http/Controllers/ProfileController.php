<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    public function profile($id)
    {
           $user = Auth::user();
        return view('component/header-user', compact('user'));
    }   
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

    public function update(Request $request)
    {
        //validate form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8',
        ],);
        
        $user = Auth::user();

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        //check if image is uploaded
        $user->update(); // Menyimpan perubahan ke database

        // Redirect kembali ke halaman profil dengan pesan sukses
        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully!');
    }
    

}

