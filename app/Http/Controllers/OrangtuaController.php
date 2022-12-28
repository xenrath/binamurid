<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class OrangtuaController extends Controller
{
    public function index()
    {
        $orangtuas = User::where('role', 'orangtua')->paginate(10);

        return view('orangtua.index', compact('orangtuas'));
    }

    public function create()
    {
        return view('orangtua.create');
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
            'nama.required' => 'Nama orangtua tidak boleh kosong!',
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
            'password' => bcrypt('orangtua'),
            'role' => 'orangtua',
            'foto' => $namafoto,
        ]));

        return redirect('orangtua')->with('status', 'Berhasil menambahkan orangtua');
    }

    public function show($id)
    {
        $orangtua = User::where('id', $id)->first();
        return view('orangtua.show', compact('orangtua'));
    }

    public function edit($id)
    {
        $orangtua = User::where('id', $id)->first();

        return view('orangtua.edit', compact('orangtua'));
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

        return redirect('orangtua')->with('status', 'Berhasil memperbarui orangtua');
    }

    public function destroy($id)
    {
        $orangtua = User::findOrFail($id);

        Storage::disk('local')->delete('public/uploads/' . $orangtua->foto);
        $orangtua->delete();

        return back()->with('status', 'Berhasil menghapus orangtua');
    }
}
