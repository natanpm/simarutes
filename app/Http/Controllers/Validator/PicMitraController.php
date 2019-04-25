<?php

namespace App\Http\Controllers\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PicMitra;
use Illuminate\Support\Facades\DB;
class PicMitraController extends Controller
{
    public function indexEditPic($id)
    {
        $mitra = PicMitra::where([
            ['id', $id],
            ['idPerusahaan', 1]
        ])->get()->first();

        if (!$mitra) {
            return redirect()->route('get-validatorLihatPicMitra')
                ->with([
                    'status' => 'danger',
                    'message' => 'Data Pic Mitra dengan ID tersebut tidak ditemukan.'
                ]);
        }

        return view('Validator/Mitra/editPicMitra', compact('mitra'));
    }

    public function lihatPic()
    {
        $picMitras = PicMitra::where([
            ['idPerusahaan', 1],
        ])->get();

        return view('Validator/Mitra/lihatPicMitra', compact('picMitras'));
    }

    public function editPic(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required',
            'nama' => 'required|min:1|max:30',
            'kontak' => 'required|min:1|max:30',
            'keterangan' => 'required|min:1|max:30'
        ], [
            'required' => ':Attribute tidak boleh kosong !',
            'min' => ':Attribute minimal :min karakter!',
            'max' => ':Attribute maksimal :max karakter!',
        ]);

        $pic = PicMitra::where([
            'id' => $request->id,
            'idPerusahaan' => 1,
        ])->get()->first();

        if (!$pic) {
            return redirect()->route('get-validatorLihatPicMitra')
                ->with([
                    'status' => 'danger',
                    'message' => 'Data Pic Mitra dengan ID tersebut tidak ditemukan.'
                ]);
        }

        $pic->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'kontak' => $request->kontak,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('get-validatorLihatPicMitra')
            ->with([
                'status' => 'success',
                'message' => 'Data Pic Mitra ' . $request->nama . ' berhasil diupdate.'
            ]);

    }

    public function hapusPic($id)
    {
        $pic = PicMitra::where([
            'id' => $id,
            'idPerusahaan' => 1
        ])->get()->first();

        if (!$pic) {
            return redirect()->route('get-validatorLihatPicMitra')
                ->with([
                    'status' => 'danger',
                    'message' => 'Data Pic Mitra dengan ID tersebut tidak ditemukan.'
                ]);
        }

        DB::table('picMitra')->where([
            ['id', $id]
        ])->delete();

        return redirect()->route('get-validatorLihatPicMitra')
            ->with([
                'status' => 'success',
                'message' => 'Nama ' . $pic->nama . ' berhasil dihapus !'
            ]);
    }

}
