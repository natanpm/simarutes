<?php

namespace App\Http\Controllers\Validator;

use App\Http\Controllers\Controller;
use App\UnitPerusahaan;
use Illuminate\Http\Request;
use App\PicMitra;
use Illuminate\Support\Facades\DB;

class PicTelkomAksesController extends Controller
{
    public function indexPic()
    {
        $units = DB::table('unitPerusahaan')->where([
            'idPerusahaan' => 2
        ])->get();
        return view('Validator/TelkomAkses/buatPicTelkomAkses', compact('units'));
    }

    public function indexUnit()
    {
        return view('Validator/TelkomAkses/buatUnitTelkomAkses');
    }

    public function indexEditUnit($id)
    {
        $unit = UnitPerusahaan::where([
            'id' => $id,
            'idPerusahaan' => 2
        ])->get()->first();

        if (!$unit) {
            return redirect()->route('get-validatorLihatUnitTelkomAkses')
                ->with([
                    'status' => 'danger',
                    'message' => 'Data unit Telkom Akses dengan ID tersebut tidak ditemukan.'
                ]);
        }

        return view('Validator/TelkomAkses/editUnitTelkomAkses', compact('unit'));
    }

    public function indexEditPic($id)
    {
        $units = DB::table('unitPerusahaan')->where([
            ['idPerusahaan', 2]
        ])->get();

        $pic = PicMitra::where([
            'id' => $id,
            'idPerusahaan' =>2
        ])->get()->first();

        if (!$pic) {
            return redirect()->route('get-validatorLihatPicTelkomAkses')
                ->with([
                    'status' => 'danger',
                    'message' => 'Data PIC Telkom Akses dengan ID tersebut tidak ditemukan.'
                ]);
        }
        return view('Validator/TelkomAkses/editPicTelkomAkses', compact('units', 'pic'));
    }

    public function buatPic(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required|numeric',
            'nama' => 'required|min:1|max:30',
            'kontak' => 'required|min:1|max:30',
            'unitPerusahaan' => 'required',
        ], [
            'required' => ':Attribute tidak boleh kosong !',
            'min' => ':Attribute minimal :min karakter!',
            'max' => ':Attribute maksimal :max karakter!',
            'numeric' => ':Attribute harus berupa angka!'
        ]);

        $checkPic = DB::table('picMitra')->where([
            ['nik', $request['nik']],
            ['idPerusahaan', 2]
        ])->get()->count();

        if ($checkPic != 0) {
            return redirect()->route('get-validatorBuatPicTelkomAkses')
                ->with([
                    'status' => 'danger',
                    'message' => 'NIK ' . $request->nik . ' sudah ada terdaftar!'
                ])->withInput();
        }

        picMitra::create([
            'nik' => $request->nik,
            'nama' => $request->input('nama'),
            'kontak' => $request->input('kontak'),
            'statusNda' => 0,
            'keterangan' => '-',
            'idPerusahaan' => 2,
            'idUnitPerusahaan' => $request->input('unitPerusahaan')
        ]);

        return redirect()->route('get-validatorBuatPicTelkomAkses')
            ->with([
                'status' => 'success',
                'message' => 'PIC Telkom Akses dengan nama ' . $request->nama . ' berhasil didaftarkan!'
            ]);
    }

    public function buatUnit(Request $request)
    {
        $this->validate($request, [
            'namaUnit' => 'required|min:1|max:30',
        ], [
            'required' => ':Attribute tidak boleh kosong !',
            'min' => ':Attribute minimal :min karakter!',
            'max' => ':Attribute maksimal :max karakter!',
        ]);

        $checkUnit = DB::table('unitPerusahaan')->where([
            ['namaUnit', $request['namaUnit']],
            ['idPerusahaan', 2]
        ])->count();

        if ($checkUnit != 0) {
            return redirect()->route('get-validatorBuatUnitTelkomAkses')
                ->with([
                    'status' => 'danger',
                    'message' => 'Unit ' . $request->namaUnit . ' sudah ada!'
                ])->withInput();
        }

        UnitPerusahaan::create([
            'namaUnit' => strtoupper($request->input('namaUnit')),
            'idPerusahaan' => 2,
        ]);

        return redirect()->route('get-validatorBuatUnitTelkomAkses')
            ->with([
                'status' => 'success',
                'message' => 'Unit Telkom Akses ' . $request->namaUnit . ' berhasil ditambahkan!'
            ]);
    }

    public function lihatPic()
    {
        $picTas = PicMitra::where([
            ['idPerusahaan', 2],
        ])->get();

        return view('Validator/TelkomAkses/lihatPicTelkomAkses', compact('picTas'));
    }

    public function lihatUnit()
    {
        $unitTas = DB::table('unitPerusahaan')->where([
            ['idPerusahaan', 2],
        ])->get();
        return view('Validator/TelkomAkses/lihatUnitTelkomAkses', compact('unitTas'));
    }

    public function hapusUnit($id)
    {
        $unit = UnitPerusahaan::where([
            'id' => $id,
            'idPerusahaan' => 2
        ])->get()->first();

        if (!$unit) {
            return redirect()->route('get-validatorLihatUnitTelkomAkses')
                ->with([
                    'status' => 'danger',
                    'message' => 'Data unit Telkom Akses dengan ID tersebut tidak ditemukan.'
                ]);
        }

        DB::table('unitPerusahaan')->where([
            ['id', $id]
        ])->delete();

        return redirect()->route('get-validatorLihatUnitTelkomAkses')
            ->with([
                'status' => 'success',
                'message' => 'Unit Telkom Akses ' . $unit->namaUnit . ' berhasil dihapus !'
            ]);
    }

    public function hapusPic($id)
    {
        $pic = PicMitra::where([
            'id' => $id,
            'idPerusahaan' => 2
        ])->get()->first();

        if (!$pic) {
            return redirect()->route('get-validatorLihatPicTelkomAkses')
                ->with([
                    'status' => 'danger',
                    'message' => 'Data PIC Telkom Akses dengan ID tersebut tidak ditemukan.'
                ]);
        }

        DB::table('picMitra')->where([
            ['id', $id]
        ])->delete();

        return redirect()->route('get-validatorLihatPicTelkomAkses')
            ->with([
                'status' => 'success',
                'message' => 'Nama ' . $pic->nama . ' berhasil dihapus !'
            ]);
    }

    public function editUnit(Request $request)
    {
        $this->validate($request, [
            'namaUnit' => 'required|min:1|max:30',
        ], [
            'required' => ':Attribute tidak boleh kosong !',
            'min' => ':Attribute minimal :min karakter!',
            'max' => ':Attribute maksimal :max karakter!',
        ]);

        $namaLama = DB::table('unitPerusahaan')->where([
            ['id', $request->id]
        ])->value('namaUnit');

        if($namaLama == $request->namaUnit){
            return redirect()->route('get-validatorLihatUnitTelkomAkses')
                ->with([
                    'status' => 'warning',
                    'message' => 'Tidak ada perubahan nama unit '
                ]);
        }

        $checkUnit = DB::table('unitPerusahaan')->where([
            ['namaUnit', $request['namaUnit']],
            ['idPerusahaan', 2]
        ])->get()->count();

        if ($checkUnit != 0) {
            return redirect()->route('get-validatorEditUnitTelkomAkses', ['id' => $request->id])
                ->with([
                    'status' => 'danger',
                    'message' => 'Nama Unit ' . $request->namaUnit . ' sudah ada!'
                ])->withInput();
        }



        DB::table('unitPerusahaan')->where([
            ['id', $request->id]
        ])->update(
            ['namaUnit' => strtoupper($request->namaUnit)]
        );

        return redirect()->route('get-validatorLihatUnitTelkomAkses')
            ->with([
                'status' => 'success',
                'message' => 'Nama unit ' . $namaLama . ' berhasil dirubah menjadi ' . $request->namaUnit . '.'
            ]);
    }

    public function editPic(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required|numeric',
            'nama' => 'required|min:1|max:30',
            'kontak' => 'required|min:1|max:30',
            'unitPerusahaan' => 'required',
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
                ['idPerusahaan', 2]
            ])->get()->count();

            if ($checkPic != 0) {
                return redirect()->route('get-validatorEditPicTelkomAkses', ['id' => $request->id])
                    ->with([
                        'status' => 'danger',
                        'message' => 'NIK ' . $request->nik . ' sudah terpakai!'
                    ])->withInput();
            }
        }

        $picTelkomAkses = PicMitra::find($request->id);
        $picTelkomAkses->update([
            'idUnitPerusahaan' => $request->unitPerusahaan,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'kontak' => $request->kontak
        ]);

        return redirect()->route('get-validatorLihatPicTelkomAkses')
            ->with([
                'status' => 'success',
                'message' => 'Data Pic Telkom Akses ' . $request->nama . ' berhasil diupdate.'
            ]);

    }
}
