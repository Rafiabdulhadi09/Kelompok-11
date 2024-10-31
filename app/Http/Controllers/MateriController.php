<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Materi;
use App\Models\DataKelas;
use App\Models\SubMateri;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class MateriController extends Controller
{
    public function index()
    {
        // Mengambil kelas berdasarkan ID
    $kelas = auth()->user()->trainerKelas;
    // Mengirim data kelas ke view
    return view('trainer.createmateri', compact('kelas'));
    }
    public function create(Request $request)
    {
         // Validasi data yang masuk
        $request->validate([
            'judul' => 'required',
            'description' => 'required',
        ]);
        $materi = new Materi();
        $materi->title = $request->judul;
        $materi->content = $request->description;
        $materi->kelas_id = $request->kelas_id; // Pastikan ini ada!
        $materi->save();
            // Simpan materi
            $materi->save();

        if ($materi) {
            return redirect()->back()->with('success', 'Trainer berhasil di tambahkan.');
        }else {
            return redirect()->back()->withErrors('Username dan Password yang dimasukkan tidak valid.');
        }
    }
    public function materi(DataKelas $kelas){
        $materi = $kelas->materi;
        $trainer = User::findOrFail(auth()->user()->id);
        return view('trainer.materi', ['kelas' => $kelas, 'materi' => $materi, 'trainer'=>$trainer]);
    }
    public function destroy($id)
    {
        $materi = Materi::findOrFail($id);
        $materi->delete();

        return redirect()->back()->with('success','Materi Berhasil di Hapus');
    }
    public function edit($id)
    {
        $materi = Materi::findOrFail($id);
        return view('trainer.edit_materi', compact('materi'));
    }
    public function update(Request $request, $id)
    {
        $materi = Materi::findOrFail($id);

        $request->validate([
            'kelas_id'=>'required',
            'judul'=>'required',
            'description'=>'required'
        ]);
        $materi->update([
            'kelas_id'=> $request->kelas_id,
            'title'=> $request->judul,
            'content'=> $request->description
        ]);
        return redirect()->back()->with('success', 'Data kursus berhasil di edit');
    }
    public function materiadmin(DataKelas $kelas)
    {
        $materi = $kelas->materi;
        $user = Auth::user();

        return view('admin.materi',compact('user'), ['kelas' => $kelas, 'materi' => $materi]);
    }    
    public function searchkelas(Request $request)
{
    $trainer = User::findOrFail(auth()->user()->id);
    // Ambil query pencarian dari input form
    $query = $request->input('query');

    // Cari data kelas berdasarkan kolom yang relevan (misal: title atau description)
    $kelas = DataKelas::where('title', 'like', '%' . $query . '%')
        ->orWhere('price', 'like', '%' . $query . '%')
        ->paginate(10);

    // Return hasil pencarian ke view 'trainer.tambahmateri'
    return view('trainer.tambahmateri', compact('kelas', 'trainer','kelas_id'));
}

        public function Trainer()
    {
            $trainer = User::findOrFail(auth()->user()->id);

            $kelas = $trainer->kelas;

        return view('trainer.tambahmateri', compact('kelas','trainer',));
    }

    public function destroysub($id)
    {
        $submateri = SubMateri::findOrFail($id);
        $submateri->delete();

        return redirect()->back()->with('success','Materi Berhasil di Hapus');
    }

    public function editsub($id)
    {
        $submateri = SubMateri::findOrFail($id);
        return view('trainer.edit_submateri', compact('submateri'));
    }

    public function updatesub(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string',
            'text_content' => 'nullable|string',
            'video_link' => 'nullable|url',
            'ebook_file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Mengambil data submateri berdasarkan ID
        $subMateri = SubMateri::findOrFail($id);

        // Mengupdate data submateri selain materi_id
        $subMateri->title = $request->title;
        $subMateri->type = $request->type;

        // Mengupdate konten berdasarkan tipe submateri
        if ($request->type == 'text') {
            $subMateri->content = $request->text_content;
        } elseif ($request->type == 'video') {
            $subMateri->content = $request->video_link;
        } elseif ($request->type == 'ebook' && $request->hasFile('ebook_file')) {
            // Hapus file lama jika ada file baru di-upload
            if ($subMateri->content && Storage::disk('public')->exists($subMateri->content)) {
                Storage::disk('public')->delete($subMateri->content);
            }

            // Upload file baru
            $path = $request->file('ebook_file')->store('ebooks', 'public');
            $subMateri->content = $path;
        }

        // Menyimpan perubahan ke database
        $subMateri->save();

        // Mengirimkan pesan sukses
        return redirect()->back()->with('success', 'Submateri berhasil diperbarui!');
    }


    
}
