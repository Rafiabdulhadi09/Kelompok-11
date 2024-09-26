<?php

namespace App\Http\Controllers;

use App\Models\DataKelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KelasMateriController extends Controller
{
    public function index (){
        $kelas = DataKelas::paginate(10);
        return view ('user.kelasmateri', ['item' => $kelas]);
    }

    public function materi (){
        return view ('user.materi');
    }
}
