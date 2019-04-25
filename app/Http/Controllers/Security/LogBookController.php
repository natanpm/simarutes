<?php
namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use App\Http\Controllers\RegisterController;
use App\LogMasuk;
use App\SuratKeluarBarang;
use Illuminate\Http\Request;

class LogBookController extends Controller
{
    public function indexLogBook(){
         $pesan = SuratKeluarBarang::where([
           'statusSurat'=>0,
           'tanggal'=> date('Y-m-d'),
           
        ])->get()->count();

         $content = [
            'pesan' => $pesan,
  
        ];

        return view('Security/indexLogBook',compact('content'));

    }

    public function lihatLogBook(Request $request){

         $pesan = SuratKeluarBarang::where([
           'statusSurat'=>0,
           'tanggal'=> date('Y-m-d'),
           
        ])->get()->count();

         $content = [
            'pesan' => $pesan,
  
        ];

        $logs = LogMasuk::where([
           'idLokasi' => auth('user')->user()->idLokasi,
            'statusLog' => 1,
        ])->get();

        $raw = array();

        foreach ($logs as $log) {
            if (LogBookController::checkTimes(substr($request->tanggal, 0, 10), substr($request->tanggal, 13, 10), $log->tanggalMasuk)) {
                array_push($raw, $log);
            };
        }

        if (!$raw) {
            return redirect()->route('get-securityIndexLogBook')
                ->with([
                    'status' => 'warning',
                    'message' => 'Tidak terdapat data log pada rentang tanggal tersebut!'
                ])->withInput();
        }

        $logs = collect($raw)->sortBy('tanggal');

        return view('Security/logBook',compact('logs','content'));
    }

        public function logMelebihiWaktu(Request $request){

             $pesan = SuratKeluarBarang::where([
           'statusSurat'=>0,
           'tanggal'=> date('Y-m-d'),
           
        ])->get()->count();

         $content = [
            'pesan' => $pesan,
  
        ];

        $logs = LogMasuk::where([
           'idLokasi' => auth('user')->user()->idLokasi,
            'statusLog' => 2,
        ])->get();

        $raw = array();

        foreach ($logs as $log) {
            if (LogBookController::checkTimes(substr($request->tanggal, 0, 10), substr($request->tanggal, 13, 10), $log->tanggalMasuk)) {
                array_push($raw, $log);
            };
        }

        return view('Security/logBelumTerselesaikan',compact('logs','content'));
    }


     
    public function keluarTervalidasi(Request $request){
         $pesan = SuratKeluarBarang::where([
           'statusSurat'=>0,
           'tanggal'=> date('Y-m-d'),
           
        ])->get()->count();

         $content = [
            'pesan' => $pesan,
  
        ];

        $logs = LogMasuk::where([
           'idLokasi' => auth('user')->user()->idLokasi,
            'statusLog' => 1,
            'tanggalKeluar' => date('Y-m-d'),
        ])->get();

        date_default_timezone_set('Asia/Jakarta');
        $raw = array();

        return view('Security/logBook',compact('logs','content'));
    }

    public function checkTimes($tanggalMulai, $tanggalBerakhir, $tanggalSekarang)
    {
        $mulai = strtotime($tanggalMulai);
        $berakhir = strtotime($tanggalBerakhir);
        $sekarang = strtotime($tanggalSekarang);
        return (($sekarang >= $mulai) && ($sekarang <= $berakhir));
    }
}
