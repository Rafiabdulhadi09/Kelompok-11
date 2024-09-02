<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pelajaran;
use Illuminate\Support\Facades\Session;

class PelajaranController extends Controller
{
    public function index()
    {
        return view ('trainer.createmateri');
    }
    public function create(Request $request)
    {
        Session::flash('title', $request->title);
        Session::flash('video', $request->video);
        Session::flash('file', $request->file);
        $request->validate([
        'title' => 'required',
        'video' => 'required',
        'file' => 'required'
       ], [
        'title.required' => 'Title Wajib Diisi',
        'video.required' => 'Email Wajib Diisi',
        'file.required' => 'Description Wajib Diisi'
       ]); 
       $item = [
        'title'=>$request->title,
        'video'=>$request->video,
        'file'=>$request->file,
       ];
       Pelajaran::create($item);
       $infokursus = [
        'title' => $request->title,
        'video' => $request->video,
        'file' => $request->file,
       ];
      if ($item) {
        // Berhasil menyimpan data
        return redirect()->back()->with('success', 'Kursus Berhasil Di Tambahkan');
    } else {
        // Gagal menyimpan data
        return redirect()->back()->with('error', 'Failed to create new record');
    }
    }
}
