<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pelajaran;
use App\Models\SubMateri;
use Illuminate\Http\Request;

class SubmateriController extends Controller
{
    //
    public function index()
    {
        $materi = Pelajaran::all();
        return view('trainer.tambahsubmateri', compact('materi'));
    }
      public function create(Request $request)
    {
         // Validasi data yang masuk
        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'content' => 'required',
        ]);
       

        $submateri = new SubMateri();
        $submateri->title = $request->title;
        $submateri->type = $request->type;
        $submateri->content = $request->content;
        $submateri->pelajaran_id = $request->pelajaran_id;
        $submateri->save();
            // Simpan submateri
            $submateri->save();

         if ($submateri) {
            return redirect()->back()->with('success', 'Trainer berhasil di tambahkan.');
        }else {
            return redirect()->back()->withErrors('Username dan Password yang dimasukkan tidak valid.');
        }
    }
    public function show(Pelajaran $pelajaran)
    {
        $submateri = $pelajaran->submateri;
        return view('trainer.sub_materi', ['submateri' => $submateri, 'pelajaran' => $pelajaran]);
    }
     public function submateri_admin(Pelajaran $apaaja)
    {
        $submateri = $apaaja->submateri;
        return view('admin.SubMateri', ['submateri' => $submateri, 'apaaja' => $apaaja]);
    }
}
