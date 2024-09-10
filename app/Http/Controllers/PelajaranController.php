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
        Session::flash('type', $request->type);
        Session::flash('content', $request->content);
        $request->validate([
        'title' => 'required',
        'type' => 'required',
        'content' => 'required'
       ], [
        'title.required' => 'Title Wajib Diisi',
        'type.required' => 'Pilih Type',
        'content.required' => 'Content wajib diisi'
       ]); 
       $item = [
        'title'=>$request->title,
        'type'=>$request->type,
        'content'=>$request->content,
       ];
       Pelajaran::create($item);
      if ($item) {
        // Berhasil menyimpan data
        return redirect()->back()->with('success', 'Kursus Berhasil Di Tambahkan');
    } else {
        // Gagal menyimpan data
        return redirect()->back()->with('error', 'Failed to create new record');
    }
    }
}
