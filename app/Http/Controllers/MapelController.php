<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MapelController extends Controller
{
    public function index()
    {
        $mapels = Mapel::paginate(6);
        return view('mapel.index', compact('mapels'));
    }

    public function create()
    {
        return view('mapel.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'keterangan' => 'required',
            'waktu' => 'required',
        ], [
            'nama.required' => 'Nama mapel tidak boleh kosong!',
            'keterangan.required' => 'Keterangan tidak boleh kosong!',
            'waktu.required' => 'Waktu harus ditambahkan!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('status', $error);
        }

        $tanggal_awal = substr($request->waktu, 0, 12);
        $tanggal_akhir = substr($request->waktu, -12);

        Mapel::create(array_merge($request->all(), [
            'tanggal_awal' => $tanggal_awal,
            'tanggal_akhir' => $tanggal_akhir,
        ]));

        return redirect('mapel')->with('status', 'Berhasil menambahkan Mapel');
    }

    public function edit($id)
    {
        $mapel = Mapel::where('id', $id)->first();
        $waktu = $mapel->tanggal_awal . ' to ' . $mapel->tanggal_akhir;

        return view('mapel.edit', compact('mapel', 'waktu'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'keterangan' => 'required',
            'waktu' => 'required',
        ], [
            'nama.required' => 'Nama mapel tidak boleh kosong!',
            'keterangan.required' => 'Keterangan tidak boleh kosong!',
            'waktu.required' => 'Waktu harus ditambahkan!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('status', $error);
        }

        $tanggal_awal = substr($request->waktu, 0, 12);
        $tanggal_akhir = substr($request->waktu, -12);

        Mapel::where('id', $id)->update([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'tanggal_awal' => $tanggal_awal,
            'tanggal_akhir' => $tanggal_akhir,
        ]);

        return redirect('mapel')->with('status', 'Berhasil memperbarui Mapel');
    }

    public function destroy($id)
    {
        $mapel = Mapel::findOrFail($id);
        $mapel->delete();

        return back()->with('status', 'Berhasil menghapus Mapel');
    }
}
