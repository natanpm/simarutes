<?php

namespace App\Http\Controllers\SuperValidator;

use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function lihatUser()
    {
        $users = User::where([
            ['role', 'security'],
        ])->get();

        return view('SuperValidator/lihatPengguna', compact('users', 'lokasis'));
    }

    public function lihatUserPicTelkom()
    {
        $users = User::where([
            ['role', 'picTelkom'],
        ])->get();

        return view('SuperValidator/lihatPenggunaPicTelkom', compact('users'));
    }

}
