<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AnakController extends Controller
{
    public function index()
    {
        $anaks = Anak::paginate(6);

        return view('anak.index', compact('anaks'));
    }

    public function create()
    {
        $orangtuas = User::where('role', 'orangtua')->get();
        return view('anak.create', compact('orangtuas'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'panggilan' => 'required',
            'gender' => 'required|in:L,P',
            'lahir' => 'required',
            'orangtua_id' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ], [
            'nama.required' => 'Nama anak tidak boleh kosong!',
            'panggilan.required' => 'Panggilan tidak boleh kosong!',
            'gender.required' => 'Jenis kelamin harus dipilih!',
            'gender.in' => 'Jenis kelamin yang dimasukan salah!',
            'lahir.required' => 'Tanggal lahir harus dipilih!',
            'orangtua_id.required' => 'Orang tua harus dipilih!',
            'foto.required' => 'Foto harus ditambahkan!',
            'foto.image' => 'Foto harus berformat jpeg, jpg, png!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('status', $error);
        }

        $foto = str_replace(' ', '', $request->foto->getClientOriginalName());
        $namafoto = 'anak/' . date('mYdHs') . rand(1, 10) . '_' . $foto;
        $request->foto->storeAs('public/uploads/', $namafoto);

        Anak::create(array_merge($request->all(), [
            'foto' => $namafoto,
        ]));

        return redirect('anak')->with('status', 'Berhasil menambahkan Anak');
    }

    public function show($id)
    {
        $anak = Anak::where('id', $id)->first();
        return view('anak.show', compact('anak'));
    }

    public function edit($id)
    {
        $anak = Anak::where('id', $id)->first();
        $orangtuas = User::where('role', 'orangtua')->get();

        return view('anak.edit', compact('anak', 'orangtuas'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'panggilan' => 'required',
            'gender' => 'required|in:L,P',
            'lahir' => 'required',
            'orangtua_id' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ], [
            'nama.required' => 'Nama anak tidak boleh kosong!',
            'panggilan.required' => 'Panggilan tidak boleh kosong!',
            'gender.required' => 'Jenis kelamin harus dipilih!',
            'gender.in' => 'Jenis kelamin yang dimasukan salah!',
            'lahir.required' => 'Tanggal lahir harus dipilih!',
            'orangtua_id.required' => 'Orang tua harus dipilih!',
            'foto.image' => 'Foto harus berformat jpeg, jpg, png!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('status', $error);
        }

        $anak = Anak::findOrFail($id);

        if ($request->foto) {
            Storage::disk('local')->delete('public/uploads/' . $anak->foto);
            $foto = str_replace(' ', '', $request->foto->getClientOriginalName());
            $namafoto = 'anak/' . date('mYdHs') . rand(1, 10) . '_' . $foto;
            $request->foto->storeAs('public/uploads/', $namafoto);
        } else {
            $namafoto = $anak->foto;
        }

        Anak::where('id', $id)->update([
            'nama' => $request->nama,
            'panggilan' => $request->panggilan,
            'gender' => $request->gender,
            'lahir' => $request->lahir,
            'orangtua_id' => $request->orangtua_id,
            'foto' => $namafoto,
        ]);

        return redirect('anak')->with('status', 'Berhasil memperbarui Anak');
    }

    public function destroy($id)
    {
        $anak = Anak::findOrFail($id);

        Storage::disk('local')->delete('public/uploads/' . $anak->foto);
        $anak->delete();

        return back()->with('status', 'Berhasil menghapus Anak');
    }
}
