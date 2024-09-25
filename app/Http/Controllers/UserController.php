<?php
namespace App\Http\Controllers;

use index;
use App\Models\User;
use App\Models\Trainer;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Menampilkan data user yang memiliki role 'user'.
     *
     * @return View
     */
    public function index(): View
    {
        // Mengambil semua data user dengan role 'user'
        $users = User::where('role', 'user')->paginate(10);

        // Mengirimkan data ke view
        return view('admin.DataUser', compact('users'));
    }
    public function edituser(User $user)
    {
        return view('admin.EditUser', compact('user'));
    }

    public function updateuser(Request $request, User $user)
    {

        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
        ],[
            'name.required' => 'name wajib di isi',
            'email.required' => 'email wajib di isi',
            'email.unique' => 'email yang anda masukan sudah ada',
        ]
    
    );

        $user->update($request->all());

        $user->name = $request->name;
        $user->email = $request->email;

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
        // Ambil data untuk role 'trainer'
        $trainers = User::where('role', 'trainer')->paginate(10);

        // Kirim data ke view
        return view('admin.DataTrainer', compact('trainers'));
    }
      public function edittrainer(User $user)
    {
        return view('admin.EditTrainer', compact('user'));
    }

      public function updatetrainer(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
        ],[
            'name.required' => 'name wajib di isi',
            'email.required' => 'email wajib di isi',
            'email.unique' => 'email yang anda masukan sudah ada',
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

    public function search(Request $request)
    {
        // Ambil query pencarian dari input
        $query = $request->input('query');

        // Cari user dengan role "user" yang cocok dengan query
        $users = User::where('role', 'user')
            ->where(function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%')
                  ->orWhere('email', 'like', '%' . $query . '%');
            })
            ->get();

        // Return ke view dengan hasil pencarian
        return view('admin.dataUser', compact('users'));
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
            ->get();

        // Return ke view dengan hasil pencarian
        return view('admin.dataTrainer', compact('trainers'));
    }
    
}