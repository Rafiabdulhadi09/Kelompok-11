<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MediaSosial;

class SosialMediaController extends Controller
{
    function sosialmedia()
    {
        $sosialmedia = MediaSosial::all();
        return view('welcome', compact('sosialmedia'));
    } 
    
    public function index($id)
    {
        $sosialmedia = MediaSosial::findOrFail($id);
        return view('admin.setting', compact('sosialmedia'));
    }
    public function update(Request $request, $id)
    {
        $datakursus = DataKelas::findOrFail($id);

        $request->validate([
            'x'=>'required',
            'instagram'=>'required',
            'youtube'=>'required'
        ]);
        $datakursus->update([
            'x'=> $request->x,
            'instagram'=> $request->instagram,
            'youtube'=> $request->youtube
        ]);
        return redirect()->back()->with('success', 'Data kursus berhasil di edit');
    }

}
