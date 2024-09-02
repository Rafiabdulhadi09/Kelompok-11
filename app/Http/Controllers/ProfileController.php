<?php

namespace App\Http\Controllers;


use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    // public function index()
    // {
    //     return view('user.profil');
    // }   
    public function index()
    {
        $user = User::all();
        return view('user.profile', compact('user'));
    }
    public function edit()
    {
        $user = User::all();
        return view('user.editprofile', compact('user'));
    }
    

}

