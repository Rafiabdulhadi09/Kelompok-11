<?php

namespace App\Http\Controllers;

use App\Models\DataKelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PembelianController extends Controller
{
    public function index($id)
    {
        $kelas = DataKelas::findOrFail($id);
        return view('user.payment', compact('kelas'));
    }
}
