<?php
namespace App\Http\Controllers;

use App\Models\DataKelas;
use index;
use App\Models\User;
use App\Models\Trainer;
use setasign\Fpdi\Fpdi;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Menampilkan data user yang memiliki role 'user'.
     *
     * @return View
     */
    public function index(Request $request): View
{
    $query = $request->input('query');

    if ($query) {
        $users = User::where('role', 'user')
            ->where(function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%')
                ->orWhere('email', 'like', '%' . $query . '%');
            })
            ->paginate(10);
    } else {
        $users = User::where('role', 'user')->paginate(10); 
    }
    return view('admin.DataUser', compact('users'));
}

    public function edituser($id)
    {
        $pengguna = User::findOrFail($id);
        return view('admin.EditUser', compact('pengguna'));
    }

    public function updateuser(Request $request, $id)
    {
        $user = User::find($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ],[
            'name.required' => 'name wajib di isi',
            'email.required' => 'email wajib di isi',
        ]
    );
        $user->update($request->all()); 

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        if ($user) {
            return redirect()->route('admin.DataUser')->with('success', 'Berhasil Melakukan Register, Silahkan login.');
        } else {
            return redirect()->back()->withErrors('Username dan Password yang dimasukkan tidak valid.');
        }
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.DataUser')->with('success', 'User deleted successfully.');
    }
    public function trainer()
    {
        $trainers = User::where('role', 'trainer')->paginate(10);

        return view('admin.DataTrainer', compact('trainers'));
    }
      public function edittrainer($id)
    {
        $trainer = User::findOrFail($id);
        return view('admin.EditTrainer', compact('trainer'));
    }

      public function updatetrainer(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
        ],[
            'name.required' => 'name wajib di isi',
            'email.required' => 'email wajib di isi',
        ]
    );

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('admin.dataTrainer')->with('success', 'User updated successfully.');
    }

    public function destroytrainer(User $trainer)
    {
        $trainer->delete();
        return redirect()->route('admin.dataTrainer')->with('success', 'trainer deleted successfully.');
    }

    public function searchtrainer(Request $request)
    {
        // Ambil query pencarian dari input
        $query = $request->input('query');

        // Cari user dengan role "user" yang cocok dengan query
        $trainers = User::where('role', 'trainer')
            ->where(function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%')
                ->orWhere('email', 'like', '%' . $query . '%');
            })
            ->paginate(10);

        // Return ke view dengan hasil pencarian
        return view('admin.dataTrainer', compact('trainers'));
    }

    public function sertifikat($id){
        $kursus = DataKelas::find($id);
        $deskripsi = "Peserta telah mengikuti dan menyelesaikan semua materi, tugas, dengan baik, serta menunjukkan komitmen yang tinggi dalam proses pembelajaran di kelas " . $kursus->title;
        $nama = Auth::user()->name;

        $outputfile = public_path(). 'dcc.pdf';
        $this->fillPDF(public_path(). '/master/dcc.pdf',$outputfile,$nama, $deskripsi);
        
        return response()->file($outputfile);
    }
    public function fillPDF($file, $outputfile, $nama, $deskripsi)
{
    $fpdi = new FPDI;
    $fpdi->setSourceFile($file);
    $template = $fpdi->importPage(1);
    $size = $fpdi->getTemplateSize($template);

    // Tambahkan halaman dengan ukuran template
    $fpdi->AddPage($size['orientation'], [$size['width'], $size['height']]);
    $fpdi->useTemplate($template);

    // Tentukan posisi tengah secara horizontal (X tengah = lebar halaman / 2)
    $centerX = $size['width'] / 2;

    // Tambahkan nama pengguna di tengah
    $namaY = 100; // Koordinat Y untuk nama
    $fpdi->SetFont("times", "B", 30); // Bold untuk nama
    $fpdi->SetTextColor(0, 0, 0); // Warna hitam
    $fpdi->SetXY(0, $namaY); // Posisi awal (X diabaikan karena rata tengah)
    $fpdi->Cell(0, 10, $nama, 0, 0, 'C'); // Lebar otomatis, tanpa border, rata tengah ('C')

    // Tentukan posisi untuk deskripsi
    $deskripsiY = 110; // Koordinat Y untuk deskripsi
    $fpdi->SetFont("times", "", 16); // Font normal untuk deskripsi
    $fpdi->SetTextColor(50, 50, 50); // Warna abu-abu
    $fpdi->SetXY(20, $deskripsiY); // Posisi awal untuk deskripsi

    // Tentukan lebar teks yang tersedia dan tinggi baris
    $maxWidth = $size['width'] - 40; // Lebar teks yang tersedia
    $lineHeight = 10; // Tinggi baris untuk teks

    // Membatasi panjang baris pertama menjadi 100 karakter
    $maxFirstLineLength = 102; // Batas karakter untuk baris pertama
    $firstLine = substr($deskripsi, 0, $maxFirstLineLength);
    $remainingText = substr($deskripsi, $maxFirstLineLength);

    // Menentukan posisi X tengah untuk baris pertama
    $firstLineWidth = $fpdi->GetStringWidth($firstLine); // Lebar baris pertama
    $centerXFirstLine = ($size['width'] - $firstLineWidth) / 3; // Posisi X agar teks rata tengah

    // Tampilkan baris pertama dengan panjang terbatas dan rata tengah
    $fpdi->SetXY($centerXFirstLine, $deskripsiY); // Set posisi X untuk baris pertama
    $fpdi->MultiCell($maxWidth, $lineHeight, $firstLine, 0, 'C'); // Rata tengah

    // Tampilkan sisa teks setelah baris pertama
    if ($remainingText) {
        $fpdi->SetXY(20, $fpdi->GetY()); // Set posisi Y untuk sisa teks
        $fpdi->MultiCell($maxWidth, $lineHeight, $remainingText, 0, 'C'); // Rata tengah
    }

    // Menambahkan tempat dan tanggal di bawah deskripsi
    $tempat = "Bandung";
    $tanggal = date("d F Y"); // Format tanggal: hari bulan tahun

    // Tentukan posisi untuk tanggal
    $tanggalY = $fpdi->GetY(); // Posisi Y setelah tempat
    $fpdi->SetXY(115, $tanggalY); // Posisi untuk tanggal

    // Set warna teks
    $fpdi->SetTextColor(38, 53, 129); // Warna #263581

    // Menampilkan tempat dan tanggal dengan warna yang ditentukan
    $fpdi->Cell(0, 30, $tempat . ", " . $tanggal, 0, 1, 'L');

    // Simpan file PDF
    return $fpdi->Output($outputfile, 'F');
}
}