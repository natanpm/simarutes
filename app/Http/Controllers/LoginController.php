<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index()
    {
        auth('user')->logout();
        return view('login');
    }

    public function login(Request $request)
    {

        $this->validate($request, [
            'username' => 'required|max:30',
            'password' => 'required|max:30',
        ], [
            'required' => ':Attribute tidak boleh kosong !',
            'max' => 'Panjang :Attribute maksimal 30 Karakter'
        ]);

        $kredensial = [
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ];

        $cekUser = User::where('username', $kredensial['username'])->count();
        if ($cekUser >= 1) {
            if (auth('user')->attempt($kredensial)) {
                $roleUser = User::where('username', $kredensial['username'])->first();
                if ($roleUser->role == 'admin') {
                    return redirect()->route('admin-home');
                } elseif ($roleUser->role == 'validator') {
                    return redirect()->route('validator-home');
                } elseif ($roleUser->role == 'supervalidator') {
                    return redirect()->route('supervalidator-home');
                } elseif ($roleUser->role == 'security') {
                    if ($roleUser->statusUser == 0) {
                        return redirect()
                            ->route('index-login')
                            ->with([
                                'status' => 'warning',
                                'message' => 'Akun belum divalidasi, tunggu 1x24 jam / konfirmasi pada bagian Admin.(pada jam kerja)'
                            ]);
                    }
                    return redirect()->route('security-home');
                } elseif ($roleUser->role == 'picTelkom') {
                    if ($roleUser->statusUser == 0) {
                        return redirect()
                            ->route('index-login')
                            ->with([
                                'status' => 'warning',
                                'message' => 'Akun belum divalidasi, tunggu 1x24 jam / konfirmasi pada bagian admin(Jam Kerja)'
                            ]);
                    }
                    return redirect()->route('picTelkom-home');
                }elseif ($roleUser->role == 'gm') {
                    return redirect()->route('gm-home');
                }elseif ($roleUser->role == 'sas') {
                    return redirect()->route('sas-home');
                } else {
                    return redirect()
                        ->route('index-login')
                        ->with([
                            'status' => 'danger',
                            'message' => 'Username dan Password Salah!'
                        ])->withInput();
                }
            } else {
                return redirect()
                    ->route('index-login')
                    ->with([
                        'status' => 'danger',
                        'message' => 'Username dan Password Salah!'
                    ])->withInput();
            }

        } else {
            return redirect()
                ->route('index-login')
                ->with([
                    'status' => 'danger',
                    'message' => 'Username dan Password Salah!'
                ])->withInput();
        }

    }

    public function logout()
    {
        auth('user')->logout();
        return redirect()->route('index-login')->with([
            'status' => 'success',
            'message' => 'Logout berhasil!'
        ]);
    }


}
