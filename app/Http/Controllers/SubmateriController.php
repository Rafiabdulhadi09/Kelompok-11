<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use App\Models\SubMateri;
use Illuminate\Http\Request;

class SubmateriController extends Controller
{
    //
    public function index()
    {
        $materi = Materi::all();
        return view('trainer.tambahsubmateri', compact('materi'));
    }
    public function create(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string',
            'materi_id' => 'required|integer|exists:materi,id',
            'text_content' => 'nullable|string',
            'video_link' => 'nullable|url',
            'ebook_file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Membuat objek submateri baru
        $subMateri = new SubMateri();
        $subMateri->title = $request->title;
        $subMateri->type = $request->type;
        $subMateri->materi_id = $request->materi_id;

        // Menyimpan konten berdasarkan tipe submateri
        if ($request->type == 'text') {
            $subMateri->content = $request->text_content;
        } elseif ($request->type == 'video') {
            $subMateri->content = $request->video_link;
        } elseif ($request->type == 'ebook' && $request->hasFile('ebook_file')) {
            $path = $request->file('ebook_file')->store('ebooks', 'public');
            $subMateri->content = $path;
        }

        // Menyimpan submateri ke database
        $subMateri->save();

        // Mengirimkan pesan sukses
        return redirect()->back()->with('success', 'Submateri berhasil ditambahkan!');
    }
    public function show(materi $materi)
    {
        $submateri = $materi->submateri;
        return view('trainer.sub_materi', ['submateri' => $submateri, 'materi' => $materi]);
    }
     public function submateri_admin(materi $apaaja)
    {
        $submateri = $apaaja->submateri;
        return view('admin.SubMateri', ['submateri' => $submateri, 'apaaja' => $apaaja]);
    }
}
