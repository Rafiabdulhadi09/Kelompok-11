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
    function register()
    {
        return view('register');
    }
    function create(Request $request)
    {
       Session::flash('name', $request->name);
       Session::flash('email', $request->email);
       Session::flash('role', $request->role);
       $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6'
       ], [
        'name.required' => 'Nama Wajib Diisi',
        'email.required' => 'Email Wajib Diisi',
        'email.email' => 'Silahkan Masukan Email Yang Valid',
        'email.unique' => 'Email yang anda masukan sudah terdaftar, masukan email yang lain',
        'password.required' => 'Password Wajib Diisi',
        'password.min' => 'Minimal Password yang di masukan 6 karakter'
       ]); 
       $data = [
        'name'=>$request->name,
        'email'=>$request->email,
        'role'=>$request->role,
        'password'=> Hash::make($request->password),
       ];
       User::create($data);
       $infologin = [
        'email' => $request->email,
        'role' => $request->role,
        'password' => $request->password,
       ];
       if (Auth::attempt($infologin)) {
        return redirect()->back()->with('success','Berhasil Melakukan Register Silahkan untuk login');
       } else {
        return redirect('register')->withErrors('Username Dan Password Yang di Masukan Tidak Valid');
       }
       
    }
}
