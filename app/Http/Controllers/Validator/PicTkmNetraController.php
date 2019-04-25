<?php

namespace App\Http\Controllers\Validator;

use App\Http\Controllers\Controller;
use App\UnitPerusahaan;
use Illuminate\Http\Request;
use App\PicMitra;
use Illuminate\Support\Facades\DB;
class PicTkmNetraController extends Controller
{
    public function indexPic()
    {
        return view('Validator/TkmNetra/buatPicTkmNetra');
    }

    public function indexEditPic($id)
    {

        $pic = PicMitra::where([
            'id' => $id,
            'idPerusahaan' =>4
        ])->get()->first();

        if (!$pic) {
            return redirect()->route('get-validatorLihatPicTkmNetra')
                ->with([
                    'status' => 'danger',
                    'message' => 'Data PIC TKM NETRA dengan ID tersebut tidak ditemukan.'
                ]);
        }
        return view('Validator/TkmNetra/editPicTkmNetra', compact('pic'));
    }

    public function buatPic(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required|numeric',
            'nama' => 'required|min:1|max:30',
            'kontak' => 'required|min:1|max:30',
        ], [
            'required' => ':Attribute tidak boleh kosong !',
            'min' => ':Attribute minimal :min karakter!',
            'max' => ':Attribute maksimal :max karakter!',
            'numeric' => ':Attribut harus berupa angka!'
        ]);

        $checkPic = DB::table('picMitra')->where([
            ['nik', $request['nik']],
            ['idPerusahaan', 4]
        ])->get()->count();

        if ($checkPic != 0) {
            return redirect()->route('get-validatorBuatPicTkmNetra')
                ->with([
                    'status' => 'danger',
                    'message' => 'NIK ' . $request->nik . ' sudah ada terdaftar!'
                ])->withInput();
        }

        picMitra::create([
            'nik' => $request->nik,
            'nama' => $request->input('nama'),
            'kontak' => $request->input('kontak'),
            'keterangan' => '-',
            'statusNda' => 0,
            'idPerusahaan' => 4,
            'idUnitPerusahaan' => 35
        ]);

        return redirect()->route('get-validatorBuatPicTkmNetra')
            ->with([
                'status' => 'success',
                'message' => 'PIC TKM NETRA dengan nama ' . $request->nama . ' berhasil didaftarkan!'
            ]);
    }

    public function lihatPic()
    {
        $picTkmNetra = PicMitra::where([
            ['idPerusahaan', 4],
        ])->get();

        return view('Validator/TkmNetra/lihatPicTkmNetra', compact('picTkmNetra'));
    }


    public function hapusPic($id)
    {
        $pic = PicMitra::where([
            'id' => $id,
            'idPerusahaan' => 4
        ])->get()->first();

        if (!$pic) {
            return redirect()->route('get-validatorLihatPicTkmNetra')
                ->with([
                    'status' => 'danger',
                    'message' => 'Data PIC TKM NETRA dengan ID tersebut tidak ditemukan.'
                ]);
        }

        DB::table('picMitra')->where([
            ['id', $id]
        ])->delete();

        return redirect()->route('get-validatorLihatPicTkmNetra')
            ->with([
                'status' => 'success',
                'message' => 'Nama ' . $pic->nama . ' berhasil dihapus !'
            ]);
    }


    public function editPic(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required|numeric',
            'nama' => 'required|min:1|max:30',
            'kontak' => 'required|min:1|max:30',
        ], [
            'required' => ':Attribute tidak boleh kosong !',
            'min' => ':Attribute minimal :min karakter!',
            'max' => ':Attribute maksimal :max karakter!',
            'numeric' => ':Attribute harus berupa angka!'
        ]);

        $nikLama = DB::table('picMitra')->where([
            ['id', $request->id]
        ])->value('nik');

        if ($nikLama != $request->nik) {
            $checkPic = DB::table('picMitra')->where([
                ['nik', $request['nik']],
                ['idPerusahaan', 4]
            ])->get()->count();

            if ($checkPic != 0) {
                return redirect()->route('get-validatorEditPicTkmNetra', ['id' => $request->id])
                    ->with([
                        'status' => 'danger',
                        'message' => 'NIK ' . $request->nik . ' sudah terpakai!'
                    ])->withInput();
            }
        }

        $picTkmNetra = PicMitra::find($request->id);
        $picTkmNetra->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'kontak' => $request->kontak
        ]);

        return redirect()->route('get-validatorLihatPicTkmNetra')
            ->with([
                'status' => 'success',
                'message' => 'Data PIC TKM NETRA ' . $request->nama . ' berhasil diupdate.'
            ]);

    }
}
