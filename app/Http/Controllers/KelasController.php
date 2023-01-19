<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    public function index()
    {
        $kelases = Kelas::get();
        return view('kelas.index', compact('kelases'));
    }

    public function create()
    {
        $pendidiks = User::where('role', 'pendidik')->get();
        return view('kelas.create', compact('pendidiks'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'pendidik_id' => 'required',
        ], [
            'nama.required' => 'Nama kelas tidak boleh kosong!',
            'pendidik_id.required' => 'Pendidik harus dipilih!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('status', $error);
        }

        Kelas::create($request->all());

        return redirect('kelas')->with('status', 'Berhasil menambahkan Kelas');
    }

    public function edit($id)
    {
        $kelas = Kelas::where('id', $id)->first();
        $pendidiks = User::where('role', 'pendidik')->get();
        return view('kelas.edit', compact('kelas', 'pendidiks'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'pendidik_id' => 'required',
        ], [
            'nama.required' => 'Nama kelas tidak boleh kosong!',
            'pendidik_id.required' => 'Pendidik harus dipilih!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('status', $error);
        }

        Kelas::where('id', $id)->update([
            'nama' => $request->nama,
            'pendidik_id' => $request->pendidik_id,
        ]);

        return redirect('kelas')->with('status', 'Berhasil memperbarui Kelas');
    }

    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return back()->with('status', 'Berhasil menghapus Kelas');
    }
}
