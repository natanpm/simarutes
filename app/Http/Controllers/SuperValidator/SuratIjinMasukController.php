<?php

namespace App\Http\Controllers\SuperValidator;

use App\Http\Controllers\Controller;
use App\SuratMasuk;

class SuratIjinMasukController extends Controller
{
    public function indexLihatSurat()
    {
        $surats = SuratMasuk::all();
        return view('SuperValidator/lihatSuratMasuk', compact('surats'));
    }

    public function suratTervalidasi()
    {
        $surats = SuratMasuk::where([
            'statusSurat' => 2, ]) -> get();
        return view('SuperValidator/lihatSuratMasuk', compact('surats'));
    }

    public function suratBelumTervalidasi()
    {
        $surats = SuratMasuk::where (
            'statusSurat' , '<', 2 ) -> get();
        return view('SuperValidator/lihatSuratMasuk', compact('surats'));
    }

    public function suratRevisi()
    {
        $surats = SuratMasuk::where ([
            'statusSurat' => 3, ]) -> get();
        return view('SuperValidator/lihatSuratMasuk', compact('surats'));
    }

     public function suratNonaktif()
    {
        $surats = SuratMasuk::where ([
            'statusSurat' => 4, ]) -> get();
        return view('SuperValidator/lihatSuratMasuk', compact('surats'));
    }

    public function validasiSurat($id)
    {

        $surat = SuratMasuk::where([
            'id' => $id
        ])->get()->first();

        if (!$surat) {
            return redirect()->route('get-superValidatorIndexLihatSurat')
                ->with([
                    'status' => 'danger',
                    'message' => 'Surat dengan ID tersebut tidak ditemukan!'
                ]);
        }


        $tahun = substr($surat->nomorSurat, -4);
        $angka = str_replace($tahun, '', $surat->nomorSurat);

        if ($surat->statusSurat == 1 && $surat->validate1 == 1) {
            $surat->update([
                'statusSurat' => 2,
                'validate2' => 1
            ]);
            return redirect()->back()
                ->with([
                    'status' => 'success',
                    'message' => 'Surat Tel. ' . $angka . '/SIMARU/SBS/' . $tahun . ' berhasil divalidasi!'
                ]);
        } else if ($surat->statusSurat != 2 && $surat->validate1 == 0) {
            return redirect()->back()
                ->with([
                    'status' => 'danger',
                    'message' => 'Surat Tel. ' . $angka . '/SIMARU/SBS/' . $tahun . ' belum divalidasi oleh validator!'
                ]);
        }

        return redirect()->back()
            ->with([
                'status' => 'warning',
                'message' => 'Surat Tel. ' . $angka . '/SIMARU/SBS/' . $tahun . ' sudah divalidasi!'
            ]);
    }

    public function batalkanValidasiSurat($id)
    {
        $surat = SuratMasuk::where([
            'id' => $id
        ])->get()->first();

        if (!$surat) {
            return redirect()->back()
                ->with([
                    'status' => 'danger',
                    'message' => 'Surat dengan ID tersebut tidak ditemukan!'
                ]);
        }

        $tahun = substr($surat->nomorSurat, -4);
        $angka = str_replace($tahun, '', $surat->nomorSurat);

        if ($surat->validate1 == 1) {
            $surat->update([
                'statusSurat' => 3,
                'validate1' => 0,
                'validate2' => 0
            ]);

            return redirect()->back()
                ->with([
                    'status' => 'danger',
                    'message' => 'Surat Tel. ' . $angka . '/SIMARU/SBS/' . $tahun . ' validasi dibatalkan!'
                ]);
        }

        return redirect()->back()
            ->with([
                'status' => 'warning',
                'message' => 'Surat Tel. ' . $angka . '/SIMARU/SBS/' . $tahun . ' belum divalidasi!'
            ]);
    }

    public function detailSurat($id)
    {
        $surat = SuratMasuk::where([
            'id' => $id,
        ])->get()->first();


        if (!$surat) {
            return redirect()->route('get-validatorIndexLihatSurat')
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

        $tanggal = SuratIjinMasukController::formatTanggalIndo($surat->pekerjaan->tanggalMulai);
        $tanggalMulai = SuratIjinMasukController::formatTanggalIndo($surat->pekerjaan->tanggalMulai);
        $tanggalBerakhir = SuratIjinMasukController::formatTanggalIndo($surat->pekerjaan->tanggalBerakhir);

        $tahun = substr($surat->nomorSurat, -4);
        $angka = str_replace($tahun, '', $surat->nomorSurat);
        return view('SuperValidator/detailSurat', compact('surat', 'angka', 'tahun', 'tanggal', 'tanggalMulai', 'tanggalBerakhir', 'arrayK1', 'arrayK2', 'arrayK3', 'arrayL1', 'arrayL2', 'arrayL3'));
    }

    public function cetakSurat($id)
    {
        $surat = SuratMasuk::where([
            'id' => $id,
        ])->get()->first();


        if (!$surat) {
            return redirect()->route('get-validatorIndexLihatSurat')
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

        $tanggal = SuratIjinMasukController::formatTanggalIndo($surat->pekerjaan->tanggalMulai);
        $tanggalMulai = SuratIjinMasukController::formatTanggalIndo($surat->pekerjaan->tanggalMulai);
        $tanggalBerakhir = SuratIjinMasukController::formatTanggalIndo($surat->pekerjaan->tanggalBerakhir);

        $tahun = substr($surat->nomorSurat, -4);
        $angka = str_replace($tahun, '', $surat->nomorSurat);
        return view('SuperValidator/cetakSurat', compact('surat', 'angka', 'tahun', 'tanggal', 'tanggalMulai', 'tanggalBerakhir', 'arrayK1', 'arrayK2', 'arrayK3', 'arrayL1', 'arrayL2', 'arrayL3'));
    }


     public function matikanSurat($id)
    {
        $surat = SuratMasuk::where([
            'id' => $id
        ])->get()->first();

        if (!$surat) {
            return redirect()->back()
                ->with([
                    'status' => 'danger',
                    'message' => 'Surat dengan ID tersebut tidak ditemukan!'
                ]);
        }

        $tahun = substr($surat->nomorSurat, -4);
        $angka = str_replace($tahun, '', $surat->nomorSurat);

        if ($surat->validate1 == 1) {
            $surat->update([
                'statusSurat' => 4,
                'validate1' => 1,
                'validate2' => 1
            ]);

            return redirect()->back()
                ->with([
                    'status' => 'danger',
                    'message' => 'Surat Tel. ' . $angka . '/SIMARU/SBS/' . $tahun . ' surat di non-aktifkan !'
                ]);
        }

        return redirect()->back()
            ->with([
                'status' => 'warning',
                'message' => 'Surat Tel. ' . $angka . '/SIMARU/SBS/' . $tahun . ' surat sudah no-aktif atau belum tervalidasi !'
            ]);
    }

     public function aktifkanSurat($id)
    {

        $surat = SuratMasuk::where([
            'id' => $id
        ])->get()->first();

        if (!$surat) {
            return redirect()->back()
                ->with([
                    'status' => 'danger',
                    'message' => 'Surat dengan ID tersebut tidak ditemukan!'
                ]);
        
        }


        $tahun = substr($surat->nomorSurat, -4);
        $angka = str_replace($tahun, '', $surat->nomorSurat);

        if ($surat->statusSurat == 4 && $surat->validate1 == 1) {
            $surat->update([
                'statusSurat' => 2,
                'validate2' => 1,
                'validate1' => 1,
              
            ]);
            return redirect()->back()
                ->with([
                    'status' => 'success',
                    'message' => 'Surat Tel. ' . $angka . '/SIMARU/SBS/' . $tahun . ' berhasil diaktifkan !'
                ]);
        } else if ($surat->statusSurat != 4 && $surat->validate1 == 1) {
            return redirect()->back()
                ->with([
                    'status' => 'danger',
                    'message' => 'Surat Tel. ' . $angka . '/SIMARU/SBS/' . $tahun . ' surat sudah aktif !'
                ]);
        }

        else if ($surat->statusSurat != 4 && $surat->validate1 == 0) {
            return redirect()->back()
                ->with([
                    'status' => 'danger',
                    'message' => 'Surat Tel. ' . $angka . '/SIMARU/SBS/' . $tahun . ' surat belum divalidasi !'
                ]);
        }
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
