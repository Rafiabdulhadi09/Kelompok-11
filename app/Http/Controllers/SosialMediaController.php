<?php

namespace App\Http\Controllers;

use App\Models\DataKelas;
use App\Models\MediaSosial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SosialMediaController extends Controller
{
    // Method untuk menampilkan semua data sosial media
    function sosialmedia()
    {
        $sosialmedia = MediaSosial::all();
        return view('welcome', compact('sosialmedia'));
    } 
    
    // Method untuk menampilkan halaman pengaturan admin dan data sosial media tertentu
    public function index($id)
    {
        $sosialmedia = MediaSosial::findOrFail($id); // Cari data sosial media berdasarkan ID
        return view('admin.setting', compact('sosialmedia')); // Tampilkan view admin.setting dengan data sosial media
    }

    // Method untuk meng-update data sosial media
    public function update(Request $request, $id)
    {
        // Validasi input dari form
        $request->validate([
            'x' => 'required|string|max:255', // Validasi field x
            'instagram' => 'required|string|max:255', // Validasi field instagram
            'youtube' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048' // Validasi field youtube
        ]);

        // Cari data sosial media berdasarkan ID
        $sosialmedia = MediaSosial::findOrFail($id);
        
        // Update data sosial media dengan data baru dari form
        $sosialmedia->update([
            'x' => $request->x,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
            'logo'=> $request->logo,
            'nama_perusahaan' => $request->nama_perusahaan,
            'alamat' => $request->alamat,
            'telephone' => $request->telephone,
            'email' => $request->email
        ]);
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($sosialmedia->logo && Storage::exists('public/logo/' . $sosialmedia->logo)) {
                Storage::delete('public/logo/' . $sosialmedia->logo);
            }
    
            // Simpan gambar baru di folder public/storage/logo
            $imagePath = $request->file('image')->store('logo', 'public');
            $sosialmedia->logo = basename($imagePath); // Simpan nama file gambar ke kolom 'logo'
        }
    
        // Simpan perubahan
        $sosialmedia->save();

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Data sosial media berhasil di-update');
    }
}