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
            return response()->json([
                'status' => TRUE,
                'message' => array('Berhasil menampilkan detail'),
                'user' => $user
            ]);
        } else {
            return $this->error('Gagal menampilkan detail!');
        }
    }

    public function error($message)
    {
        return response()->json([
            'status' => FALSE,
            'message' => array($message),
        ]);
    }
}
