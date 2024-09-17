<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KelasMateriController extends Controller
{
    public function index (){
        return view ('user.kelasmateri');
    }

    public function materi (){
        return view ('user.materi');
    }
}
