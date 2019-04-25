<?php

namespace App\Http\Controllers\PicTelkom;

use App\Forwarding;
use App\Http\Controllers\Controller;
use App\LogMasuk;
use App\BeritaSimaru;
use App\SuratMasuk;
use App\Waspang;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $raws = Waspang::where([
            'idPicTelkom' => auth('user')->user()->pengguna->picTelkom->id,
        ])->get();

        $rawsForward = Forwarding::where([
            'idPicTelkom' => auth('user')->user()->pengguna->picTelkom->id,
        ])->get();

        $surats = array();
        $suratForwards = array();
        date_default_timezone_set('Asia/Jakarta');
        foreach ($raws as $waspang) {
            if (HomeController::checkTimes($waspang->suratMasuk->pekerjaan->tanggalMulai, $waspang->suratMasuk->pekerjaan->tanggalBerakhir, date('Y-m-d')) && $waspang->suratMasuk->statusSurat == 2) {
                array_push($surats, $waspang->suratMasuk);
            }
        }

        foreach ($rawsForward as $waspang) {
            if (HomeController::checkTimes($waspang->suratMasuk->pekerjaan->tanggalMulai, $waspang->suratMasuk->pekerjaan->tanggalBerakhir, date('Y-m-d')) && $waspang->suratMasuk->statusSurat == 2) {
                array_push($suratForwards, $waspang->suratMasuk);
            }
        }

        $tamus = array();
        foreach ($surats as $surat) {
            foreach ($surat->petugas as $pic) {
                array_push($tamus, $pic);
            }
        }

        $tamuMasuk = 0;
        foreach ($tamus as $tamu) {
            $check = LogMasuk::where([
                'tanggalMasuk' => date('Y-m-d'),
                'idPetugas' => $tamu->id,
            ])->get()->first();

            if($check){
                $tamuMasuk++;
            }
        }

        $tamuKeluar = 0;
        foreach ($tamus as $tamu) {
            $check = LogMasuk::where([
                'tanggalMasuk' => date('Y-m-d'),
                'idPetugas' => $tamu->id,
                'statusLog' => 1
            ])->get()->first();

            if($check){
                $tamuKeluar++;
            }
        }

        $logs = LogMasuk::where([
            ['statusLog','<>',1],
        ])->get();

        $logBelumSelesai = 0;
        $logDiluarBatas = 0;
        $logExtend = 0;
        foreach ($logs as $log){
            foreach ($log->suratMasuk->waspang as $waspang)
            if($waspang->idPicTelkom == auth('user')->user()->pengguna->idPicTelkom){
                if($log->statusLog == 2){
                    $logDiluarBatas++;
                }else if($log->statusLog == 3){
                       $logExtend++;
                }
                $logBelumSelesai++;
            }
        }

        $berita = BeritaSimaru::where([
            'statusBerita' => 1
        ])->get()->first();

        $content = [
            'suratHariIni' => (count($surats)+count($suratForwards)),
            'jumlahTamu' => count($tamus),
            'tamuMasuk' => $tamuMasuk,
            'tamuKeluar' => $tamuKeluar,
            'logBelumSelesai' =>$logBelumSelesai,
            'logDiluarBatas' => $logDiluarBatas,
            'logExtend' => $logExtend,
        ];

        return view('PicTelkom/home', compact('content', 'surats','suratForwards','berita'));
    }

    public function lihatSOP(){
        $exist = Storage::exists("SOP/SOP-PIC-TELKOM.pdf");

        if (!$exist) {
            return redirect()->back()
                ->with([
                    'status' => 'warning',
                    'message' => 'SOP Tidak ditemukan atau telah dipindahkan!'
                ]);
        }

        return response()->file(Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix() . "SOP/SOP-PIC-TELKOM.pdf");
    }

    function checkTimes($tanggalMulai, $tanggalBerakhir, $tanggalSekarang)
    {

        $mulai = strtotime($tanggalMulai);
        $berakhir = strtotime($tanggalBerakhir);
        $sekarang = strtotime($tanggalSekarang);

        return (($sekarang >= $mulai) && ($sekarang <= $berakhir));
    }
}
