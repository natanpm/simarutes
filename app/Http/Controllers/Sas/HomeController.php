<?php

namespace App\Http\Controllers\Sas;

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

        return view('Sas/home',compact('surats','berita'));
    }

    public function lihatSOP(){
        $exist = Storage::exists("SOP/SOP-SAS.pdf");

        if (!$exist) {
            return redirect()->back()
                ->with([
                    'status' => 'warning',
                    'message' => 'SOP Tidak ditemukan atau telah dipindahkan!'
                ]);
        }

        return response()->file(Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix() . "SOP/SOP-SAS.pdf");
    }
}
