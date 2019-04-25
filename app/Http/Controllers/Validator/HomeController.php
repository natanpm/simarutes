<?php

namespace App\Http\Controllers\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\BeritaSimaru;
use App\SuratMasuk;
use Illuminate\Support\Facades\Storage;


class HomeController extends Controller
{
    public function index()
    {
        $content = [
            'jumlahSurat' => DB::table('suratMasuk')->get()->count(),
            'suratTervalidasi' => DB::table('suratMasuk')->where('statusSurat',2)->count(),
            'suratTakTervalidasi' => DB::table('suratMasuk')->where([
                ['statusSurat', '<' , 2]
            ])->count(),

            'suratNonAktif' => DB::table('suratMasuk')->where('statusSurat', 4)->count(),
            'suratRevisi' => DB::table('suratMasuk')->where([
                ['statusSurat',3]
            ])->count(),
        ];

        $suratPending = SuratMasuk::where([
            ['statusSurat', '=', 0],
            ['validate1', '=', 0]
        ])->get();

        $suratRevisi = SuratMasuk::where([
            ['statusSurat', '=', 3],
        ])->get();

        $berita = BeritaSimaru::where([
            'statusBerita' => 1
        ])->get()->first();
        return view('Validator/home', compact('content','suratPending','suratRevisi','berita'));
    }

    public function lihatSOP(){
        $exist = Storage::exists("SOP/SOP-VALIDATOR.pdf");

        if (!$exist) {
            return redirect()->back()
                ->with([
                    'status' => 'warning',
                    'message' => 'SOP Tidak ditemukan atau telah dipindahkan!'
                ]);
        }

        return response()->file(Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix() . "SOP/SOP-VALIDATOR.pdf");
    }
}
