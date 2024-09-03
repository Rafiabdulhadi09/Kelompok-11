<?php
namespace App\Http\Controllers;

use index;
use App\Models\User;
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
        $users = User::where('role', 'user')->get();

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
            'email' => 'required|string|email|max:255',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.DataUser')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.DataUser')->with('success', 'User deleted successfully.');
    }
    public function trainer()
    {
        // Ambil data untuk role 'trainer'
        $trainers = User::where('role', 'trainer')->get();

        // Kirim data ke view
        return view('admin.DataTrainer', compact('trainers'));
    }
      public function edittrainer(User $user)
    {
        return view('admin.EditTrainer', compact('user'));
    }

      public function updatetrainer(Request $request, User $user)
    {

        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8', // Password tidak diwajibkan
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('admin.dataTrainer')->with('success', 'User updated successfully.');
    }

      public function destroytrainer(User $user)
    {
        $user->delete();
        return redirect()->route('admin.dataTrainer')->with('success', 'User deleted successfully.');
    }
}
