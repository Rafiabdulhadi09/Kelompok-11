<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DataKelas;
use App\Models\Pembayaran;
use App\Models\KelasTrainer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PembelianController extends Controller
{
       public function index($idKelas)
    {
        $kelas = DataKelas::with('materi')->findOrFail($idKelas);
        return view('user.payment', compact('kelas'));
    }
    public function pembayaran($id)
    {
        $kelas = DataKelas::findOrFail($id); 
        return view('user.payment', compact('kelas'));
    }
    public function BuktiPembayaran(Request $request)
{
    $request->validate([
        'bukti_pembayaran' => 'required|mimes:jpg,jpeg,png,pdf|max:2048',
    ]);

    $fileName = time() . '_' . $request->file('bukti_pembayaran')->getClientOriginalName();
    $filePath = $request->file('bukti_pembayaran')->storeAs('bukti_pembayaran', $fileName);

    // Simpan informasi transaksi ke database
    $pembayaran = new Pembayaran();
    $pembayaran->user_id = auth()->id();
    $pembayaran->kelas_id = $request->kelas_id;
    $pembayaran->bukti_pembayaran = $filePath;
    $pembayaran->status = 'pending'; // status awal "pending"
    $pembayaran->save();

    return redirect()->back()->with('success', 'Bukti pembayaran berhasil dikirim. Tunggu konfirmasi dari admin.');
}
public function approve($id) 
{
    $pembayaran = Pembayaran::findOrFail($id);
    $pembayaran->update(['status' => 'approved']);

    // Flash message session
    session()->flash('notifikasi', 'Pembayaran disetujui, kelas tersedia di halaman materi.');

    return back()->with('message', 'Pembayaran disetujui.');
}




public function reject($id)
{
    $pembayaran = Pembayaran::find($id);

    if ($pembayaran) {
        // Set status to rejected
        $pembayaran->status = 'rejected';
        $pembayaran->save();

        // Delete the record after rejecting
        $pembayaran->delete();
        
        return redirect()->back()->with('success', 'pembayaran berhasil ditolak dan dihapus.');
    }

    return redirect()->back()->with('error', 'pembayaran tidak ditemukan.');
}


public function datapembelian(){
    $data = Pembayaran::with(['user', 'kelas']) ->get(['id', 'user_id', 'kelas_id', 'bukti_pembayaran', 'status', 'created_at']);
    $totalHarga = Pembayaran::where('status', 'approved')
        ->with('kelas')
        ->get()
        ->sum(function($pembelian) {
            return $pembelian->kelas ? $pembelian->kelas->price : 0;
        });
    return view('admin/DataPembelian', compact('data','totalHarga'));
}
public function pengguna()
{ 
      $trainer = Auth::user();
      $kelas = KelasTrainer::where('user_id', $trainer->id)->get();
      $kelasIds = $kelas->pluck('id');
      $siswa = Pembayaran::whereIn('kelas_id', $kelasIds)
          ->where('status', 'approved')
          ->with('user')
          ->get();

    return view('trainer.penggunakelas', compact('siswa'));
}

public function filter(Request $request){
    $start_date =$request->start_date;
    $end_date =$request->end_date;

    $data = Pembayaran::with(['user', 'kelas'])
    ->where('created_at', '>=', $start_date)
    ->where('created_at', '<=', $end_date)
    ->get();

    return view('admin.DataPembelian',compact('data'));
    
}
}
