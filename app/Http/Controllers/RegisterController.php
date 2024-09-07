<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class RegisterController extends Controller
{
    function registeruser()
    {
        return view('register');
    } 
    function create(Request $request)
    {
        // Simpan sementara input untuk ditampilkan kembali di form jika validasi gagal
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);

        // Validasi input dari request
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'image' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'password' => 'required|min:6',
        ], [
            'name.required' => 'Nama Wajib Diisi',
            'email.required' => 'Email Wajib Diisi',
            'email.email' => 'Silahkan Masukan Email Yang Valid',
            'email.unique' => 'Email yang anda masukan sudah terdaftar, masukan email yang lain',
            'password.required' => 'Password Wajib Diisi',
            'password.min' => 'Minimal Password yang dimasukan adalah 6 karakter',
        ]);

        // Siapkan data untuk disimpan dengan role 'trainer'
        $datauser = [
            'name' => $request->name,
            'email' => $request->email,
            'image' => $request->image,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
            'keahlian' => 'pelajar',
            'role' => 'user', // Role diatur secara default menjadi 'user'
            'password' => Hash::make($request->password), // Hash password sebelum disimpan
        ];
         if($request->file('image')) {
        $datauser['image'] = $request->file('image')->store('profile_images');
        // Simpan data ke database
        User::create($datauser);

        // Siapkan data login untuk Auth::attempt (tanpa bcrypt pada password)
        $infologin = [
            'email' => $request->email,
            'password' => $request->password, // Gunakan password asli, bukan yang di-hash
        ];

        // Coba login setelah registrasi berhasil
        if (Auth::attempt($infologin)) {
            return redirect()->back()->with('success', 'Berhasil Melakukan Register, Silahkan login.');
        } else {
            return redirect()->back()->withErrors('Username dan Password yang dimasukkan tidak valid.');
        }
    }
}
    function registertrainer()
    {
        return view('admin.TambahTrainer');
    }
    function tambah(Request $request)
    {
       // Simpan sementara input untuk ditampilkan kembali di form jika validasi gagal
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);

        // Validasi input dari request
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'image'=> 'required',
            'password' => 'required|min:6',
        ], [
            'name.required' => 'Nama Wajib Diisi',
            'email.required' => 'Email Wajib Diisi',
            'email.email' => 'Silahkan Masukan Email Yang Valid',
            'email.unique' => 'Email yang anda masukan sudah terdaftar, masukan email yang lain',
            'password.required' => 'Password Wajib Diisi',
            'password.min' => 'Minimal Password yang dimasukan adalah 6 karakter',
        ]);

        // Siapkan data untuk disimpan dengan role 'trainer'
        $datatrainer = [
            'name' => $request->name,
            'email' => $request->email,
            'image' => $request->image,
            'role' => 'trainer', // Role diatur secara default menjadi 'trainer'
            'password' => Hash::make($request->password), // Hash password sebelum disimpan
        ];

        if($request->file('image')) {
            $datatrainer['image'] = $request->file('image')->store('profile_trainer');

        // Simpan data ke database
        User::create($datatrainer);

        // Siapkan data login untuk Auth::attempt (tanpa bcrypt pada password)
        $infologin = [
            'email' => $request->email,
            'password' => $request->password, // Gunakan password asli, bukan yang di-hash
        ];

        // Coba login setelah registrasi berhasil
        if (Auth::attempt($infologin)) {
            return redirect()->back()->with('success', 'Berhasil Melakukan Register, Silahkan login.');
        } else {
            return redirect()->back()->withErrors('Username dan Password yang dimasukkan tidak valid.');
        }
    }
}
}