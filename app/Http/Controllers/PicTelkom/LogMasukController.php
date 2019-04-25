<?php

namespace App\Http\Controllers\PicTelkom;

use App\Http\Controllers\Controller;
use App\LogMasuk;

class LogMasukController extends Controller
{
    public function logPetugas()
    {
        date_default_timezone_set('Asia/Jakarta');
        $raw = LogMasuk::where([
            ['tanggalMasuk','=',date('Y-m-d')],
            ['statusLog','<>',3]
        ])->get();

        $logs = array();
        foreach ($raw as $log){
            foreach ($log->suratMasuk->waspang as $waspang){
                if($waspang->idPicTelkom == auth('user')->user()->pengguna->picTelkom->id){
                    array_push($logs,$log);
                }
            }
        }

        return view('PicTelkom/logPetugas', compact('logs'));
    }

    public function logMasukTervalidasi()
    {
        date_default_timezone_set('Asia/Jakarta');
        $raw = LogMasuk::where([
            ['tanggalMasuk','=',date('Y-m-d')],
            ['statusLog', 0]
        ])->get();

        $logs = array();
        foreach ($raw as $log){
            foreach ($log->suratMasuk->waspang as $waspang){
                if($waspang->idPicTelkom == auth('user')->user()->pengguna->picTelkom->id){
                    array_push($logs,$log);
                }
            }
        }

        return view('PicTelkom/logPetugas', compact('logs'));
    }

    public function logKeluarTervalidasi()
    {
        date_default_timezone_set('Asia/Jakarta');
        $raw = LogMasuk::where([
            ['tanggalMasuk','=',date('Y-m-d')],
            ['statusLog', 1]
        ])->get();

        $logs = array();
        foreach ($raw as $log){
            foreach ($log->suratMasuk->waspang as $waspang){
                if($waspang->idPicTelkom == auth('user')->user()->pengguna->picTelkom->id){
                    array_push($logs,$log);
                }
            }
        }

        return view('PicTelkom/logPetugas', compact('logs'));
    }

    public function logBelumTerselesaikan()
    {
        date_default_timezone_set('Asia/Jakarta');
        $raw = LogMasuk::where([
            ['statusLog','<>', 1]
        ])->get();

        $logs = array();
        foreach ($raw as $log){
            foreach ($log->suratMasuk->waspang as $waspang){
                if($waspang->idPicTelkom == auth('user')->user()->pengguna->picTelkom->id){
                    array_push($logs,$log);
                }
            }
        }

        return view('PicTelkom/logPetugas', compact('logs'));
    }

    public function logMelebihiWaktu()
    {
        date_default_timezone_set('Asia/Jakarta');
        $raw = LogMasuk::where([
            ['statusLog', 2]
        ])->get();

        $logs = array();
        foreach ($raw as $log){
            foreach ($log->suratMasuk->waspang as $waspang){
                if($waspang->idPicTelkom == auth('user')->user()->pengguna->picTelkom->id){
                    array_push($logs,$log);
                }
            }
        }

        return view('PicTelkom/logPetugas', compact('logs'));
    }


    public function logPetugasExtend()
    {
        date_default_timezone_set('Asia/Jakarta');
        $raw = LogMasuk::where([
            ['statusLog','=',3]
        ])->get();

        $logs = array();
        foreach ($raw as $log){
            foreach ($log->suratMasuk->waspang as $waspang){
                if($waspang->idPicTelkom == auth('user')->user()->pengguna->picTelkom->id){
                    array_push($logs,$log);
                }
            }
        }

        return view('PicTelkom/logPetugasExtend', compact('logs'));
    }

    public function lihatPesanExtend($id)
    {
        $log = LogMasuk::where([
            ['id','=', $id],
            ['pesan', '<>' , '-']
        ])->get()->first();

        if (!$log) {
            return redirect()->back()
                ->with([
                    'status' => 'warning',
                    'message' => 'Log dengan ID tersebut tidak ter extend!'
                ]);
        }
        return view('PicTelkom/lihatPesanExtend', compact('log'));
    }
}
