<?php

namespace App\Http\Controllers\Api\Pendidik;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    public function list(Request $request)
    {
        $pendidik = $request->pendidik_id;
        $reports = Report::where('pendidik_id', $pendidik)->with('anak')->get();

        if (count($reports) > 0) {
            return $this->response(TRUE, array('Berhasil menampilkan data'), $reports);
        } else {
            return $this->response(FALSE, array('Gagal menampilkan data!'));
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mapel_id' => 'required',
            'pendidik_id' => 'required',
            'anak_id' => 'required',
            'tanggal' => 'required',
            'catatan' => 'required',
            'nilai' => 'required',
        ], [
            'mapel_id.required' => 'Mapel tidak boleh kosong!',
            'pendidik_id.required' => 'Pendidik tidak boleh kosong!',
            'anak_id.required' => 'Anak tidak boleh kosong!',
            'tanggal.required' => 'Tanggal lahir harus ditambahkan!',
            'catatan.required' => 'Catatan tidak boleh kosong!',
            'nilai.required' => 'Nilai tidak boleh kosong!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return $this->response(FALSE, $error);
        }

        // $foto = str_replace(' ', '', $request->foto->getClientOriginalName());
        // $namafoto = 'dailyreport/' . date('mYdHs') . rand(1, 10) . '_' . $foto;
        // $request->foto->storeAs('public/uploads/', $namafoto);

        $dailyreport = Report::create(array_merge($request->all(), [
            // 'foto' => $namafoto
        ]));

        if ($dailyreport) {
            return $this->response(TRUE, array('Berhasil menambahkan data'));
        } else {
            return $this->response(FALSE, array('Gagal menambahkan data!'));
        }
    }

    public function show($id)
    {
        $reports = Report::where('id', $id)->first();

        if ($reports) {
            return $this->response(TRUE, array('Berhasil menampilkan data daily report'), array($reports));
        } else {
            return $this->response(FALSE, array('Gagal menampilkan data daily report!'));
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'mapel_id' => 'required',
            'pendidik_id' => 'required',
            'anak_id' => 'required',
            'tanggal' => 'required',
            'catatan' => 'required',
            'nilai' => 'required',
        ], [
            'mapel_id.required' => 'Mapel tidak boleh kosong!',
            'pendidik_id.required' => 'Pendidik tidak boleh kosong!',
            'anak_id.required' => 'Anak tidak boleh kosong!',
            'tanggal.required' => 'Tanggal lahir harus ditambahkan!',
            'catatan.required' => 'Catatan tidak boleh kosong!',
            'nilai.required' => 'Nilai tidak boleh kosong!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return $this->response(FALSE, $error);
        }

        $data = Report::where('id', $id)->first();

        // if ($request->foto) {
        //     Storage::disk('local')->delete('public/uploads/' . $data->foto);
        //     $foto = str_replace(' ', '', $request->foto->getClientOriginalName());
        //     $namafoto = 'dailyreport/' . date('mYdHs') . rand(1, 10) . '_' . $foto;
        //     $request->foto->storeAs('public/uploads/', $namafoto);
        // } else {
        //     $namafoto = $data->foto;
        // }

        $reports = Report::where('id', $id)->update([
            'mapel_id' => $request->mapel_id,
            'pendidik_id' => $request->pendidik_id,
            'anak_id' => $request->anak_id,
            'tanggal' => $request->tanggal,
            'catatan' => $request->catatan,
            'nilai' => $request->nilai,
            // 'foto' => $namafoto
        ]);

        if ($reports) {
            return $this->response(TRUE, array('Berhasil memperbarui data daily report'));
        } else {
            return $this->response(FALSE, array('Gagal memperbarui data daily report!'));
        }
    }

    public function destroy($id)
    {
        $reports = Report::where('id', $id)->first();

        if ($reports) {
            Storage::disk('local')->delete('public/uploads/' . $reports->foto);
            $reports->delete();
            return $this->response(TRUE, array('Berhasil menghapus data daily report'));
        } else {
            return $this->response(FALSE, array('Gagal menghapus data daily report!'));
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
