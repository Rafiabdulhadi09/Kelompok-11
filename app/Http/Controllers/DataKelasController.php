<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DataKelas;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DataKelasController extends Controller
{
    public function kursus()
    {
        $data = DataKelas::all();
        return view('kelas', compact('data'));
    }
    public function index()
    {
        // Mengambil semua data dari tabel items
        $items = DataKelas::with('trainers')->paginate(10);
        // Mengirim data ke view
        return view('admin.DataKelas', compact('items'));
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
        $request->validate([
        'title' => 'required',
        'price' => 'required',
        'image' => 'image|file|max:2048',
        'description' => 'required'
       ], [
        'title.required' => 'Title Wajib Diisi',
        'price.required' => 'Email Wajib Diisi',
        'description.required' => 'Description Wajib Diisi'
       ]); 
       
       $item = [
        'title'=>$request->title,
        'price'=>$request->price,
        'image'=>$request->image,
        'description'=>$request->description,
       ];
       if($request->file('image')) {
        $item['image'] = $request->file('image')->store('kursus-images');
       }
       DataKelas::create($item);
       $infokursus = [
        'title' => $request->title,
        'price' => $request->price,
        'image'=>$request->image,
        'description' => $request->description,
       ];
      if ($item) {
        // Berhasil menyimpan data
        return redirect('/admin/DataKelas')->with('success', 'Kursus Berhasil Di Tambahkan');
    } else {
        // Gagal menyimpan data
        return redirect()->back()->with('error', 'Failed to create new record');
    }
    }

    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display the specified resource.
     */
    public function show()
    {
       $data = DataKelas::whereDoesntHave('pembayaran', function ($query) {
        $query->where('user_id', auth()->id())->where('status', 'approved');
    })->get();

        return view('user.kelas', compact('data'));
    }
    
    public function editkursus($id)
    {
        $datakursus = DataKelas::findOrFail($id);
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
        return redirect()->route('datakelas')->with('success', 'Data kursus berhasil di edit');
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

    public function search(Request $request)
    {
        // Ambil query pencarian dari input form
        $query = $request->input('query');

        // Cari data kelas berdasarkan kolom yang relevan (misal: nama_kelas atau deskripsi)
        $data = DataKelas::where('title', 'like', '%' . $query . '%')
            ->orWhere('price', 'like', '%' . $query . '%')
            ->paginate(10);

        // Return hasil pencarian ke view 'admin.datakelas'
        return view('admin.datakelas', compact('data'));
    }
    public function AddTrainerForm()
    {
        $kelas = DataKelas::all();
        $trainers = User::where('role', 'trainer')->get();

        return view('admin.KelasTrainer', compact('kelas', 'trainers'));
    }
    public function addTrainerToClass(Request $request)
    {
        $validatedData = $request->validate([
            'kelas_id' => 'required|exists:data_kelas,id',
            'trainer_id' => 'required|exists:users,id',
        ]);

        $kelas = DataKelas::findOrFail($validatedData['kelas_id']);
        $trainer = User::where('id', $validatedData['trainer_id'])->where('role', 'trainer')->firstOrFail();

        // Cek apakah trainer sudah terhubung dengan kelas
        if ($kelas->trainers()->where('users.id', $trainer->id)->exists()) {
            return redirect()->back()->withErrors('Trainer ini sudah terhubung dengan kelas ini.');
        }

        // Attach trainer to class (assumes pivot table exists)
        $kelas->trainers()->attach($trainer->id);

        return redirect('/admin/DataKelas')->with('success', 'Trainer berhasil ditambahkan.');
    }

}



