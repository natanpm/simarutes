<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SuratKeluarBarang;
use App\PicTelkom;
use App\PicMitra;
use App\WaspangSuratKeluar;
use App\UnitPerusahaan;
use App\Lokasi;
use App\LokasiSuratKeluar;
use App\LogSuratKeluar;
use App\BarangKeluar;
use App\LampiranSuratKeluar;
use App\LogBarangKeluar;
use Illuminate\Support\Facades\Storage;


class suratijinKeluarbarangcontroller extends Controller
{


 public function indexLihatSuratKeluar(Request $request){


 	 $lokasiSurats = LokasiSuratKeluar::all();
      $surats = array();


      foreach ($lokasiSurats as $lokasiSurat) {
            if ($lokasiSurat->idLokasi == auth('user')->user()->idLokasi) {
                array_push($surats, $lokasiSurat->suratKeluar);
            }
        }
 

 	  $pesan = SuratKeluarBarang::where([
           'statusSurat'=>0,
           'tanggal'=>date('Y-m-d'),
           
        ])->get()->count();

         $content = [
            'pesan' => $pesan,
  
        ];
      
        return view('Security/lihatSuratKeluar',compact('surats','content'));
    }

    public function indexLihatSuratKeluarHariIni(Request $request){


 	  $lokasisurat = LokasiSuratKeluar::all();
 	  $surats = SuratKeluarBarang::where([
           'statusSurat'=>0,
           'tanggal'=>date('Y-m-d'),
           
        ])->get();
 	  $pesan = SuratKeluarBarang::where([
           'statusSurat'=>0,
           'tanggal'=>date('Y-m-d'),
           
        ])->get()->count();

         $content = [
            'pesan' => $pesan,
  
        ];
      
        return view('Security/lihatSuratKeluar',compact('surats','content'));
    }
      public function detailSuratKeluar($id)
    {
    	 $pesan = SuratKeluarBarang::where([
           'statusSurat'=>0,
           'tanggal'=> date('Y-m-d'),
           
        ])->get()->count();

         $content = [
            'pesan' => $pesan,
  
        ];

        $surat = SuratKeluarBarang::where([
            'id' => $id,
        ])->get()->first();

        if (!$surat) {
            return redirect()->route('get-indexLihatSuratKeluar')
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
        $arrayP1 = array();
        $arrayP2 = array();
        $arrayP3 = array();
        $arrayN1 = array();
        $arrayN2 = array();
        $arrayN3 = array();
        $arrayZ1 = array();
        $arrayZ2 = array();
        $arrayZ3 = array();



        $max = $surat->barangKeluar->count();
        $selector = 0;
        $counter = 0;

        if ($max != 0) {
            for ($i = 0; $i < 10; $i++) {
                for ($k = 0; $k < 3; $k++) {
                    if ($selector == 0) {
                        array_push($arrayK1, $surat->barangKeluar[$counter++]->SuratKeluarBarang->namaBarang);
                        $selector++;
                    } else if ($selector == 1) {
                        array_push($arrayK2, $surat->barangKeluar[$counter++]->SuratKeluarBarang->namaBarang);
                        $selector++;
                    } else if ($selector == 2) {
                        array_push($arrayK3, $surat->barangKeluar[$counter++]->SuratKeluarBarang->namaBarang);
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

        foreach ($surat->LokasiSuratKeluar as $lokasi) {
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

        $selector = 0;

        foreach ($surat->WaspangSuratKeluar as $waspang) {
            if ($selector == 0) {
                array_push($arrayP1, $waspang->picTelkom->nik);
                array_push($arrayN1, $waspang->picTelkom->nama);
                array_push($arrayZ1, $waspang->picTelkom->unit);

                $selector++;
            } else if ($selector == 1) {
                array_push($arrayP2, $waspang->picTelkom->nik);
                array_push($arrayN2, $waspang->picTelkom->nama);
                array_push($arrayZ2, $waspang->picTelkom->unit);
                $selector++;
            } else {
                array_push($arrayP3, $waspang->picTelkom->nik);
                array_push($arrayN3, $waspang->picTelkom->nama);
                    array_push($arrayZ2, $waspang->picTelkom->unit);

                $selector = 0;

            }
        }

     
        

      
        $tanggal = SuratIjinKeluarBarangController::formatTanggalIndo(substr($surat->tanggal,0,10));
        $tahun = substr($surat->nomorSurat, -4);
        $angka = str_replace($tahun, '', $surat->nomorSurat);
        return view('Security/detailSuratKeluar', compact('surat', 'angka', 'tahun','tanggal', 'arrayL1', 'arrayL2', 'arrayL3','arrayK1', 'arrayK2', 'arrayK3','arrayP1','arrayP2','arrayP3','arrayN1','arrayN2','arrayN3','arrayZ1','arrayZ2','arrayZ3','content'));

    }



     public function cetakSuratKeluar($id)
    {
        $surat = SuratKeluarBarang::where([
            'id' => $id,
        ])->get()->first();

        if (!$surat) {
            return redirect()->route('get-indexLihatSuratKeluar')
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
        $arrayP1 = array();
        $arrayP2 = array();
        $arrayP3 = array();
        $arrayN1 = array();
        $arrayN2 = array();
        $arrayN3 = array();
        $arrayZ1 = array();
        $arrayZ2 = array();
        $arrayZ3 = array();



        $max = $surat->barangKeluar->count();
        $selector = 0;
        $counter = 0;

        if ($max != 0) {
            for ($i = 0; $i < 10; $i++) {
                for ($k = 0; $k < 3; $k++) {
                    if ($selector == 0) {
                        array_push($arrayK1, $surat->barangKeluar[$counter++]->SuratKeluarBarang->namaBarang);
                        $selector++;
                    } else if ($selector == 1) {
                        array_push($arrayK2, $surat->barangKeluar[$counter++]->SuratKeluarBarang->namaBarang);
                        $selector++;
                    } else if ($selector == 2) {
                        array_push($arrayK3, $surat->barangKeluar[$counter++]->SuratKeluarBarang->namaBarang);
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

        foreach ($surat->LokasiSuratKeluar as $lokasi) {
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

        $selector = 0;

        foreach ($surat->WaspangSuratKeluar as $waspang) {
            if ($selector == 0) {
                array_push($arrayP1, $waspang->picTelkom->nik);
                array_push($arrayN1, $waspang->picTelkom->nama);
                array_push($arrayZ1, $waspang->picTelkom->unit);

                $selector++;
            } else if ($selector == 1) {
                array_push($arrayP2, $waspang->picTelkom->nik);
                array_push($arrayN2, $waspang->picTelkom->nama);
                array_push($arrayZ2, $waspang->picTelkom->unit);
                $selector++;
            } else {
                array_push($arrayP3, $waspang->picTelkom->nik);
                array_push($arrayN3, $waspang->picTelkom->nama);
                    array_push($arrayZ2, $waspang->picTelkom->unit);

                $selector = 0;

            }
        }

     
        

      
        $tanggal = SuratIjinKeluarBarangController::formatTanggalIndo(substr($surat->tanggal,0,10));
        $tahun = substr($surat->nomorSurat, -4);
        $angka = str_replace($tahun, '', $surat->nomorSurat);
        return view('Security/cetakSuratKeluar', compact('surat', 'angka', 'tahun','tanggal', 'arrayL1', 'arrayL2', 'arrayL3','arrayK1', 'arrayK2', 'arrayK3','arrayP1','arrayP2','arrayP3','arrayN1','arrayN2','arrayN3','arrayZ1','arrayZ2','arrayZ3'));

    }





     public function validasiSurat($id)
    {
 $lokasi = Lokasi::where([
            'id' => $id,
        ])->get()->first();
        $surat = SuratKeluarBarang::where([
            'id' => $id
        ])->get()->first();

        if(!$surat){
            return redirect()->route('get-securityIndexLihatSuratKeluar')
                ->with([
                    'status' => 'danger',
                    'message' => 'SIMARU dengan ID tersebut tidak ditemukan!'
                ]);
        }


        $tahun = substr($surat->nomorSurat, -4);
        $angka = str_replace($tahun, '', $surat->nomorSurat);

        if ($surat->statusSurat != 1 ) {
            $surat->update([
                'statusSurat' => 1,
            
            ]);
            return redirect()->back()
                ->with([
                    'status' => 'success',
                    'message' => 'SIMARU Tel. ' . $angka . '/SIMARU/SBS/' . $tahun . ' berhasil divalidasi!'
                ]);
        }

         LogBarangKeluar::create([
                'tanggalValidasi' => date('Y-m-d'),

                'idSuratKeluar' => $surat->id,
                'idSecurity' => auth('user')->user()->id,

                'idLokasi' => auth('user')->user()->idLokasi,
            ]);


        return redirect()->back()
            ->with([
                'status' => 'warning',
                'message' => 'SIMARU Tel. ' . $angka . '/SIMARU/SBS/' . $tahun . ' sudah divalidasi!'
            ]);
    }

    public function batalkanValidasiSurat($id)
    {
        $surat = SuratKeluarBarang::where([
            'id' => $id
        ])->get()->first();

        if(!$surat){
            return redirect()->route('get-securityIndexLihatSuratKeluar')
                ->with([
                    'status' => 'danger',
                    'message' => 'SIMARU dengan ID tersebut tidak ditemukan!'
                ]);
        }


        $tahun = substr($surat->nomorSurat, -4);
        $angka = str_replace($tahun, '', $surat->nomorSurat);

        if ($surat->statusSurat == 2) {
            return redirect()->back()
                ->with([
                    'status' => 'warning',
                    'message' => 'SIMARU Tel. ' . $angka . '/SIMARU/SBS/' . $tahun . ' sudah ditandai sebagai surat revisi!'
                ]);
        }

        $surat->update([
            'statusSurat' => 2,

        ]);

        return redirect()->back()
            ->with([
                'status' => 'warning',
                'message' => 'SIMARU Tel. ' . $angka . '/SIMARU/SBS/' . $tahun . ' validasi dibatalkan atau direvisi ulang!'
            ]);
    }



    public function checkTimes($tanggalMulai, $tanggalBerakhir, $tanggalSekarang)
    {

        $mulai = strtotime($tanggalMulai);
        $berakhir = strtotime($tanggalBerakhir);
        $sekarang = strtotime($tanggalSekarang);

        return (($sekarang >= $mulai) && ($sekarang <= $berakhir));
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
