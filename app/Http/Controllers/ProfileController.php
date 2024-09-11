<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    public function profile()
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048', // validasi untuk gambar
            'alamat' => 'nullable|string|max:255',
        ],);
        
        $user = Auth::user();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->alamat = $request->input('alamat');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

         // Cek apakah gambar di-upload
        if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        if ($user->image && Storage::exists('public/profile_images/' . $user->image)) {
            Storage::delete('public/profile_images/' . $user->image);
        }

        // Simpan gambar baru di folder public/storage/profile_images
        $imagePath = $request->file('image')->store('profile_images', 'public');
        $user->image = basename($imagePath); // Simpan nama file gambar ke dalam database
    }

         //check if image is uploaded
        $user->update(); // Menyimpan perubahan ke database

        // Redirect kembali ke halaman profil dengan pesan sukses
        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully!');
    }
    

}