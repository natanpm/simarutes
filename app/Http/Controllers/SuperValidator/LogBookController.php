<?php

namespace App\Http\Controllers\SuperValidator;

use App\Http\Controllers\Controller;
use App\LogMasuk;
use App\Lokasi;
use Illuminate\Http\Request;

class LogBookController extends Controller
{
    public function indexLogBook()
    {
        $lokasis = Lokasi::all();
        return view('SuperValidator/indexLogBook', compact('lokasis'));
    }

    public function logBook(Request $request)
    {
        if ($request->lokasi == 1) {
            $logs = LogMasuk::where([
                'statusLog' => 1
            ])->get()->sortBy('idLokasi');
        } else {
            $logs = LogMasuk::where([
                'idLokasi' => $request->lokasi,
                'statusLog' => 1
            ])->get();
        }

        $raw = array();

        foreach ($logs as $log) {
            if (LogBookController::checkTimes(substr($request->tanggal, 0, 10), substr($request->tanggal, 13, 10), $log->tanggalMasuk)) {
                array_push($raw, $log);
            };
        }

        if (!$raw) {
            return redirect()->route('get-superValidatorIndexLogBook')
                ->with([
                    'status' => 'warning',
                    'message' => 'Tidak terdapat data log pada rentang tanggal tersebut!'
                ])->withInput();
        }

        $lokasi = '';
        $logs = collect($raw)->sortBy('tanggal');

        if ($request->lokasi == 1) {
            $lokasi = "ALL STO SURABAYA SELATAN";
        } else {
            $lokasi = $logs->first()->lokasi->lokasi;
        }

        return view('SuperValidator/logBook', compact('logs', 'lokasi'));
    }

    public function checkTimes($tanggalMulai, $tanggalBerakhir, $tanggalSekarang)
    {
        $mulai = strtotime($tanggalMulai);
        $berakhir = strtotime($tanggalBerakhir);
        $sekarang = strtotime($tanggalSekarang);
        return (($sekarang >= $mulai) && ($sekarang <= $berakhir));
    }

    public function lihatPesanExtend($id)
    {
        $log = LogMasuk::where([
            ['id' ,'=', $id],
            ['pesan','<>','-']
        ])->get()->first();

        if (!$log) {
            return redirect()->route('get-superValidatorLogHarian')
                ->with([
                    'status' => 'warning',
                    'message' => 'Log dengan ID tersebut tidak ter extend!'
                ]);
        }

        return view('SuperValidator/lihatPesanExtend', compact('log'));
    }
}
