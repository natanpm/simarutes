<?php

namespace App\Http\Controllers\Admin;

use App\BeritaSimaru;
use App\Http\Controllers\Controller;
use App\SuratMasuk;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $content = [
            'jumlahSurat' => DB::table('suratMasuk')->get()->count(),
            'suratTervalidasi' => DB::table('suratMasuk')->where('statusSurat', 2)->count(),
            'suratBelumTervalidasi' => DB::table('suratMasuk')->where('statusSurat', '<', 2)->count(),
            'suratNonAktif' => DB::table('suratMasuk')->where('statusSurat', 4)->count(),
            'suratRevisi' => DB::table('suratMasuk')->where([
                ['statusSurat', 3]
            ])->count(),
        ];

        $suratRevisi = SuratMasuk::where([
            ['statusSurat', '=', 3],
        ])->get();

        $suratPending = SuratMasuk::where([
            ['statusSurat', '=', 0],
        ])->get();

        $berita = BeritaSimaru::where([
            'statusBerita' => 1
        ])->get()->first();

        return view('Admin/home', compact('content', 'suratRevisi','suratPending','berita'));
    }

    public function lihatSOP(){
        $exist = Storage::exists("SOP/SOP-ADMIN.pdf");

        if (!$exist) {
            return redirect()->back()
                ->with([
                    'status' => 'warning',
                    'message' => 'SOP Tidak ditemukan atau telah dipindahkan!'
                ]);
        }

        return response()->file(Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix() . "SOP/SOP-ADMIN.pdf");
    }


}
