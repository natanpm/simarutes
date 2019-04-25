<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\UnitPerusahaan;
use Illuminate\Http\Request;
use App\PicMitra;
use Illuminate\Support\Facades\DB;

class PicSigmaController extends Controller
{
    public function indexPic()
    {
        $units = DB::table('unitPerusahaan')->where([
            'idPerusahaan' => 3
        ])->get();
        return view('Admin/Sigma/buatPicSigma', compact('units'));
    }

    public function indexUnit()
    {
        return view('Admin/Sigma/buatUnitSigma');
    }

    public function indexEditUnit($id)
    {
        $unit = UnitPerusahaan::where([
            'id' => $id,
            'idPerusahaan' => 3
        ])->get()->first();

        if (!$unit) {
            return redirect()->route('get-lihatUnitSigma')
                ->with([
                    'status' => 'danger',
                    'message' => 'Data unit SIGMA dengan ID tersebut tidak ditemukan.'
                ]);
        }
        return view('Admin/Sigma/editUnitSigma', compact('unit'));
    }

    public function indexEditPic($id)
    {
        $units = DB::table('unitPerusahaan')->where([
            ['idPerusahaan', 3]
        ])->get();

        $pic = PicMitra::where([
            'id' => $id,
            'idPerusahaan' => 3
        ])->get()->first();

        if (!$pic) {
            return redirect()->route('get-lihatPicSigma')
                ->with([
                    'status' => 'danger',
                    'message' => 'Data Pic SIGMA dengan ID tersebut tidak ditemukan.'
                ]);
        }

        return view('Admin/Sigma/editPicSigma', compact('units', 'pic'));
    }

    public function buatPic(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:1|max:30',
            'kontak' => 'required|min:1|max:30',
            'unitPerusahaan' => 'required',
        ], [
            'required' => ':Attribute tidak boleh kosong !',
            'min' => ':Attribute minimal :min karakter!',
            'max' => ':Attribute maksimal :max karakter!',
        ]);

        $checkPic = DB::table('picMitra')->where([
            ['nama', $request['nama']],
            ['idUnitPerusahaan', $request['unitPerusahaan']],
            ['idPerusahaan', 3]
        ])->get()->count();

        if ($checkPic != 0) {
            return redirect()->route('get-buatPicSigma')
                ->with([
                    'status' => 'danger',
                    'message' => 'Nama ' . $request->nama . ' sudah ada pada unit tersebut!'
                ])->withInput();
        }

        picMitra::create([
            'nik' => '-',
            'nama' => $request->input('nama'),
            'kontak' => $request->input('kontak'),
            'keterangan' => '-',
            'statusNda' => 0,
            'idPerusahaan' => 3,
            'idUnitPerusahaan' => $request->input('unitPerusahaan')
        ]);

        return redirect()->route('get-buatPicSigma')
            ->with([
                'status' => 'success',
                'message' => 'PIC SIGMA dengan nama ' . $request->nama . ' berhasil didaftarkan!'
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
            ['idPerusahaan', 3]
        ])->count();

        if ($checkUnit != 0) {
            return redirect()->route('get-buatUnitSigma')
                ->with([
                    'status' => 'danger',
                    'message' => 'Unit Perusahaan ' . strtoupper($request->namaUnit) . ' sudah ada!'
                ])->withInput();
        }

        UnitPerusahaan::create([
            'namaUnit' => strtoupper($request->input('namaUnit')),
            'idPerusahaan' => 3,
        ]);

        return redirect()->route('get-buatUnitSigma')
            ->with([
                'status' => 'success',
                'message' => 'Unit SIGMA ' . strtoupper($request->namaUnit) . ' berhasil ditambahkan!'
            ]);
    }

    public function lihatPic()
    {
        $picSigmas = PicMitra::where([
            ['idPerusahaan', 3],
        ])->get();

        return view('Admin/Sigma/lihatPicSigma', compact('picSigmas'));
    }

    public function lihatUnit()
    {
        $unitSigmas = DB::table('unitPerusahaan')->where([
            ['idPerusahaan', 3],
        ])->get();
        return view('Admin/Sigma/lihatUnitSigma', compact('unitSigmas'));
    }

    public function hapusUnit($id)
    {
        $unit = UnitPerusahaan::where([
            'id' => $id,
            'idPerusahaan' => 3
        ])->get()->first();

        if(!$unit){
            return redirect()->route('get-lihatUnitSigma')
                ->with([
                    'status' => 'danger',
                    'message' => 'Data unit Sigma dengan ID tersebut tidak ditemukan!'
                ]);
        }

        DB::table('unitPerusahaan')->where([
            ['id', $id]
        ])->delete();

        return redirect()->route('get-lihatUnitSigma')
            ->with([
                'status' => 'success',
                'message' => 'Unit Sigma ' . $unit->namaUnit . ' berhasil dihapus !'
            ]);
    }

    public function hapusPic($id)
    {
        $pic = PicMitra::where([
            'id' => $id,
            'idPerusahaan' => 3
        ])->value('nama');

        if(!$pic){
            return redirect()->route('get-lihatPicSigma')
                ->with([
                    'status' => 'danger',
                    'message' => 'Data PIC Sigma dengan ID tersebut tidak ditemukan!'
                ]);
        }

        DB::table('picMitra')->where([
            ['id', $id]
        ])->delete();

        return redirect()->route('get-lihatPicSigma')
            ->with([
                'status' => 'success',
                'message' => 'Nama ' . $pic . ' berhasil dihapus !'
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

        $checkUnit = DB::table('unitPerusahaan')->where([
            ['namaUnit', $request['namaUnit']],
            ['idPerusahaan', 3]
        ])->get()->count();

        $namaLama = DB::table('unitPerusahaan')->where([
            ['id', $request->id]
        ])->value('namaUnit');

        if ($namaLama == $request->namaUnit) {
            return redirect()->route('get-lihatUnitSigma')
                ->with([
                    'status' => 'warning',
                    'message' => 'Tidak ada perubahan nama unit '
                ]);
        }

        if ($checkUnit != 0) {
            return redirect()->route('get-editUnitSigma', ['id' => $request->id])
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

        return redirect()->route('get-lihatUnitSigma')
            ->with([
                'status' => 'success',
                'message' => 'Nama unit ' . $namaLama . ' berhasil dirubah menjadi ' . strtoupper($request->namaUnit) . '.'
            ]);
    }

    public function editPic(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:1|max:30',
            'kontak' => 'required|min:1|max:30',
            'idUnitPerusahaan' => 'required',
        ], [
            'required' => ':Attribute tidak boleh kosong !',
            'min' => ':Attribute minimal :min karakter!',
            'max' => ':Attribute maksimal :max karakter!',
        ]);


        $namaLama = DB::table('picMitra')->where([
            ['id', $request->id]
        ])->value('nama');

        if(strtolower($namaLama) != strtolower($request->nama)){
            $checkPic = DB::table('picMitra')->where([
                ['nama', $request['nama']],
                ['idUnitPerusahaan', $request['idUnitPerusahaan']],
                ['idPerusahaan', 3]
            ])->get()->count();

            if ($checkPic != 0) {
                return redirect()->route('get-editPicSigma', ['id' => $request->id])
                    ->with([
                        'status' => 'danger',
                        'message' => 'Nama ' . $request->nama . ' pada unit tersebut sudah terpakai!'
                    ])->withInput();
            }
        }

        $pic = PicMitra::find($request->id);
        $pic->update([
            'idUnitPerusahaan' => $request->idUnitPerusahaan,
            'nama' => $request->nama,
            'kontak' => $request->kontak
        ]);


        return redirect()->route('get-lihatPicSigma')
            ->with([
                'status' => 'success',
                'message' => 'Data Pic Sigma ' . $request->nama . ' berhasil diupdate.'
            ]);

    }
}
