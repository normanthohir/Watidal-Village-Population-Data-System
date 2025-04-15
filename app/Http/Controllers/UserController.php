<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Menampilkan daftar user
    public function index(Request $request)
    {
        $search = $request->input('search');
        $users = User::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        })->paginate(10);

        return view('users.index', compact('users', 'search'));
    }

    // Menampilkan form untuk menambahkan user baru
    public function create()
    {
        return view('users.create');
    }

    // Menyimpan user baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'keterangan_user' => 'nullable|string',
            'status_user' => 'required|string',
            'desa_kelurahan_user' => 'nullable|string',
            'kecamatan_user' => 'nullable|string',
            'kabupaten_kota_user' => 'nullable|string',
            'provinsi_user' => 'nullable|string',
            'rt_user' => 'nullable|string',
            'rw_user' => 'nullable|string',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'username' => $request->username,
            'keterangan_user' => $request->keterangan_user,
            'status_user' => $request->status_user,
            'desa_kelurahan_user' => $request->desa_kelurahan_user,
            'kecamatan_user' => $request->kecamatan_user,
            'kabupaten_kota_user' => $request->kabupaten_kota_user,
            'provinsi_user' => $request->provinsi_user,
            'rt_user' => $request->rt_user,
            'rw_user' => $request->rw_user,
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
    }

    // Menampilkan detail user
    public function show(User $user, $id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'username' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'keterangan_user' => 'nullable|string',
            'status_user' => 'required|string|in:admin,rt,rw,user',
            'desa_kelurahan_user' => 'nullable|string',
            'kecamatan_user' => 'nullable|string',
            'kabupaten_kota_user' => 'nullable|string',
            'provinsi_user' => 'nullable|string',
            'rt_user' => 'nullable|string',
            'rw_user' => 'nullable|string',
        ]);

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->status_user = $request->status_user;
        $user->keterangan_user = $request->keterangan_user;
        $user->desa_kelurahan_user = $request->desa_kelurahan_user;
        $user->kecamatan_user = $request->kecamatan_user;
        $user->kabupaten_kota_user = $request->kabupaten_kota_user;
        $user->provinsi_user = $request->provinsi_user;
        $user->rt_user = $request->rt_user;
        $user->rw_user = $request->rw_user;

        $user->save();

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
    }

    // Menghapus user
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }
}
