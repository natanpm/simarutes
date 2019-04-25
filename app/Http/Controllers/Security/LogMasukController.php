<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use App\Petugas;
use App\SuratKeluarBarang;
use App\LogMasuk;
use Illuminate\Http\Request;

class LogMasukController extends Controller
{
    public function indexExtendLog()
    {
         $pesan = SuratKeluarBarang::where([
           'statusSurat'=>0,
           'tanggal'=> date('Y-m-d'),
           
        ])->get()->count();

         $content = [
            'pesan' => $pesan,
  
        ];

        date_default_timezone_set('Asia/Jakarta');

        $logs = LogMasuk::where([
            ['statusLog', '=', '3'],
            ['idLokasi', '=', auth('user')->user()->idLokasi],
        ])->get();

        return view('Security/extendLog', compact('logs','content'));
    }

    public function petugasMasuk($id)
    {
        $petugas = Petugas::where([
            'id' => $id,
        ])->get()->first();

        if (!$petugas) {
            return redirect()->back()
                ->with([
                    'status' => 'warning',
                    'message' => 'Petugas dengan ID tersebut tidak ditemukan!'
                ]);
        }

        if ($petugas->picMitra->statusNda == 0) {
            return redirect()->back()
                ->with([
                    'status' => 'danger',
                    'message' => 'Petugas dengan nama ' . $petugas->picMitra->nama . ' belum memiliki NDA!'
                ]);
        } else {
            if ($petugas->picMitra->nda->statusNda == 0) {
                return redirect()->back()
                    ->with([
                        'status' => 'danger',
                        'message' => 'NDA Petugas dengan nama ' . $petugas->picMitra->nama . ' sudah kadaluarsa!'
                    ]);
            }
        }

        date_default_timezone_set('Asia/Jakarta');

        if (LogMasukController::checkTimes($petugas->suratMasuk->pekerjaan->jamMasuk, $petugas->suratMasuk->pekerjaan->jamKeluar, date('H:i:s'))) {

            $checkLog = LogMasuk::where([
                ['idPetugas', '=', $petugas->id],
                ['statusLog', '<>', 1],
                'idSuratMasuk' => $petugas->idSuratMasuk,
            ])->get()->first();

            if ($checkLog) {
                return redirect()->back()
                    ->with([
                        'status' => 'warning',
                        'message' => 'Nama petugas ' . $petugas->picMitra->nama . ' memiliki log masuk di ' . $checkLog->lokasi->lokasi . ' pada tanggal ' . $checkLog->tanggalMasuk . ' Jam ' . $checkLog->masuk . ' dan belum keluar!'
                    ]);
            }

            LogMasuk::create([
                'tanggalMasuk' => date('Y-m-d'),
                'tanggalKeluar' => $petugas->suratMasuk->pekerjaan->tanggalBerakhir,
                'masuk' => date('H:i:s'),
                'keluar' => $petugas->suratMasuk->pekerjaan->jamKeluar,
                'statusLog' => 0,
                'keterangan' => '-',
                'pesan' => '-',
                'idPetugas' => $petugas->id,
                'idSuratMasuk' => $petugas->idSuratMasuk,
                'idSecurityMasuk' => auth('user')->user()->id,
                'idSecurityKeluar' => auth('user')->user()->id,
                'idLokasi' => auth('user')->user()->idLokasi,
            ]);

            return redirect()->back()
                ->with([
                    'status' => 'success',
                    'message' => 'Nama petugas ' . $petugas->picMitra->nama . ' dibolehkan masuk.'
                ]);
        };
        return redirect()->back()
            ->with([
                'status' => 'danger',
                'message' => 'Nama petugas ' . $petugas->picMitra->nama . ' tidak diperbolehkan masuk bila tidak sesuai dengan waktu yang tertera.'
            ]);
    }

    public function petugasKeluar($id)
    {
        $log = LogMasuk::where([
            'id' => $id,
        ])->get()->first();

        if (!$log) {
            return redirect()->back()
                ->with([
                    'status' => 'warning',
                    'message' => 'Log dengan ID tersebut tidak ditemukan!'
                ]);
        }

        date_default_timezone_set('Asia/Jakarta');
        if ($log->statusLog == 1) {
            return redirect()->back()
                ->with([
                    'status' => 'warning',
                    'message' => 'Petugas ' . $log->petugas->picMitra->nama . ' sudah keluar!'
                ]);
        }

        if ($log->statusLog == 3) {
            $log->update([
                'tanggalKeluar' => date('Y-m-d'),
                'keluar' => date('H:i:s'),
                'idSecurityKeluar' => auth('user')->user()->id,
                'statusLog' => 1
            ]);
        } else {
            $log->update([
                'tanggalKeluar' => date('Y-m-d'),
                'keterangan' => 'Terselesaikan',
                'keluar' => date('H:i:s'),
                'idSecurityKeluar' => auth('user')->user()->id,
                'statusLog' => 1
            ]);
        }

        return redirect()->back()
            ->with([
                'status' => 'success',
                'message' => 'Petugas ' . $log->petugas->picMitra->nama . ' diperbolehkan keluar!'
            ]);
    }

    public function logBelumTerselesaikan()
    {
         $pesan = SuratKeluarBarang::where([
           'statusSurat'=>0,
           'tanggal'=> date('Y-m-d'),
           
        ])->get()->count();

         $content = [
            'pesan' => $pesan,
  
        ];

        date_default_timezone_set('Asia/Jakarta');
        $logs = LogMasuk::where([
            ['statusLog', '<>', 1],
            ['statusLog', '<>', 3],
            ['idLokasi', '=', auth('user')->user()->idLokasi]
        ])->get();

        return view('Security/logBelumTerselesaikan', compact('logs','content'));
    }

    public function indexBeriExtend($id)
    {
         $pesan = SuratKeluarBarang::where([
           'statusSurat'=>0,
           'tanggal'=> date('Y-m-d'),
           
        ])->get()->count();

         $content = [
            'pesan' => $pesan,
  
        ];


        $log = LogMasuk::where([
            'id' => $id,
        ])->get()->first();

        if (!$log) {
            return redirect()->route('get-securityLogBelumTerselesaikan')
                ->with([
                    'status' => 'warning',
                    'message' => 'Log dengan ID tersebut tidak ditemukan!'
                ]);
        }

        if ($log->statusLog != 2) {
            return redirect()->route('get-securityLogBelumTerselesaikan')
                ->with([
                    'status' => 'warning',
                    'message' => 'Log untuk petugas ' . $log->petugas->picMitra->nama . ' tersebut tidak bisa di extend!'
                ]);
        }

        return view('Security/keteranganExtend', compact('log','content'));
    }

    public function beriExtend(Request $request)
    {
        $this->validate($request, [
            'pesan' => 'required',
        ], [
            'required' => ':Attribute tidak boleh kosong !',
        ]);


        $log = LogMasuk::where([
            'id' => $request->id,
            'statusLog' => 2,
        ])->get()->first();

        if (!$log) {
            return redirect()->route('get-securityLogBelumTerselesaikan')
                ->with([
                    'status' => 'warning',
                    'message' => 'Log dengan ID tersebut tidak ditemukan!'
                ]);
        }

        date_default_timezone_set('Asia/Jakarta');

        if($log->keterangan == '-'){
            $keterangan = "Extended 1";
            $pesanBaru = 'EXT 1.'.$request->pesan.' -' . auth('user')->user()->nama .'/'.auth('user')->user()->nik.' [' . date('Y-m-d H:i:s') . ']'."\r\n";
        }else{
            $jumlah = substr($log->keterangan,9)+1;
            $keterangan = "Extended ".$jumlah;
            $pesanBaru = $log->pesan.'EXT '.$jumlah.'.'.$request->pesan.' -' . auth('user')->user()->nama.'/'.auth('user')->user()->nik. ' [' . date('Y-m-d H:i:s') . ']'."\r\n";
        }


        $log->update([
            'statusLog' => 3,
            'keluar'=> date('H:i:s', strtotime(date('H:i:s')) + (3600 * 3)),
            'keterangan' => $keterangan,
            'pesan' => $pesanBaru
        ]);

        return redirect()->route('get-securityLogBelumTerselesaikan')
            ->with([
                'status' => 'success',
                'message' => 'Log Petugas '.$log->petugas->picMitra->nama.' berhasil di extend!'
            ]);

    }

    public function lihatPesanExtend($id)
    {
         $pesan = SuratKeluarBarang::where([
           'statusSurat'=>0,
           'tanggal'=> date('Y-m-d'),
           
        ])->get()->count();

         $content = [
            'pesan' => $pesan,
  
        ];

        $log = LogMasuk::where([
            ['id' ,'=', $id],
            ['pesan', '<>' , '-']
        ])->get()->first();

        if (!$log) {
            return redirect()->back()
                ->with([
                    'status' => 'warning',
                    'message' => 'Log dengan ID tersebut tidak ter extend!'
                ]);
        }

        return view('Security/lihatPesanExtend', compact('log','content'));
    }

    public function hapusLogMasuk($id)
    {
        $logHapus = LogMasuk::where([
            'id' => $id
        ])->get()->first();

        if (!$logHapus) {
            return redirect()->back()
                ->with([
                    'status' => 'warning',
                    'message' => 'Log dengan ID tersebut tidak ditemukan!'
                ]);
        }

        $nama = $logHapus->petugas->picMitra->nama;
        $tanggal = $logHapus->tanggal;

        $logHapus->delete();

        return redirect()->route('get-securityLogBelumTerselesaikan')
            ->with([
                'status' => 'success',
                'message' => 'Log ' . $nama . ' pada tanggal ' . $tanggal . ' Berhasil Dihapus'
            ]);
    }

    public function checkTimes($tanggalMulai, $tanggalBerakhir, $tanggalSekarang)
    {
        $mulai = strtotime($tanggalMulai);
        $berakhir = strtotime($tanggalBerakhir);
        $sekarang = strtotime($tanggalSekarang);

        if($berakhir <= $mulai) {
            if ($sekarang >= $mulai) {
                return true;
            } else if ($sekarang <= $berakhir) {
                return true;
            }
        }

        return (($sekarang >= $mulai) && ($sekarang <= $berakhir));
    }
}
