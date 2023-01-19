<?php

namespace App\Http\Controllers\Api\Pendidik;

use App\Http\Controllers\Controller;
use App\Models\Mapel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        $now = Carbon::now()->format('d M Y');
        $mapels = Mapel::whereDate('tanggal_awal', '>=', $now)->whereDate('tanggal_akhir', '<=', $now)->first();

        if ($mapels) {
            return $this->response(TRUE, array('Berhasil menampilkan data'), array($mapels));
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
