<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class TrainerController extends Controller
{
    /**
     * Menampilkan data pengguna dengan role 'trainer'.
     *
     * @return View
     */
    public function index(): View
    {
        // Mengambil semua data user dengan role 'trainer'
        $trainers = User::where('role', 'trainer')->get();
        // dd($trainers);

        // Pastikan data dikirimkan ke view
        return view('admin.DataTrainer', compact('trainers'));
    }
}
