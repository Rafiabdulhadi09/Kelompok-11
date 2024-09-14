<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Trainer;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048', // validasi untuk gambar
            'alamat' => 'nullable|string|max:255',
        ],);
        
        $trainer = Auth::user();

        $trainer->name = $request->input('name');
        $trainer->email = $request->input('email');
        $trainer->alamat = $request->input('alamat');

        if ($request->filled('password')) {
            $trainer->password = Hash::make($request->password);
        }

         // Cek apakah gambar di-upload
        if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        if ($trainer->image && Storage::exists('public/profile_trainer/' . $trainer->image)) {
            Storage::delete('public/profile_trainer/' . $trainer->image);
        }

        // Simpan gambar baru di folder public/storage/profile_images
        $imagePath = $request->file('image')->store('profile_trainer', 'public');
        $trainer->image = basename($imagePath); // Simpan nama file gambar ke dalam database
    }

         //check if image is uploaded
        $trainer->update(); // Menyimpan perubahan ke database

        // Redirect kembali ke halaman profil dengan pesan sukses
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
    


}
