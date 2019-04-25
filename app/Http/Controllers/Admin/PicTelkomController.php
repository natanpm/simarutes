<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PicTelkom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PicTelkomController extends Controller
{
    public function indexPic()
    {
        return view('Admin/Telkom/buatPicTelkom');
    }

    public function indexEditPic($id)
    {
        $pic = PicTelkom::where([
            'id' => $id
        ])->get()->first();

        if (!$pic) {
            return redirect()->route('get-lihatPicTelkom')
                ->with([
                    'status' => 'danger',
                    'message' => 'Data PIC Telkom dengan ID tersebut tidak ditemukan.'
                ]);
        }

        return view('Admin/Telkom/editPicTelkom', compact('pic'));
    }

    public function buatPic(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required|numeric',
            'nama' => 'required|min:1|max:30',
            'kontak' => 'required|min:1|max:30',
            'unit' => 'required',
        ], [
            'required' => ':Attribute tidak boleh kosong !',
            'min' => ':Attribute minimal :min karakter!',
            'max' => ':Attribute maksimal :max karakter!',
            'numeric' => ':Attribute harus berupa angka!'
        ]);


        $checkPic = DB::table('picTelkom')->where([
            ['nik', $request['nik']]
        ])->get()->count();

        if ($checkPic != 0) {
            return redirect()->route('get-buatPicTelkom')
                ->with([
                    'status' => 'danger',
                    'message' => 'NIK ' . $request->nik . ' sudah ada terdaftar!'
                ])->withInput();
        }


        picTelkom::create([
            'nik' => $request->nik,
            'nama' => $request->input('nama'),
            'kontak' => $request->input('kontak'),
            'unit' => strtoupper($request->input('unit'))
        ]);

        return redirect()->route('get-buatPicTelkom')
            ->with([
                'status' => 'success',
                'message' => 'PIC Telkom dengan nama ' . $request->nama . ' berhasil didaftarkan!'
            ]);
    }

    public function editPic(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required|numeric',
            'nama' => 'required|min:1|max:30',
            'kontak' => 'required|min:1|max:30',
            'unit' => 'required',
        ], [
            'required' => ':Attribute tidak boleh kosong !',
            'min' => ':Attribute minimal :min karakter!',
            'max' => ':Attribute maksimal :max karakter!',
            'numeric' => ':Attribute harus berupa angka!'
        ]);

        $nikLama = DB::table('picTelkom')->where([
            ['id', $request->id]
        ])->value('nik');

        if ($nikLama != $request->nik) {
            $checkPic = DB::table('picTelkom')->where([
                ['nik', $request['nik']],
            ])->get()->count();

            if ($checkPic != 0) {
                return redirect()->route('get-editPicTelkom', ['id' => $request->id])
                    ->with([
                        'status' => 'danger',
                        'message' => 'NIK ' . $request->nik . ' sudah terpakai!'
                    ])->withInput();
            }
        }


        $picTelkom = PicTelkom::find($request->id);
        $picTelkom->update([
            'unit' => strtoupper($request->unit),
            'nik' => $request->nik,
            'nama' => $request->nama,
            'kontak' => $request->kontak
        ]);

        return redirect()->route('get-lihatPicTelkom')
            ->with([
                'status' => 'success',
                'message' => 'Data Pic Telkom ' . $request->nama . ' berhasil diupdate.'
            ]);
    }


    public function hapusPic($id)
    {
        $pic = PicTelkom::where([
            ['id', $id]
        ])->get()->first();

        if (!$pic) {
            return redirect()->route('get-lihatPicTelkom')
                ->with([
                    'status' => 'danger',
                    'message' => 'Data PIC Telkom dengan ID tersebut tidak ditemukan.'
                ]);
        }

        DB::table('picTelkom')->where([
            ['id', $id]
        ])->delete();

        return redirect()->route('get-lihatPicTelkom')
            ->with([
                'status' => 'success',
                'message' => 'Nama ' . $pic->nama . ' berhasil dihapus !'
            ]);
    }

    public function lihatPic()
    {
        $picTelkoms = PicTelkom::all();

        return view('Admin/Telkom/lihatPicTelkom', compact('picTelkoms'));
    }


}
