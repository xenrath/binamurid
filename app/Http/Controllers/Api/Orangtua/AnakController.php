<?php

namespace App\Http\Controllers\Api\Orangtua;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AnakController extends Controller
{
    public function index()
    {
        $anaks = Anak::get();

        if ($anaks) {
            return $this->response(TRUE, array('Berhasil menampilkan data anak'), $anaks);
        } else {
            return $this->response(FALSE, array('Gagal menampilkan data anak!'));
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'panggilan' => 'required',
            'gender' => 'required|in:L,P',
            'lahir' => 'required',
            'foto' => 'required|image|mimes:png,jpg,jpeg',
            'orangtua_id' => 'required',
        ], [
            'nama.required' => 'Nama anak tidak boleh kosong!',
            'panggilan.required' => 'Panggilan tidak boleh kosong!',
            'gender.required' => 'Jenis kelamin harus dipilih!',
            'gender.in' => 'Jenis kelamin yang dimasukan salah!',
            'lahir.required' => 'Tanggal lahir harus ditambahkan!',
            'foto.required' => 'Foto harus ditambahkan!',
            'foto.image' => 'Foto yang ditambahkan salah!',
            'foto.mimes' => 'Foto yang ditambahkan salah!',
            'orangtua_id.required' => 'Orang tua tidak boleh kosong!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return $this->response(FALSE, $error);
        }

        $foto = str_replace(' ', '', $request->foto->getClientOriginalName());
        $namafoto = 'anak/' . date('mYdHs') . rand(1, 10) . '_' . $foto;
        $request->foto->storeAs('public/uploads/', $namafoto);

        $anak = Anak::create(array_merge($request->all(), [
            'foto' => $namafoto
        ]));

        if ($anak) {
            return $this->response(TRUE, array('Berhasil menambahkan data anak'));
        } else {
            return $this->response(FALSE, array('Gagal menambahkan data anak!'));
        }
    }

    public function show($id)
    {
        $anak = Anak::where('id', $id)->first();

        if ($anak) {
            return $this->response(TRUE, array('Berhasil menampilkan data anak'), array($anak));
        } else {
            return $this->response(FALSE, array('Gagal menampilkan data anak!'));
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'panggilan' => 'required',
            'gender' => 'required|in:L,P',
            'lahir' => 'required',
            'foto' => 'nullable|image|mimes:png,jpg,jpeg',
        ], [
            'nama.required' => 'Nama anak tidak boleh kosong!',
            'panggilan.required' => 'Panggilan tidak boleh kosong!',
            'gender.required' => 'Jenis kelamin harus dipilih!',
            'gender.in' => 'Jenis kelamin yang dimasukan salah!',
            'lahir.required' => 'Tanggal lahir harus ditambahkan!',
            'foto.image' => 'Foto yang ditambahkan salah!',
            'foto.mimes' => 'Foto yang ditambahkan salah!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return $this->response(FALSE, $error);
        }

        $data = Anak::where('id', $id)->first();

        if ($request->foto) {
            Storage::disk('local')->delete('public/uploads/' . $data->foto);
            $foto = str_replace(' ', '', $request->foto->getClientOriginalName());
            $namafoto = 'anak/' . date('mYdHs') . rand(1, 10) . '_' . $foto;
            $request->foto->storeAs('public/uploads/', $namafoto);
        } else {
            $namafoto = $data->foto;
        }

        $anak = Anak::where('id', $id)->update([
            'nama' => $request->nama,
            'panggilan' => $request->panggilan,
            'gender' => $request->gender,
            'lahir' => $request->lahir,
            'foto' => $namafoto
        ]);

        if ($anak) {
            return $this->response(TRUE, array('Berhasil memperbarui data anak'));
        } else {
            return $this->response(FALSE, array('Gagal memperbarui data anak!'));
        }
    }

    public function destroy($id)
    {
        $anak = Anak::where('id', $id)->first();

        if ($anak) {
            Storage::disk('local')->delete('public/uploads/' . $anak->foto);
            $anak->delete();
            return $this->response(TRUE, array('Berhasil menghapus data anak'));
        } else {
            return $this->response(FALSE, array('Gagal menghapus data anak!'));
        }
    }

    public function response($status, $message, $data = null)
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data
        ]);
    }
}
