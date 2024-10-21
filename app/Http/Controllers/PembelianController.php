<?php

namespace App\Http\Controllers;

use App\Models\DataKelas;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
public function approve($id) {
    $pembayaran = Pembayaran::findOrFail($id);
    $pembayaran->update(['status' => 'approved']);

    // Tambahkan logika untuk mengalihkan kelas ke halaman materi

    return back()->with('message', 'Pembayaran disetujui, kelas tersedia di halaman materi.');
}

public function reject($id) {
    $pembayaran = Pembayaran::findOrFail($id);
    $pembayaran->update(['status' => 'rejected']);

    return back()->with('message', 'Pembayaran ditolak.');
}

public function datapembelian(){
    $data = Pembayaran::with(['user', 'kelas']) ->get(['id', 'user_id', 'kelas_id', 'bukti_pembayaran', 'status', 'created_at']);
    $totalHarga = Pembayaran::where('status', 'approved')
        ->with('kelas')
        ->get()
        ->sum(function($pembelian) {
            return $pembelian->kelas ? $pembelian->kelas->price : 0;
        });
;

    return view('admin/DataPembelian', compact('data','totalHarga'));
}
public function pengguna()
{ 
    $siswa = Pembayaran::with('user')->where('status','approved');
    return view('trainer.penggunakelas', compact('siswa'));
}
}
