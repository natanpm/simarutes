<?php

namespace App\Http\Controllers\SuperValidator;

use App\Http\Controllers\Controller;
use App\LogMasuk;
use App\Lokasi;
use Illuminate\Http\Request;

class LogHarianController extends Controller
{
    public function indexLogHarian()
    {
        $lokasis = Lokasi::all();
        return view('SuperValidator/indexLogHarian', compact('lokasis'));
    }

    public function logHarian(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');

        if($request->lokasi == 1){
            $logs = LogMasuk::where([
                'tanggalMasuk' => date('Y-m-d'),
            ])->get()->sortBy('idLokasi');
        }
        else{
            $logs = LogMasuk::where([
                'tanggalMasuk' => date('Y-m-d'),
                'idLokasi' => $request->lokasi,
            ])->get();
        }

        if(!$logs->first()){
            $lokasi = Lokasi::where('id',$request->lokasi)->value('lokasi');

            return redirect()->route('get-superValidatorIndexLogHarian')
                ->with([
                    'status' => 'warning',
                    'message' => 'Tidak ada log pada '.$lokasi.' hari ini!'
                ])->withInput();
        }

        return view('SuperValidator/logHarian', compact('logs', 'lokasi'));
    }

    public function lihatPesanExtend($id){
        $log = LogMasuk::where([
            ['id' ,'=', $id],
            ['pesan','<>','-']
        ])->get()->first();

        if (!$log) {
            return redirect()->back()
                ->with([
                    'status' => 'warning',
                    'message' => 'Log dengan ID tersebut tidak ter extend!'
                ]);
        }

        return view('SuperValidator/lihatPesanExtend', compact('log'));
    }

}
