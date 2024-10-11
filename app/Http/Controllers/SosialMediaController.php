<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MediaSosial;

class SosialMediaController extends Controller
{
    function sosialmedia()
    {
        $sosialmedia = MediaSosial::all();
        return view('welcome', compact('sosialmedia'));
    } 

}
