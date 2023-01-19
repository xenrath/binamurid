<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PendidikController extends Controller
{
    public function index()
    {
        $pendidiks = User::where('role', 'pendidik')->paginate(6);

        return view('pendidik.index', compact('pendidiks'));
    }

    public function create()
    {
        return view('pendidik.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|unique:users|email',
            'telp' => 'required|unique:users|min:10',
            'gender' => 'required',
            'alamat' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ], [
            'email.required' => 'Email tidak boleh kosong!',
            'email.unique' => 'Email sudah digunakan!',
            'email.email' => 'Email yang dimasukan salah!',
            'nama.required' => 'Nama pendidik tidak boleh kosong!',
            'telp.required' => 'Nomor telepon tidak boleh kosong!',
            'telp.min' => 'Nomor telepon yang dimasukan salah!',
            'gender.required' => 'Jenis kelamin harus dipilih!',
            'alamat.required' => 'Alamat tidak boleh kosong!',
            'foto.required' => 'Foto harus ditambahkan!',
            'foto.image' => 'Foto harus berformat jpeg, jpg, png!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('status', $error);
        }

        $foto = str_replace(' ', '', $request->foto->getClientOriginalName());
        $namafoto = 'user/' . date('mYdHs') . rand(1, 10) . '_' . $foto;
        $request->foto->storeAs('public/uploads/', $namafoto);

        User::create(array_merge($request->all(), [
            'password' => bcrypt('pendidik'),
            'role' => 'pendidik',
            'foto' => $namafoto,
        ]));

        return redirect('pendidik')->with('status', 'Berhasil menambahkan Pendidik');
    }

    public function show($id)
    {
        $pendidik = User::where('id', $id)->first();
        return view('pendidik.show', compact('pendidik'));
    }

    public function edit($id)
    {
        $pendidik = User::where('id', $id)->first();

        return view('pendidik.edit', compact('pendidik'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users,email,' . $id . '|email',
            'nama' => 'required',
            'telp' => 'required|unique:users,telp,' . $id . '|min:10',
            'gender' => 'required',
            'alamat' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ], [
            'email.required' => 'Email tidak boleh kosong!',
            'email.unique' => 'Email sudah digunakan!',
            'email.email' => 'Email yang dimasukan salah!',
            'nama.required' => 'Nama sopir tidak boleh kosong!',
            'telp.required' => 'Nomor telepon tidak boleh kosong!',
            'telp.min' => 'Nomor telepon yang dimasukan salah!',
            'gender.required' => 'Jenis kelamin harus dipilih!',
            'foto.image' => 'Foto harus berformat jpeg, jpg, png!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('status', $error);
        }

        $user = User::findOrFail($id);

        if ($request->foto) {
            Storage::disk('local')->delete('public/uploads/' . $user->foto);
            $foto = str_replace(' ', '', $request->foto->getClientOriginalName());
            $namafoto = 'user/' . date('mYdHs') . rand(1, 10) . '_' . $foto;
            $request->foto->storeAs('public/uploads/', $namafoto);
        } else {
            $namafoto = $user->foto;
        }

        User::where('id', $id)->update([
            'email' => $request->email,
            'nama' => $request->nama,
            'telp' => $request->telp,
            'gender' => $request->gender,
            'alamat' => $request->alamat,
            'foto' => $namafoto,
        ]);

        return redirect('pendidik')->with('status', 'Berhasil memperbarui Pendidik');
    }

    public function destroy($id)
    {
        $pendidik = User::findOrFail($id);

        Storage::disk('local')->delete('public/uploads/' . $pendidik->foto);
        $pendidik->delete();

        return back()->with('status', 'Berhasil menghapus Pendidik');
    }
}
