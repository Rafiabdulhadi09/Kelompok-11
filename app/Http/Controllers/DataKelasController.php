<?php

namespace App\Http\Controllers;

use App\Models\DataKelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DataKelasController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel items
        $data = DataKelas::all();
        // Mengirim data ke view
        return view('admin.DataKelas', compact('data'));
    }
    public function kelas()
    {
        return view ('admin/CreateKelas');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        Session::flash('title', $request->title);
        Session::flash('price', $request->price);
        Session::flash('description', $request->description);
        $request->validate([
        'title' => 'required',
        'price' => 'required',
        'description' => 'required'
       ], [
        'title.required' => 'Title Wajib Diisi',
        'price.required' => 'Email Wajib Diisi',
        'description.required' => 'Description Wajib Diisi'
       ]); 
       $item = [
        'title'=>$request->title,
        'price'=>$request->price,
        'description'=>$request->description,
       ];
       DataKelas::create($item);
       $infokursus = [
        'title' => $request->title,
        'price' => $request->price,
        'description' => $request->description,
       ];
      if ($item) {
        // Berhasil menyimpan data
        return redirect()->back()->with('success', 'Kursus Berhasil Di Tambahkan');
    } else {
        // Gagal menyimpan data
        return redirect()->back()->with('error', 'Failed to create new record');
    }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
          // Mengambil semua data dari tabel items
        $data = DataKelas::all();
        // Mengirim data ke view
        return view('user.kelas', compact('data'));
    }
    public function editkursus($id)
    {
        // Mengambil semua data dari tabel items
        $datakursus = DataKelas::findOrFail($id);
        // Mengirim data ke view
        return view('admin.EditKursus', compact('datakursus'));
    }
    
    public function updatekursus(Request $request, $id)
    {
        $datakursus = DataKelas::findOrFail($id);

        $request->validate([
            'title'=>'required',
            'price'=>'required',
            'description'=>'required'
        ]);
        $datakursus->update([
            'title'=> $request->title,
            'price'=> $request->price,
            'description'=> $request->description
        ]);
        return redirect()->back()->with('success', 'Data kursus berhasil di edit');
    }

      public function destroykursus($id)
    {
        $datakursus = DataKelas::findOrFail($id);
        $datakursus->delete();
        return redirect()->back()->with('success', 'User deleted successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function Trainer()
    {
          // Mengambil semua data dari tabel items
        $items = DataKelas::all();
        // Mengirim data ke view
        return view('trainer.tambahmateri', compact('items'));
    }
}

 

