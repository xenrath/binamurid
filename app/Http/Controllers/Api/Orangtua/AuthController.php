<?php

namespace App\Http\Controllers\Api\Orangtua;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Nomor telepon tidak boleh kosong!',
            'password.required' => 'Password tidak boleh kosong!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return $this->response(FALSE, $error);
        }

        $email = $request->email;
        $password = $request->password;

        $user = User::where([
            ['email', $email],
            ['role', 'orangtua']
        ])->first();
        if ($user) {
            if (password_verify($password, $user->password)) {
                return $this->response(TRUE, array('Berhasil login, Selamat Datang ' . $user->name), array($user));
            } else {
                return $this->response(FALSE, array('Email atau password tidak sesuai!'));
            }
        } else {
            return $this->response(FALSE, array('Pengguna tidak ditemukan!'));
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users|email',
            'nama' => 'required',
            'telp' => 'required|unique:users|min:10',
            'gender' => 'required|in:L,P',
            'password' => 'required|min:8|confirmed',
            'alamat' => 'required'
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
            'password.required' => 'Password tidak boleh kosong!',
            'password.min' => 'Password minimal 8 karakter!',
            'password.confirmed' => 'Konfirmasi password tidak sesuai!',
            'alamat.required' => 'Alamat tidak boleh kosong!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return $this->response(FALSE, $error);
        }

        $user = User::create(array_merge($request->all(), [
            'password' => bcrypt($request->password),
            'role' => 'orangtua'
        ]));

        if ($user) {
            return $this->response(TRUE, array('Berhasil melakukan pendaftaran'), array($user));
        } else {
            return $this->response(FALSE, 'Pendaftaran gagal, ' + $validator->errors()->all()[0]);
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
