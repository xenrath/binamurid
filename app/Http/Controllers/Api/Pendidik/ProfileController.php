<?php

namespace App\Http\Controllers\Api\Pendidik;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function detail($id)
    {
        $user = User::where([
            ['role', 'pendidik'],
            ['id', $id],
        ])->first();

        if ($user) {
            return $this->response(TRUE, array('Berhasil menampilkan data'), array($user));
        } else {
            return $this->response(FALSE, array('Gagal menampilkan data!'));
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
