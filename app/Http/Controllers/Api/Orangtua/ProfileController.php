<?php

namespace App\Http\Controllers\Api\Orangtua;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function detail($id)
    {
        $user = User::where([
            ['role', 'orangtua'],
            ['id', $id],
        ])->first();

        if ($user) {
            return $this->response(TRUE, array('Berhasil menampilkan data'), array($user));
        } else {
            return $this->response(FALSE, array('Gagal menampilkan detail!'));
        }
    }

    public function update(Request $request, $id)
    {
        $data = User::where('id', $id)->first();

        if ($data->foto) {
            $validator = Validator::make($request->all(), [
                'email' => 'required|unique:users|email',
                'nama' => 'required',
                'telp' => 'required|unique:users|min:10',
                'gender' => 'required|in:L,P',
                'alamat' => 'required',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png'
            ], [
                'email.required' => 'Email tidak boleh kosong!',
                'email.unique' => 'Email sudah digunakan!',
                'email.email' => 'Email yang dimasukan salah!',
                'nama.required' => 'Nama tidak boleh kosong!',
                'telp.required' => 'Nomor telepon tidak boleh kosong!',
                'telp.unique' => 'Nomor telepon sudah digunakan!',
                'telp.min' => 'Nomor telepon yang dimasukan salah!',
                'gender.required' => 'Jenis kelamin harus dipilih!',
                'gender.in' => 'Jenis kelamin yang dimasukan salah!',
                'alamat.required' => 'Alamat tidak boleh kosong!',
                'foto.image' => 'Foto yang dimasukan salah!',
                'foto.mimes' => 'Foto yang dimasukan salah!',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'email' => 'required|unique:users|email',
                'nama' => 'required',
                'telp' => 'required|unique:users|min:10',
                'gender' => 'required|in:L,P',
                'alamat' => 'required',
                'foto' => 'required|image|mimes:jpg,jpeg,png'
            ], [
                'email.required' => 'Email tidak boleh kosong!',
                'email.unique' => 'Email sudah digunakan!',
                'email.email' => 'Email yang dimasukan salah!',
                'nama.required' => 'Nama tidak boleh kosong!',
                'telp.required' => 'Nomor telepon tidak boleh kosong!',
                'telp.unique' => 'Nomor telepon sudah digunakan!',
                'telp.min' => 'Nomor telepon yang dimasukan salah!',
                'gender.required' => 'Jenis kelamin harus dipilih!',
                'gender.in' => 'Jenis kelamin yang dimasukan salah!',
                'alamat.required' => 'Alamat tidak boleh kosong!',
                'foto.required' => 'Foto harus ditambahkan!',
                'foto.image' => 'Foto yang dimasukan salah!',
                'foto.mimes' => 'Foto yang dimasukan salah!',
            ]);
        }

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return $this->response(FALSE, $error);
        }

        if ($request->foto) {
            Storage::disk('local')->delete('public/uploads/' . $data->foto);
            $foto = str_replace(' ', '', $request->foto->getClientOriginalName());
            $namafoto = 'orangtua/' . date('mYdHs') . rand(1, 10) . '_' . $foto;
            $request->foto->storeAs('public/uploads/', $namafoto);
        } else {
            $namafoto = $data->foto;
        }

        $update = User::where('id', $id)->update([
            'email' => $request->email,
            'nama' => $request->nama,
            'telp' => $request->telp,
            'gender' => $request->gender,
            'alamat' => $request->alamat,
            'foto' => $namafoto,
        ]);

        if ($update) {
            return $this->response(TRUE, array('Berhasil memperbarui Profile'));
        } else {
            return $this->response(FALSE, array('Gagal memperbarui Profile'));
        }
    }

    public function password(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:8|confirmed',
        ], [
            'password.required' => 'Password tidak boleh kosong!',
            'password.min' => 'Password minimal 8 karakter!',
            'password.confirmed' => 'Konfirmasi password tidak sesuai!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return $this->response(FALSE, $error);
        }

        $update = User::where('id', $id)->update([
            'password' => bcrypt($request->password)
        ]);

        if ($update) {
            return $this->response(TRUE, array('Berhasil memperbarui Password'));
        } else {
            return $this->response(FALSE, array('Gagal memperbarui Password'));
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
