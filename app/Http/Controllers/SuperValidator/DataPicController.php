<?php

namespace App\Http\Controllers\SuperValidator;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\PicTelkom;
use App\PicMitra;

class DataPicController extends Controller
{
    public function lihatPicTelkom()
    {
        $picTelkoms = PicTelkom::all();

        return view('SuperValidator/lihatPicTelkom', compact('picTelkoms'));
    }

    public function lihatPicTkmNetra()
    {
        $picTkmNetra = PicMitra::where([
            'idPerusahaan' => 4
        ])->get();

        return view('SuperValidator/lihatPicTkmNetra', compact('picTkmNetra'));
    }

    public function lihatPicTelkomAkses()
    {
        $picTas = PicMitra::where([
            ['idPerusahaan', 2],
        ])->get();

        return view('SuperValidator/lihatPicTelkomAkses', compact('picTas'));
    }
    public function lihatUnitTelkomAkses()
    {
        $unitTas = DB::table('unitPerusahaan')->where([
            ['idPerusahaan', 2],
        ])->get();
        return view('SuperValidator/lihatUnitTelkomAkses', compact('unitTas'));
    }

    public function lihatPicSigma()
    {
        $picSigmas = PicMitra::where([
            ['idPerusahaan', 3],
        ])->get();

        return view('SuperValidator/lihatPicSigma', compact('picSigmas'));
    }

    public function lihatUnitSigma()
    {
        $unitSigmas = DB::table('unitPerusahaan')->where([
            ['idPerusahaan', 3],
        ])->get();
        return view('SuperValidator/lihatUnitSigma', compact('unitSigmas'));
    }

    public function lihatPicMitraUmum()
    {
        $picMitras = PicMitra::where([
            ['idPerusahaan', 1],
        ])->get();

        return view('SuperValidator/lihatPicMitra', compact('picMitras'));
    }
}
