<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Pengguna;
use App\Lokasi;
use App\PicTelkom;

class RegisterController extends Controller
{
    public function index()
    {
        $lokasis = Lokasi::where([
            ['id','<>',1],
        ])->orderBy('lokasi')->get();
        return view('register',compact('lokasis'));
    }

    public function register(Request $request)
    {

        $this->validate($request, [
            'nik' => 'required|numeric',
            'nama' => 'required|max:30|min:1',
            'kontak' => 'required|max:30|min:6',
            'username' => 'required|max:30|min:6',
            'password' => 'required|max:30|min:6',
            'konfirmasiPassword' => 'required|max:30|min:6',
            'akun' => 'required',
        ], [
            'required' => ':Attribute tidak boleh kosong !',
            'max' => 'Panjang :Attribute maksimal :max Karakter!',
            'min' => 'Panjang :Attribute minimal :min Karakter!',
            'numeric' => ':Attribute harus berupa angka!'
        ]);

        if ($request->password != $request->konfirmasiPassword) {
            return redirect()->route('index-register')
                ->with([
                    'status' => 'danger',
                    'message' => 'Password tidak sesuai dengan password validasi!'
                ])->withInput();
        }

        $checkUsername = DB::table('user')->where([
            ['username', $request['username']],
        ])->get()->count();

        $checkNik = DB::table('user')->where([
            ['nik', $request['nik']],
        ])->get()->count();

        if ($checkUsername != 0) {
            return redirect()->route('index-register')
                ->with([
                    'status' => 'danger',
                    'message' => 'username ' . $request->username . ' sudah terdaftar!'
                ])->withInput();
        }

        if ($checkNik != 0) {
            return redirect()->route('index-register')
                ->with([
                    'status' => 'danger',
                    'message' => 'NIK ' . $request->nik . ' sudah terdaftar!'
                ])->withInput();
        }

        if($request->akun == 'security'){

            $this->validate($request, [
                'lokasi' => 'required',
            ], [
                'required' => ':Attribute tidak boleh kosong !',
            ]);

            $user = User::create([
                'nik' => $request->nik,
                'nama' => ucwords($request->nama),
                'kontak' => $request->kontak,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'role' => $request->akun,
                'statusUser' => 0,
                'idLokasi' => $request->lokasi
            ]);

            return redirect()->route('index-login')
                ->with([
                    'status' => 'success',
                    'message' => 'Akun Security dengan nama ' . $request->nama . ' berhasil didaftarkan, tunggu konfirmasi akun 1x24 jam(Jam Kerja)'
                ]);

        }else{

            $picTelkom = PicTelkom::where([
                'nik' => $request->nik
            ])->get()->first();

            if(count($picTelkom) != 1){
                return redirect()->route('index-register')
                    ->with([
                        'status' => 'danger',
                        'message' => 'Data PIC Telkom tidak ditemukan!'
                    ])->withInput();
            }

            $user = User::create([
                'nik' => $picTelkom->nik,
                'nama' => ucwords($picTelkom->nama),
                'kontak' => $request->kontak,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'role' => 'picTelkom',
                'idLokasi' => 1,
                'statusUser' => 0
            ]);

            Pengguna::create([
                'idUser' => $user->id,
                'idPicTelkom' => $picTelkom->id
            ]);

            return redirect()->route('index-login')
                ->with([
                    'status' => 'success',
                    'message' => 'Akun PIC Telkom dengan nama ' . $picTelkom->nama . ' berhasil didaftarkan, tunggu konfirmasi akun 1x24 jam(Jam Kerja)'
                ]);
        }
    }

}
