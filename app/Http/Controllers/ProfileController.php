<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function showProfile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }
    public function edit()
    {
    $user = Auth::user();
    return view('edit-profile', compact('user'));
    }

}

