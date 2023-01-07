<?php

namespace App\Http\Controllers\Api\Orangtua;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function detail($id)
    {
        $user = User::where([
            ['role', 'orangtua'],
            ['id', $id],
        ])->first();

        if ($user) {
            return $this->response(TRUE, array('Berhasil melakukan pendaftaran'), array($user));
        } else {
            return $this->response(FALSE, array('Gagal menampilkan detail!'));
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
