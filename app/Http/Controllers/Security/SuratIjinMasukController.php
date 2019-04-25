<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use App\LokasiKerja;
use App\Petugas;
use App\SuratMasuk;
use App\SuratKeluarBarang;
use Illuminate\Http\Request;

class SuratIjinMasukController extends Controller
{
    public function indexCariPic()

    {
         $pesan = SuratKeluarBarang::where([
           'statusSurat'=>0,
           'tanggal'=> date('Y-m-d'),
           
        ])->get()->count();

         $content = [
            'pesan' => $pesan,
  
        ];

        return view('Security/pencarianBerdasarkanNama',compact('content'));
    }

    public function indexNoSimaru()
    {
         $pesan = SuratKeluarBarang::where([
           'statusSurat'=>0,
           'tanggal'=> date('Y-m-d'),
           
        ])->get()->count();

         $content = [
            'pesan' => $pesan,
  
        ];

        return view('Security/pencarianBerdasarkanSimaru',compact('content'));
    }

    public function cariPic(Request $request)
    {
         $pesan = SuratKeluarBarang::where([
           'statusSurat'=>0,
           'tanggal'=> date('Y-m-d'),
           
        ])->get()->count();

         $content = [
            'pesan' => $pesan,
  
        ];

        if($request->nama == ''){
            return redirect()->route('get-securityIndexCariPicMitra')
                ->with([
                    'status' => 'danger',
                    'message' => 'Nama ' . $request->nama . ' tidak ditemukan!'
                ])->withInput();
        }

        $lokasiKerjas = LokasiKerja::all();
        $pekerjaans = array();
        $idSurats = array();
        $surats = array();
        $hasil = array();
        $arrayStatusNda = array();

        date_default_timezone_set('Asia/Jakarta');

        foreach ($lokasiKerjas as $lokasiKerja) {
            if ($lokasiKerja->idLokasi == 1 || $lokasiKerja->idLokasi == auth('user')->user()->idLokasi) {
                array_push($pekerjaans, $lokasiKerja->pekerjaan);
            }
        }
        foreach ($pekerjaans as $pekerjaan) {
            if (SuratIjinMasukController::checkTimes($pekerjaan->tanggalMulai, $pekerjaan->tanggalBerakhir, date('Y-m-d'))) {
                array_push($idSurats, $pekerjaan->idSuratMasuk);
            };
        }

        foreach ($idSurats as $id){
            $surat = SuratMasuk::where([
                'id' => $id,
                'statusSurat' => 2,
            ])->value('id');
            if($surat){
                array_push($surats,$surat);
            }
        }

        foreach ($surats as $idSurat) {
            $kelompok = Petugas::where([
                'idSuratMasuk' => $idSurat,
            ])->get();
            foreach ($kelompok as $pekerja) {
                if (strpos(strtolower($pekerja->picMitra->nama), strtolower($request->nama)) !== false) {
                    array_push($hasil, $pekerja);
                    if ($pekerja->picMitra->statusNda == 0){
                        array_push($arrayStatusNda, "-");
                    }elseif ($pekerja->picMitra->statusNda == 1){
                        if ($pekerja->picMitra->nda->statusNda == 0){
                            array_push($arrayStatusNda, "Kadaluarsa");
                        }elseif ($pekerja->picMitra->nda->statusNda == 1){
                            array_push($arrayStatusNda, "Aktif");
                        }
                    }
                }
            }
        }


        if ($hasil) {
            return view('Security/daftarNama', compact('hasil','arrayStatusNda','content'));
        }

        return redirect()->route('get-securityIndexCariPicMitra')
            ->with([
                'status' => 'danger',
                'message' => 'Nama ' . $request->nama . ' tidak ditemukan!'
            ])->withInput();
    }

    public function cariSimaru(Request $request)
    {

        $lokasiKerjas = LokasiKerja::all();
        $pekerjaans = array();
        $idSurats = array();
        $idSurat = null;
        $arrayStatusNda = array();


        date_default_timezone_set('Asia/Jakarta');


        foreach ($lokasiKerjas as $lokasiKerja) {
            if ($lokasiKerja->idLokasi == 1 || $lokasiKerja->idLokasi == auth('user')->user()->idLokasi) {
                array_push($pekerjaans, $lokasiKerja->pekerjaan);
            }
        }
        foreach ($pekerjaans as $pekerjaan) {
            if (SuratIjinMasukController::checkTimes($pekerjaan->tanggalMulai, $pekerjaan->tanggalBerakhir, date('Y-m-d'))) {
                array_push($idSurats, $pekerjaan->idSuratMasuk);
            };
        }

        foreach ($idSurats as $id){
            $idSurat = SuratMasuk::where([
                'id' => $id,
                'statusSurat' => 2,
                'nomorSurat' => $request->nomorSurat,
            ])->value('id');
            if($idSurat){
                break;
            }
        }

        if ($idSurat) {
            $hasil = Petugas::where([
                'idSuratMasuk' => $idSurat
            ])->get();
            foreach ($hasil as $pic) {
                if ($pic->picMitra->statusNda == 0) {
                    array_push($arrayStatusNda, "-");
                } elseif ($pic->picMitra->statusNda == 1) {
                    if ($pic->picMitra->nda->statusNda == 0) {
                        array_push($arrayStatusNda, "Kadaluarsa");
                    } elseif ($pic->picMitra->nda->statusNda == 1) {
                        array_push($arrayStatusNda, "Aktif");
                    }
                }
            }
            return view('Security/daftarNama', compact('hasil','arrayStatusNda'));
        }

        return redirect()->route('get-securityIndexCariNoSimaru')
            ->with([
                'status' => 'danger',
                'message' => 'Nomor surat ' . $request->nomorSurat . ' tidak ditemukan!'
            ])->withInput();
    }

    public function detailSurat($id)
    {
         $pesan = SuratKeluarBarang::where([
           'statusSurat'=>0,
           'tanggal'=> date('Y-m-d'),
           
        ])->get()->count();

         $content = [
            'pesan' => $pesan,
  
        ];

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

        $tanggal = SuratIjinMasukController::formatTanggalIndo(substr($surat->updated_at,0,10));
        $tanggalMulai = SuratIjinMasukController::formatTanggalIndo($surat->pekerjaan->tanggalMulai);
        $tanggalBerakhir = SuratIjinMasukController::formatTanggalIndo($surat->pekerjaan->tanggalBerakhir);

        $tahun = substr($surat->nomorSurat, -4);
        $angka = str_replace($tahun, '', $surat->nomorSurat);
        return view('Security/detailSurat', compact('surat', 'angka', 'tahun', 'tanggal', 'tanggalMulai', 'tanggalBerakhir', 'arrayK1', 'arrayK2', 'arrayK3', 'arrayL1', 'arrayL2', 'arrayL3','content'));

    }

    public function checkTimes($tanggalMulai, $tanggalBerakhir, $tanggalSekarang)
    {

        $mulai = strtotime($tanggalMulai);
        $berakhir = strtotime($tanggalBerakhir);
        $sekarang = strtotime($tanggalSekarang);

        return (($sekarang >= $mulai) && ($sekarang <= $berakhir));
    }

    public function formatTanggalIndo($tanggal)
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
