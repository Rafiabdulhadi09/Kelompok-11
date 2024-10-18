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
    public function index($id)
    {
        $data = SubMateri::with('kuis')->findOrFail($id);
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
        return redirect('/tambah/kuis')->with('success', 'Kursus Berhasil Di Tambahkan');
    } else {
        // Gagal menyimpan data
        return redirect()->back()->with('error', 'Failed to create new record');
    }
    }
    public function submit(Request $request)
    {
                $questions = $request->input('pertanyaan', []);

        if (count($questions) === 0) {
            return redirect()->back()->with('message', 'No questions were answered.');
        }

        $correctAnswers = 0;
        $totalQuestions = count($questions);

        foreach ($questions as $kuis_id => $jawaban) {
            $kuis = Kuis::find($kuis_id);

            if ($kuis && $jawaban === $kuis->jawaban) {
                $correctAnswers++;
            }
        }

        $score = ($totalQuestions > 0) ? ($correctAnswers / $totalQuestions) * 100 : 0;

        return redirect()->back()->with('message', "Your score is: $score%");
    }
}

