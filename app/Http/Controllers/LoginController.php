<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index()
    {
        return view('login');
    }
    function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'Email Wajib Diisi',
            'password.required'=>'Password Wajib Diisi'
        ]);
        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if(Auth::attempt($infologin)){
            if(Auth::user()->role == 'trainer'){
                return redirect('trainer');
            }elseif(Auth::user()->role == 'admin'){
                return redirect('admin');
            }elseif(Auth::user()->role == 'student'){
                return redirect('student');
            }
        }else{
            return redirect('/login')->withErrors('Username dan password yang anda masukan tidak sesuai')->withInput();
        }
    }
    function logout(){
        Auth::logout();
        return redirect('');
    }
}
