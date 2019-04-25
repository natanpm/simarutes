<?php

namespace App\Http\Controllers;

class UnauthorizedAccess extends Controller
{
    public function index()
    {
        return view('unauthorizedAccess');
    }

    public function kembali()
    {
        if(auth('user')->user()){
            return redirect()->route(auth('user')->user()->role.'-home');
        }

        return redirect()->route('index-login');
    }
}
