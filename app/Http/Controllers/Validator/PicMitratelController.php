<?php

namespace App\Http\Controllers\Validator;

use App\Http\Controllers\Controller;
use App\UnitPerusahaan;
use Illuminate\Http\Request;
use App\PicMitra;
use Illuminate\Support\Facades\DB;

class PicMitratelController extends Controller
{
    public function indexPic()
    {
        $units = DB::table('unitPerusahaan')->where([
            'idPerusahaan' => 5
        ])->get();
        return view('Validator/Mitratel/buatPicMitratel', compact('units'));
    }

    public function indexUnit()
    {
        return view('Validator/Mitratel/buatUnitMitratel');
    }

    public function indexEditUnit($id)
    {
        $unit = UnitPerusahaan::where([
            'id' => $id,
            'idPerusahaan' => 5
        ])->get()->first();

        if (!$unit) {
            return redirect()->route('get-lihatUnitMitratel')
                ->with([
                    'status' => 'danger',
                    'message' => 'Data unit Mitratel dengan ID tersebut tidak ditemukan.'
                ]);
        }

        return view('Validator/Mitratel/editUnitMitratel', compact('unit'));
    }

    public function indexEditPic($id)
    {
        $units = DB::table('unitPerusahaan')->where([
            ['idPerusahaan', 5]
        ])->get();

        $pic = PicMitra::where([
            'id' => $id,
            'idPerusahaan' =>5
        ])->get()->first();

        if (!$pic) {
            return redirect()->route('get-lihatPicMitratel')
                ->with([
                    'status' => 'danger',
                    'message' => 'Data PIC Mitratel dengan ID tersebut tidak ditemukan.'
                ]);
        }
        return view('Validator/Mitratel/editPicMitratel', compact('units', 'pic'));
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
            'numeric' => ':Attribut harus berupa angka!'
        ]);

        $checkPic = DB::table('picMitra')->where([
            ['nik', $request['nik']],
            ['idPerusahaan', 5]
        ])->get()->count();

        if ($checkPic != 0) {
            return redirect()->route('get-buatPicMitratel')
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
            'idPerusahaan' => 5,
            'idUnitPerusahaan' => $request->input('unitPerusahaan')
        ]);

        return redirect()->route('get-buatPicMitratel')
            ->with([
                'status' => 'success',
                'message' => 'PIC Mitratel dengan nama ' . $request->nama . ' berhasil didaftarkan!'
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
            ['idPerusahaan', 5]
        ])->count();

        if ($checkUnit != 0) {
            return redirect()->route('get-buatUnitMitratel')
                ->with([
                    'status' => 'danger',
                    'message' => 'Unit ' . strtoupper($request->namaUnit) . ' sudah ada!'
                ])->withInput();
        }

        UnitPerusahaan::create([
            'namaUnit' => strtoupper($request->input('namaUnit')),
            'idPerusahaan' => 5,
        ]);

        return redirect()->route('get-buatUnitMitratel')
            ->with([
                'status' => 'success',
                'message' => 'Unit Mitratel ' .strtoupper($request->namaUnit). ' berhasil ditambahkan!'
            ]);
    }

    public function lihatPic()
    {
        $picTas = PicMitra::where([
            ['idPerusahaan', 5],
        ])->get();

        return view('Validator/Mitratel/lihatPicMitratel', compact('picTas'));
    }

    public function lihatUnit()
    {
        $unitTas = DB::table('unitPerusahaan')->where([
            ['idPerusahaan', 5],
        ])->get();
        return view('Validator/Mitratel/lihatUnitMitratel', compact('unitTas'));
    }

    public function hapusUnit($id)
    {
        $unit = UnitPerusahaan::where([
            'id' => $id,
            'idPerusahaan' => 5
        ])->get()->first();

        if (!$unit) {
            return redirect()->route('get-lihatUnitMitratel')
                ->with([
                    'status' => 'danger',
                    'message' => 'Data unit Mitratel dengan ID tersebut tidak ditemukan.'
                ]);
        }

        DB::table('unitPerusahaan')->where([
            ['id', $id]
        ])->delete();

        return redirect()->route('get-lihatUnitMitratel')
            ->with([
                'status' => 'success',
                'message' => 'Unit Mitratel ' . $unit->namaUnit . ' berhasil dihapus !'
            ]);
    }

    public function hapusPic($id)
    {
        $pic = PicMitra::where([
            'id' => $id,
            'idPerusahaan' => 5
        ])->get()->first();

        if (!$pic) {
            return redirect()->route('get-lihatPicMitratel')
                ->with([
                    'status' => 'danger',
                    'message' => 'Data PIC Mitratel dengan ID tersebut tidak ditemukan.'
                ]);
        }

        DB::table('picMitra')->where([
            ['id', $id]
        ])->delete();

        return redirect()->route('get-lihatPicMitratel')
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
            return redirect()->route('get-lihatUnitMitratel')
                ->with([
                    'status' => 'warning',
                    'message' => 'Tidak ada perubahan nama unit '
                ]);
        }

        $checkUnit = DB::table('unitPerusahaan')->where([
            ['namaUnit', $request['namaUnit']],
            ['idPerusahaan', 5]
        ])->get()->count();

        if ($checkUnit != 0) {
            return redirect()->route('get-editUnitMitratel', ['id' => $request->id])
                ->with([
                    'status' => 'danger',
                    'message' => 'Nama Unit ' . strtoupper($request->namaUnit) . ' sudah ada!'
                ])->withInput();
        }



        DB::table('unitPerusahaan')->where([
            ['id', $request->id]
        ])->update(
            ['namaUnit' => strtoupper($request->namaUnit)]
        );

        return redirect()->route('get-lihatUnitMitratel')
            ->with([
                'status' => 'success',
                'message' => 'Nama unit ' . $namaLama . ' berhasil dirubah menjadi ' . strtoupper($request->namaUnit). '.'
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
                ['idPerusahaan', 5]
            ])->get()->count();

            if ($checkPic != 0) {
                return redirect()->route('get-editPicMitratel', ['id' => $request->id])
                    ->with([
                        'status' => 'danger',
                        'message' => 'NIK ' . $request->nik . ' sudah terpakai!'
                    ])->withInput();
            }
        }

        $picMitratel = PicMitra::find($request->id);
        $picMitratel->update([
            'idUnitPerusahaan' => $request->unitPerusahaan,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'kontak' => $request->kontak
        ]);

        return redirect()->route('get-lihatPicMitratel')
            ->with([
                'status' => 'success',
                'message' => 'Data Pic Mitratel ' . $request->nama . ' berhasil diupdate.'
            ]);

    }
}
