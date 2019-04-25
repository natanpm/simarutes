<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use App\SuratMasuk;
use App\LogMasuk;
use App\LokasiKerja;
use App\BeritaSimaru;
use App\Petugas;
use App\SuratKeluarBarang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


class HomeController extends Controller
{
    public function index()
    {

         $pesan = SuratKeluarBarang::where([
           'statusSurat'=>0,
           'tanggal'=> date('Y-m-d'),
           
        ])->get()->count();


        $lokasiKerjas = LokasiKerja::all();
        $pekerjaans = array();
        $idSurats = array();
        $surats = array();
        $hasil = 0;

        date_default_timezone_set('Asia/Jakarta');
        foreach ($lokasiKerjas as $lokasiKerja) {
            if ($lokasiKerja->idLokasi == 1 || $lokasiKerja->idLokasi == auth('user')->user()->idLokasi) {
                array_push($pekerjaans, $lokasiKerja->pekerjaan);
            }
        }
        foreach ($pekerjaans as $pekerjaan) {
            if (HomeController::checkTimes($pekerjaan->tanggalMulai, $pekerjaan->tanggalBerakhir, date('Y-m-d'))) {
                array_push($idSurats, $pekerjaan->idSuratMasuk);
            };
        }

        foreach ($idSurats as $id) {
            $surat = SuratMasuk::where([
                'id' => $id,
                'statusSurat' => 2,
            ])->value('id');
            if ($surat) {
                array_push($surats, $surat);
            }
        }

        foreach ($surats as $idSurat) {
            $kelompok = Petugas::where([
                'idSuratMasuk' => $idSurat,
            ])->get()->count();
            $hasil += $kelompok;
        };

        $logBelumTerselesaikan = LogMasuk::where([
            ['statusLog', '<>', 1],
            ['idLokasi', '=', auth('user')->user()->idLokasi]
        ])->get()->count();

        $logExtend = LogMasuk::where([
            ['statusLog', '=', 3],
            ['idLokasi', '=', auth('user')->user()->idLokasi]
        ])->get()->count();

        $logMasuk = LogMasuk::where([
            'tanggalMasuk' => date('Y-m-d'),
            'idLokasi' => auth('user')->user()->idLokasi,
        ])->get()->count();

        $logKeluar = LogMasuk::where([
            'tanggalMasuk' => date('Y-m-d'),
            'idLokasi' => auth('user')->user()->idLokasi,
            'statusLog' => 1
        ])->get()->count();

        $logMelebihiBatas = LogMasuk::where([
            'statusLog' => 2,
            'idLokasi' => auth('user')->user()->idLokasi,
        ])->get()->count();

        $content = [
            'pesan' =>$pesan,
            'jumlahTamuHariIni' => $hasil,
            'tamuMasukHariIni' => $logMasuk,
            'tamuKeluarHariIni' => $logKeluar,
            'tamuDiluarBatas' => $logMelebihiBatas,
            'logBelumTerselesaikan' => $logBelumTerselesaikan,
            'logExtend' => $logExtend,
        ];

        $berita = BeritaSimaru::where([
            'statusBerita' => 1
        ])->get()->first();

        return view('Security/home', compact('content','berita'));
    }

    public function lihatSOP(){
        $exist = Storage::exists("SOP/SOP-SECURITY.pdf");

        if (!$exist) {
            return redirect()->back()
                ->with([
                    'status' => 'warning',
                    'message' => 'SOP Tidak ditemukan atau telah dipindahkan!'
                ]);
        }

        return response()->file(Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix() . "SOP/SOP-SECURITY.pdf");
    }

    public function checkTimes($tanggalMulai, $tanggalBerakhir, $tanggalSekarang)
    {

        $mulai = strtotime($tanggalMulai);
        $berakhir = strtotime($tanggalBerakhir);
        $sekarang = strtotime($tanggalSekarang);

        return (($sekarang >= $mulai) && ($sekarang <= $berakhir));
    }

}
