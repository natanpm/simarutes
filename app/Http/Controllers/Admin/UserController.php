<?php

namespace App\Http\Controllers\Admin;

use App\Lokasi;
use App\Pengguna;
use App\PicTelkom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;

class UserController extends Controller
{
    public function indexUser()
    {
        $lokasis = Lokasi::where([
            ['id', '<>', 1]
        ])->get();
        return view('Admin/Pengguna/buatPengguna', compact('lokasis'));
    }

    public function indexUserPicTelkom()
    {
        $picTelkoms = PicTelkom::all();

        return view('Admin/Pengguna/buatPenggunaPicTelkom', compact('picTelkoms'));
    }

    public function indexEditUser($id)
    {
        $user = User::where([
            'id' => $id,
            'role' => 'security'
        ])->first();

        if (!$user) {
            return redirect()->route('get-lihatUser')
                ->with([
                    'status' => 'danger',
                    'message' => 'Data Security dengan ID tersebut tidak ditemukan.'
                ]);
        }


        $lokasis = Lokasi::where([
            ['id', '<>', 1]
        ])->get();

        return view('Admin/Pengguna/editPengguna', compact('user', 'lokasis'));
    }

    public function indexEditUserPicTelkom($id)
    {
        $user = User::where([
            'id' => $id,
        ])->get()->first();

        if (!$user) {
            return redirect()->route('get-lihatUserPicTelkom')
                ->with([
                    'status' => 'danger',
                    'message' => 'Data pengguna PIC Telkom dengan ID tersebut tidak ditemukan.'
                ]);
        }

        $picTelkoms = PicTelkom::all();

        if ($user->pengguna) {
            return view('Admin/Pengguna/editPenggunaPicTelkom', compact('user', 'picTelkoms'));
        }

        return redirect()->back()
            ->with([
                'status' => 'danger',
                'message' => 'PIC Telkom ' . $user->nama . ' tidak memiliki akun!'
            ])->withInput();
    }

    public function buatUser(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required|numeric',
            'nama' => 'required|min:1|max:30',
            'kontak' => 'required|min:1|max:30',
            'username' => 'required|min:6|max:30',
            'password' => 'required|max:30',
            'validatePassword' => 'required|max:30',
            'lokasi' => 'required',
        ], [
            'required' => ':Attribute tidak boleh kosong !',
            'min' => ':Attribute minimal :min karakter!',
            'max' => ':Attribute maksimal :max karakter!',
            'numeric' => ':Attribute harus berupa angka!'
        ]);
        if ($request->password != $request->validatePassword) {
            return redirect()->route('get-buatUser')
                ->with([
                    'status' => 'danger',
                    'message' => 'Password tidak sesuai dengan password validasi!'
                ])->withInput();
        }


        $checkNik = DB::table('user')->where([
            ['nik', $request['nik']],
        ])->get()->count();

        $checkUsername = DB::table('user')->where([
            ['username', $request['username']],
        ])->get()->count();

        if ($checkUsername != 0) {
            return redirect()->route('get-buatUser')
                ->with([
                    'status' => 'danger',
                    'message' => 'username ' . $request->username . ' sudah ada terdaftar!'
                ])->withInput();
        }

        if ($checkNik != 0) {
            return redirect()->route('get-buatUser')
                ->with([
                    'status' => 'danger',
                    'message' => 'NIK ' . $request->nik . ' sudah ada terdaftar!'
                ])->withInput();
        }

        User::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'kontak' => $request->kontak,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => 'security',
            'idLokasi' => $request->lokasi,
            'statusUser' => 0,
        ]);

        return redirect()->route('get-buatUser')
            ->with([
                'status' => 'success',
                'message' => 'security dengan nama ' . $request->nama . ' berhasil didaftarkan!'
            ]);
    }

    public function buatUserPicTelkom(Request $request)
    {
        $this->validate($request, [
            'picTelkom' => 'required',
            'kontak' => 'required|min:1|max:30',
            'username' => 'required|min:6|max:30',
            'password' => 'required|max:30',
            'validatePassword' => 'required|max:30',
        ], [
            'required' => ':Attribute tidak boleh kosong !',
            'min' => ':Attribute minimal :min karakter',
            'max' => ':Attribute maksimal :max karakter',
        ]);

        if ($request->password != $request->validatePassword) {
            return redirect()->route('get-buatUserPicTelkom')
                ->with([
                    'status' => 'danger',
                    'message' => 'Password tidak sesuai dengan password validasi!'
                ])->withInput();
        }

        $checkUsername = DB::table('user')->where([
            ['username', $request['username']],
        ])->get()->count();

        if ($checkUsername != 0) {
            return redirect()->route('get-buatUserPicTelkom')
                ->with([
                    'status' => 'danger',
                    'message' => 'username ' . $request->username . ' sudah ada terdaftar!'
                ])->withInput();
        }

        $picTelkom = PicTelkom::where([
            'id' => $request->picTelkom
        ])->get()->first();

        $checkPengguna = Pengguna::where([
            'idPicTelkom' => $picTelkom->id
        ])->get()->count();

        if ($checkPengguna != 0) {
            return redirect()->route('get-buatUserPicTelkom')
                ->with([
                    'status' => 'danger',
                    'message' => 'PIC TELKOM ' . $picTelkom->nama . ' sudah memiliki akun!'
                ])->withInput();
        }

        $user = User::create([
            'nik' => $picTelkom->nik,
            'nama' => $picTelkom->nama,
            'kontak' => $request->kontak,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => 'picTelkom',
            'idLokasi' => 1,
            'statusUser' => 0,
        ]);

        $picTelkom->update([
            'kontak' => $request->kontak
        ]);

        Pengguna::create([
            'idUser' => $user->id,
            'idPicTelkom' => $picTelkom->id
        ]);

        return redirect()->route('get-buatUserPicTelkom')
            ->with([
                'status' => 'success',
                'message' => 'Akun PIC Telkom dengan nama ' . $picTelkom->nama . ' berhasil didaftarkan!'
            ]);
    }

    public function lihatUser()
    {
        $users = User::where([
            ['role', 'security'],
        ])->get();

        $lokasis = Lokasi::all();

        return view('Admin/Pengguna/lihatPengguna', compact('users', 'lokasis'));
    }

    public function lihatUserPicTelkom()
    {
        $users = User::where([
            ['role', 'picTelkom'],
        ])->get();

        return view('Admin/Pengguna/lihatPenggunaPicTelkom', compact('users'));
    }

    public function hapusUser($id)
    {
        $user = User::where([
            'id' => $id,
            'role' => 'security'
        ])->get()->first();

        if (!$user) {
            return redirect()->route('get-lihatUser')
                ->with([
                    'status' => 'danger',
                    'message' => 'Data Security dengan ID tersebut tidak ditemukan.'
                ]);
        }

        DB::table('user')->where([
            ['id', $id]
        ])->delete();

        return redirect()->route('get-lihatUser')
            ->with([
                'status' => 'success',
                'message' => 'Nama ' . $user->nama . ' berhasil dihapus !'
            ]);
    }

    public function hapusUserPicTelkom($id)
    {
        $user = User::where([
            'id' => $id,
            'role' => 'picTelkom'
        ])->get()->first();

        if (!$user) {
            return redirect()->route('get-lihatUserPicTelkom')
                ->with([
                    'status' => 'danger',
                    'message' => 'Data Pengguna NETRA dengan ID tersebut tidak ditemukan.'
                ]);
        }


        DB::table('user')->where([
            ['id', $id]
        ])->delete();

        return redirect()->route('get-lihatUserPicTelkom')
            ->with([
                'status' => 'success',
                'message' => 'Nama ' . $user->nama . ' berhasil dihapus !'
            ]);
    }

    public function editUser(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required|numeric',
            'nama' => 'required|min:1|max:30',
            'kontak' => 'required|min:1|max:30',
            'username' => 'required|min:6|max:30',
            'password' => 'max:30',
            'validatePassword' => 'max:30',
            'lokasi' => 'required',
        ], [
            'required' => ':Attribute tidak boleh kosong!',
            'min' => ':Attribute minimal :min karakter!',
            'max' => ':Attribute maksimal :max karakter!',
            'numeric' => ':Attribut harus berupa angka!'
        ]);

        if($request->password || $request->validatePassword){
            if ($request->password != $request->validatePassword) {
                return redirect()->route('get-editUser', ['id' => $request->id])
                    ->with([
                        'status' => 'danger',
                        'message' => 'Password tidak sesuai dengan password validasi!'
                    ])->withInput();
            }
        }

        $nikLama = DB::table('user')->where([
            ['id', $request->id]
        ])->value('nik');

        if ($nikLama != $request->nik) {
            $checkNik = DB::table('user')->where([
                ['nik', $request['nik']],
            ])->get()->count();
            if ($checkNik != 0) {
                return redirect()->route('get-editUser', ['id' => $request->id])
                    ->with([
                        'status' => 'danger',
                        'message' => 'NIK ' . $request->nik . ' sudah terpakai!'
                    ])->withInput();
            }
        }

        $usernameLama = DB::table('user')->where([
            ['id', $request->id]
        ])->value('username');

        if ($usernameLama != $request->username) {
            $checkUsername = DB::table('user')->where([
                ['username', $request['username']],
            ])->get()->count();
            if ($checkUsername != 0) {
                return redirect()->route('get-editUser', ['id' => $request->id])
                    ->with([
                        'status' => 'danger',
                        'message' => 'Username' . $request->username . ' sudah terpakai!'
                    ])->withInput();
            }
        }

        $user = User::where('id', $request->id)->get()->first();

        if($request->password){
            $user->update([
                'nik' => $request->nik,
                'nama' => $request->nama,
                'kontak' => $request->kontak,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'idLokasi' => $request->lokasi,
            ]);
        }else{
            $user->update([
                'nik' => $request->nik,
                'nama' => $request->nama,
                'kontak' => $request->kontak,
                'username' => $request->username,
                'idLokasi' => $request->lokasi,
            ]);
        }

        return redirect()->route('get-lihatUser')
            ->with([
                'status' => 'success',
                'message' => 'Data Pengguna ' . $request->nama . ' berhasil diupdate.'
            ]);

    }

    public function editUserPicTelkom(Request $request)
    {
        $this->validate($request, [
            'picTelkom' => 'required',
            'kontak' => 'required|min:1|max:30',
            'username' => 'required|min:6|max:30',
            'password' => 'max:30',
            'validatePassword' => 'max:30',
        ], [
            'required' => ':Attribute tidak boleh kosong !',
            'min' => ':Attribute minimal :min karakter',
            'max' => ':Attribute maksimal :max karakter',
        ]);


        if($request->password || $request->validatePassword){
            if ($request->password != $request->validatePassword) {
                return redirect()->route('get-editUserPicTelkom', ['id' => $request->id])
                    ->with([
                        'status' => 'danger',
                        'message' => 'Password tidak sesuai dengan password validasi!'
                    ])->withInput();
            }
        }


        $usernameLama = DB::table('user')->where([
            ['id', $request->id]
        ])->value('username');

        if ($usernameLama != $request->username) {
            $checkUsername = DB::table('user')->where([
                ['username', $request['username']],
            ])->get()->count();
            if ($checkUsername != 0) {
                return redirect()->route('get-editUserPicTelkom', ['id' => $request->id])
                    ->with([
                        'status' => 'danger',
                        'message' => 'Username' . $request->username . ' sudah terpakai!'
                    ])->withInput();
            }
        }

        $pengguna = Pengguna::where([
            'idUser' => $request->id,
        ])->get()->first();


        if ($pengguna->idPicTelkom != $request->picTelkom) {
            $checkPengguna = Pengguna::where([
                'idPicTelkom' => $request->picTelkom
            ])->get()->first();

            if ($checkPengguna) {
                return redirect()->route('get-editUserPicTelkom', ['id' => $request->id])
                    ->with([
                        'status' => 'danger',
                        'message' => $checkPengguna->user->nama . ' sudah memiliki akun!'
                    ])->withInput();
            }
        }


        $pengguna->update([
            'idPicTelkom' => $request->picTelkom
        ]);

        PicTelkom::where([
            'id' => $request->picTelkom
        ])->get()->first()->update([
            'kontak' => $request->kontak
        ]);

        $user = User::where('id', $request->id)->get()->first();

        if($request->password){
            $user->update([
                'nama' => $pengguna->picTelkom->nama,
                'kontak' => $request->kontak,
                'username' => $request->username,
                'password' => bcrypt($request->password)
            ]);
        }else{
            $user->update([
                'nama' => $pengguna->picTelkom->nama,
                'kontak' => $request->kontak,
                'username' => $request->username,
            ]);
        }

        return redirect()->route('get-lihatUserPicTelkom')
            ->with([
                'status' => 'success',
                'message' => 'Data Pengguna PIC Telkom ' . $user->pengguna->picTelkom->nama . ' berhasil diupdate.'
            ]);

    }
}
