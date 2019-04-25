<?php

namespace App\Http\Controllers\SuperValidator;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\SuratMasuk;
use App\BeritaSimaru;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $content = [
            'jumlahSurat' => DB::table('suratMasuk')->get()->count(),
            'suratTerValidasi' => DB::table('suratMasuk')->where('statusSurat',2)->count(),
            'suratTakTervalidasi' => DB::table('suratMasuk')->where([
                ['statusSurat', '<', 2]
            ])->count(),

            'suratNonAktif' => DB::table('suratMasuk')->where('statusSurat', 4)->count(),
            'suratRecycled' => DB::table('suratMasuk')->where([
                ['statusSurat',3]
            ])->count(),
        ];

        $surats = SuratMasuk::where([
            ['validate2','=',0],
            ['statusSurat','=',1]
        ])->get();

        $berita = BeritaSimaru::where([
            'statusBerita' => 1
        ])->get()->first();
        return view('SuperValidator/home', compact('content','surats','berita'));
    }

    public function lihatSOP(){
        $exist = Storage::exists("SOP/SOP-SUPERVALIDATOR.pdf");

        if (!$exist) {
            return redirect()->back()
                ->with([
                    'status' => 'warning',
                    'message' => 'SOP Tidak ditemukan atau telah dipindahkan!'
                ]);
        }

        return response()->file(Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix() . "SOP/SOP-SUPERVALIDATOR.pdf");
    }
}
