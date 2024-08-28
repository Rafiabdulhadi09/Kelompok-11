<?php
namespace App\Http\Controllers;

use index;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

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
    public function edit(User $user)
    {
        return view('admin.EditUser', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8|confirmed', // Password tidak diwajibkan
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.dataUser')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.DataUser')->with('success', 'User deleted successfully.');
    }
}
