<?php

namespace App\Http\Controllers\Gm;

use App\Http\Controllers\Controller;
use App\SuratMasuk;
use App\BeritaSimaru;
use Illuminate\Support\Facades\Storage;


class HomeController extends Controller
{
    public function index()
    {
        $surats = SuratMasuk::where([
           'statusSurat' => 2,
           'validate1' => 1,
           'validate2' => 1,
        ])->get();

        $berita = BeritaSimaru::where([
            'statusBerita' => 1
        ])->get()->first();

        return view('Gm/home',compact('surats','berita'));
    }

    public function lihatSOP(){
        $exist = Storage::exists("SOP/SOP-GM-WITEL.pdf");

        if (!$exist) {
            return redirect()->back()
                ->with([
                    'status' => 'warning',
                    'message' => 'SOP Tidak ditemukan atau telah dipindahkan!'
                ]);
        }

        return response()->file(Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix() . "SOP/SOP-GM-WITEL.pdf");
    }
}
