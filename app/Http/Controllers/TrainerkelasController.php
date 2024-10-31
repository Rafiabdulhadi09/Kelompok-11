<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KelasTrainer;
use Illuminate\Http\Request;

class TrainerkelasController extends Controller
{
    public function index($kelas_id)
    {
        $trainerkelas = KelasTrainer::with(['user', 'kelas'])->where('kelas_id', $kelas_id)->get();
        return view('admin.DataTrainerKelas', compact('trainerkelas'));
    }
    public function delete($id)
    {
        $trainerkelas = KelasTrainer::findOrFail($id);
        $trainerkelas->delete();
        return redirect()->back()->with('success', 'User deleted successfully.');
    }
}
