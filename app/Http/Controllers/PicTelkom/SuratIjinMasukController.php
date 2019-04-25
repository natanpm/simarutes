<?php

namespace App\Http\Controllers\PicTelkom;

use App\Forwarding;
use App\Http\Controllers\Controller;
use App\SuratMasuk;
use App\Waspang;

class SuratIjinMasukController extends Controller
{
    public function indexLihatSurat()
    {
        $arraySurats = array();
        $arrayForwards = array();

        $raws = Waspang::where([
            'idPicTelkom' => auth('user')->user()->pengguna->picTelkom->id
        ])->get();

        $rawsForward = Forwarding::where([
            'idPicTelkom' => auth('user')->user()->pengguna->picTelkom->id
        ])->get();

        foreach ($raws as $surat) {
            if ($surat->suratMasuk->statusSurat == 2) {
                array_push($arraySurats, $surat->suratMasuk);
            }
        }
        foreach ($rawsForward as $surat) {
            if ($surat->suratMasuk->statusSurat == 2) {
                array_push($arrayForwards, $surat->suratMasuk);
            }
        }

        return view('PicTelkom/lihatSuratMasuk', compact('arraySurats', 'arrayForwards'));
    }

    public function detailSurat($id)
    {
        $surat = SuratMasuk::where([
            'id' => $id,
        ])->get()->first();

        if (!$surat) {
            return redirect()->route('get-indexLihatSurat')
                ->with([
                    'status' => 'warning',
                    'message' => 'Tidak terdapat surat dengan ID tersebut!'
                ]);
        }

        $arrayK1 = array();
        $arrayK2 = array();
        $arrayK3 = array();
        $arrayL1 = array();
        $arrayL2 = array();
        $arrayL3 = array();


        $max = $surat->petugas->count();
        $selector = 0;
        $counter = 0;

        if ($max != 0) {
            for ($i = 0; $i < 10; $i++) {
                for ($k = 0; $k < 3; $k++) {
                    if ($selector == 0) {
                        array_push($arrayK1, $surat->petugas[$counter++]->picMitra->nama);
                        $selector++;
                    } else if ($selector == 1) {
                        array_push($arrayK2, $surat->petugas[$counter++]->picMitra->nama);
                        $selector++;
                    } else if ($selector == 2) {
                        array_push($arrayK3, $surat->petugas[$counter++]->picMitra->nama);
                        $selector = 0;
                    }
                    if ($counter == $max) {
                        break;
                    }
                }
                if ($counter == $max) {
                    break;
                }
            }
        }

        $selector = 0;

        foreach ($surat->pekerjaan->lokasiKerja as $lokasi) {
            if ($selector == 0) {
                array_push($arrayL1, $lokasi->lokasi->lokasi);
                $selector++;
            } else if ($selector == 1) {
                array_push($arrayL2, $lokasi->lokasi->lokasi);
                $selector++;
            } else {
                array_push($arrayL3, $lokasi->lokasi->lokasi);
                $selector = 0;
            }
        }

        $tanggal = SuratIjinMasukController::formatTanggalIndo(substr($surat->updated_at,0,10));
        $tanggalMulai = SuratIjinMasukController::formatTanggalIndo($surat->pekerjaan->tanggalMulai);
        $tanggalBerakhir = SuratIjinMasukController::formatTanggalIndo($surat->pekerjaan->tanggalBerakhir);

        $tahun = substr($surat->nomorSurat, -4);
        $angka = str_replace($tahun, '', $surat->nomorSurat);
        return view('PicTelkom/detailSurat', compact('surat', 'angka', 'tahun', 'tanggal', 'tanggalMulai', 'tanggalBerakhir', 'arrayK1', 'arrayK2', 'arrayK3', 'arrayL1', 'arrayL2', 'arrayL3'));

    }

    function formatTanggalIndo($tanggal)
    {
        $bulan = array(
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $split = explode('-', $tanggal);
        return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
    }
}
