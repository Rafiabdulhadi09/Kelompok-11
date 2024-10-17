<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kuis;
use App\Models\SubMateri;
use Illuminate\Http\Request;

class KuisController extends Controller
{
    public function tambah()
    {
        $data = SubMateri::all();
        return view('trainer.TambahKuis', compact('data'));
    }
    public function index()
    {
        $data = SubMateri::all();
        return view('user.kuis', compact('data'));
    }
    public function create(Request $request)
    {
          $request->validate([
        'pertanyaan' => 'required',
        'pilihan_1' => 'required',
        'pilihan_2' => 'required',
        'pilihan_3' => 'required',
        'jawaban' => 'required',
        'submateri_id' => 'required'
       ], [
        'pertanyaan.required' => 'pertanyaan Wajib Diisi',
        'pilihan_1.required' => 'pilihan Wajib Diisi',
        'pilihan_2.required' => 'pilihan Wajib Diisi',
        'pilihan_3.required' => 'pilihan Wajib Diisi',
        'jawaban.required' => 'jawaban Wajib Diisi',
        'submateri_id.required' => 'Pilih submateri',
       ]); 
       
       $item = [
        'pertanyaan'=>$request->pertanyaan,
        'pilihan_1'=>$request->pilihan_1,
        'pilihan_2'=>$request->pilihan_2,
        'pilihan_3'=>$request->pilihan_3,
        'jawaban'=>$request->jawaban,
        'submateri_id'=>$request->submateri_id,
       ];
       Kuis::create($item);
      if ($item) {
        // Berhasil menyimpan data
        return redirect('/admin/DataKelas')->with('success', 'Kursus Berhasil Di Tambahkan');
    } else {
        // Gagal menyimpan data
        return redirect()->back()->with('error', 'Failed to create new record');
    }
    }
}
