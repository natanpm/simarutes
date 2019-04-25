<?php

namespace App\Http\Controllers\PicTelkom;

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
use Illuminate\Support\Facades\Storage;


class SuratKeluarBarangController extends Controller
{
    public function indexBuatSurat()
    {
        $lokasis = Lokasi::where('id', '>' ,1)->get();
        $picTelkoms = PicTelkom::all();
        $jmlSurat = array();

        return view('picTelkom/buatSuratKeluar', compact( 'lokasis','picTelkoms','jmlSurat'));
    }

     

    public function indexLihatSuratKeluar()
    {
        $surats = SuratKeluarBarang::all();
        return view('picTelkom/lihatSuratKeluar', compact('surats'));
    }


    public function indexEditSurat($id) 
     {

         $surat = SuratKeluarBarang::where([
            'id' => $id
        ])->get()->first();

         $lampiran = LampiranSuratKeluar::where([
            'id' => $id
        ])->get()->first();


        if (!$surat) {
            return redirect()->route('get-picTelkomIndexLihatSuratKeluar')
                ->with([
                    'status' => 'warning',
                    'message' => 'Tidak ada SIMARU dengan ID tersebut!'
                ]);
        }

        if ($surat->statusSurat == 1){
            return redirect()->route('get-picTelkomIndexLihatSuratKeluar')
                ->with([
                    'status' => 'warning',
                    'message' => 'SIMARU yang sudah divalidasi oleh Security tidak bisa dirubah!'
                ]);
        }

        $lokasis = Lokasi::where('id', '>' ,1)->get();
        $picTelkoms = PicTelkom::all();
        $jmlSurat = array();

        return view('picTelkom/editSuratKeluar', compact( 'lokasis','picTelkoms','jmlSurat','surat','lampiran'));
    }


   
    public function buatSuratKeluar(Request $request)
    {
        $lokasis = Lokasi::where('id', '>' ,1)->get();
        
        $this->validate($request, [
            'kepada' => 'required|max:255',
            'nik' => 'required|max:50',
            'perusahaan' => 'required',
            'jabatan' => 'required',
            'perihal' => 'required',
       
            'tanggal' => 'required',
            'lokasi' => 'required',
            'picTelkom' => 'required',
            'lampiransuratkeluar' => 'bail|mimes:pdf|max:2000',
            'namaLampiran' => 'required',
        ], [
            'required' => ':Attribute tidak boleh kosong !',
            'mimes' => ':Attribute gagal diunggah, lampiran harus berupa PDF',
            'max' => 'Ukuran maksimum :attribute sebesar 2 Megabyte',

    
        ]);
        
         if (!$request->inputNamaBarang) {
                return redirect()->back()->withInput()
                    ->with([
                        'status' => 'warning',
                        'message' => 'Nama Barang tidak boleh kosong!'
                    ]);
            }
        
         if (!$request->inputMerek) {
                return redirect()->back()->withInput()
                    ->with([
                        'status' => 'warning',
                        'message' => 'Merek Barang tidak boleh kosong!'
                    ]);
            }
        
          if (!$request->inputSerialNumber) {
                return redirect()->back()->withInput()
                    ->with([
                        'status' => 'warning',
                        'message' => 'Serial Number Barang tidak boleh kosong!'
                    ]);
            }


        date_default_timezone_set('Asia/Jakarta');

        if (SuratKeluarBarang::all()->last()){
            $nomorSurat = SuratKeluarBarang::all()->last()->nomorSurat;
            $tahunSurat = substr($nomorSurat, -4);
            $jumlahSurat = str_replace($tahunSurat, '', $nomorSurat);

            if ($tahunSurat == date('Y')) {
                $surat = SuratKeluarBarang::create([
                    'nomorSurat' => ($jumlahSurat + 1) . date('Y'),
                    'kepada' => strtoupper($request->kepada),
                    'nik' => $request->nik,
                    'perusahaan' => $request->perusahaan,
                    'jabatan' => ucwords($request->jabatan),
                    'perihal' => ucwords($request->perihal),
      
                    'statusSurat' => 0,
                    'keterangan' => ($request->keterangan ? $request->keterangan : '-' ),
               
                    'tanggal' => $request->tanggal,
                ]);
            } else {
                $surat = SuratKeluarBarang::create([
                    'nomorSurat' => '1' . date('Y'),
                    'kepada' => strtoupper($request->kepada),
                    'nik' => $request->nik,
                    'perusahaan' => $request->perusahaan,
                    'perihal' => ucwords($request->perihal),
                    'jabatan' => ucwords($request->jabatan),
                                   'statusSurat' => 0,
                    'keterangan' => ($request->keterangan ? $request->keterangan : '-' ),
    
                    'tanggal' => $request->tanggal,
                ]);
            }
         } else {
            $surat = SuratKeluarBarang::create([
                'nomorSurat' => '1' . date('Y'),
                'kepada' => strtoupper($request->kepada),
                'nik' => $request->nik,
                'perusahaan' => $request->perusahaan,
                'perihal' => ucwords($request->perihal),
                'jabatan' => ucwords($request->jabatan),
              
                'statusSurat' => 0,
                'keterangan' => ($request->keterangan ? $request->keterangan : '-' ),
                
                'tanggal' => $request->tanggal,
            ]);



        }



         foreach ($request->picTelkom as $pic) {
            WaspangSuratKeluar::create([
                'idPicTelkom' => $pic,
                'idSuratKeluar' => $surat->id
            ]);
        }

        $path = Storage::putFile(
            'lampiransuratkeluar', $request->file('lampiransuratkeluar')
        );

        LampiranSuratKeluar::create([
            'path' => $path,
            'pathUri' => substr($path, 9),
            'namaFile' => strtoupper($request->namaLampiran),
            'idSuratKeluar' => $surat->id
        ]);

            foreach ($request->lokasi as $loc) {
            LokasiSuratKeluar::create([
                'idLokasi' => $loc,
                'idSuratKeluar' => $surat->id,
            ]);
        }


       if ($request->inputNamaBarang) {
                foreach ($request->inputNamaBarang as $index => $namaBarang) {
                    if ($request->inputMerek[$index] && $request->SerialNumber[$index]) {
                        $BarangKeluar = BarangKeluar::create([
                            'idSuratKeluar' => $surat->id,
                            'namaBarang' => $namaBarang,
                            'merek' => $request->inputMerek[$index],
                            'serialNumber' => $request->inputSerialNumber[$index],
                     

                        ]);
                    } else {
                        $BarangKeluar = BarangKeluar::create([
                            'idSuratKeluar' => $surat->id,
                            'namaBarang' => $namaBarang,
                            'merek' => $request->inputMerek[$index],
                            'serialNumber' => $request->inputSerialNumber[$index],
                        ]);
                    }
                    }
            }

     


        $nomorSurat = $surat->nomorSurat;
        $tahunSurat = substr($nomorSurat, -4);
        $jumlahSurat = str_replace($tahunSurat, '', $nomorSurat);

        return redirect()->route('get-picTelkombuatSuratKeluar')
            ->with([
                'status' => 'success',
                'message' => 'Surat Keluar Barang  Tel. ' . $jumlahSurat . '/Surat Keluar Barang/SBS/' . $tahunSurat . ' berhasil dibuat !'
            ]);
    }



      public function editSuratKeluar(Request $request)
    {
        $lokasis = Lokasi::where('id', '>' ,1)->get();
        
        $this->validate($request, [
            'kepada' => 'required|max:255',
            'nik' => 'required|max:50',
            'perusahaan' => 'required',
            'jabatan' => 'required',
            'perihal' => 'required',
  
            'tanggal' => 'required',
            'lokasi' => 'required',
            'picTelkom' => 'required',
            'lampiransuratkeluar' => 'bail|mimes:pdf|max:2000',
            'namaLampiran' => 'required',
        ], [
            'required' => ':Attribute tidak boleh kosong !',
            'mimes' => ':Attribute gagal diunggah, lampiran harus berupa PDF',
            'max' => 'Ukuran maksimum :attribute sebesar 2 Megabyte',

    
        ]);

      
          $surat = SuratKeluarBarang::where([
            'id' => $request->id
        ])->get()->first();


        if (!$surat) {
            return redirect()->route('get-picTelkomIndexLihatSuratKeluar')
                ->with([
                    'status' => 'warning',
                    'message' => 'Tidak ada SIMARU dengan ID tersebut!'
                ]);
        }

        if ($surat->statusSurat == 1){
            return redirect()->route('get-picTelkomIndexLihatSuratKeluar')
                ->with([
                    'status' => 'warning',
                    'message' => 'SIMARU yang sudah divalidasi oleh Security tidak bisa dirubah!'
                ]);
        }

        date_default_timezone_set('Asia/Jakarta');

        $surat->update([
            'kepada' => strtoupper($request->kepada),
            'nik' => $request->nik,
            'perusahaan' => $request->perusahaan,
            'jabatan' => ucwords($request->jabatan),
            'perihal' => ucwords($request->perihal),
          
            'statusSurat' => 0,
            'keterangan' => ($request->keterangan ? $request->keterangan : '-' ),
         
            'tanggal' => $request->tanggal,
        ]);

        WaspangSuratKeluar::where([
            'idSuratKeluar' => $surat->id
        ])->delete();

        foreach ($request->picTelkom as $pic) {
            WaspangSuratKeluar::create([
                'idPicTelkom' => $pic,
                'idSuratKeluar' => $surat->id
            ]);
        }

        
        if ($request->lampiranSelect == 'baru') {
            $lampiranLama = LampiranSuratKeluar::where([
                'idSuratKeluar' => $request->id
            ])->get()->first();

            if($lampiranLama){
                Storage::delete($lampiranLama->path);
                $lampiranLama->delete();
            }

            $path = Storage::putFile(
                'lampiransuratkeluar', $request->file('lampiransuratkeluar')
            );

            LampiranSuratKeluar::create([
                'path' => $path,
                'pathUri' => substr($path,9),
                'namaFile' => strtoupper($request->namaLampiran),
                'idSuratKeluar' => $request->id
            ]);
        }

       
        LokasiSuratKeluar::where([
            'idSuratKeluar' => $surat->id
        ])->delete();

        foreach ($request->lokasi as $loc) {
            LokasiSuratKeluar::create([
                'idLokasi' => $loc,
                'idSuratKeluar' => $surat->id,
            ]);
        }

        $nomorSurat = $surat->nomorSurat;
        $tahunSurat = substr($nomorSurat, -4);
        $jumlahSurat = str_replace($tahunSurat, '', $nomorSurat);

        return redirect()->route('get-picTelkomIndexLihatSuratKeluar')
            ->with([
                'status' => 'success',
                'message' => 'SIMARU  Tel. ' . $jumlahSurat . '/SIMARU/SBS/' . $tahunSurat . ' berhasil diedit!'
            ]);
    }





          public function detailSuratKeluar($id)
    {
        $surat = SuratKeluarBarang::where([
            'id' => $id,
        ])->get()->first();

        if (!$surat) {
            return redirect()->route('get-picTelkomIndexLihatSuratKeluar')
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

     
        

      
        $tanggal = SuratKeluarBarangController::formatTanggalIndo(substr($surat->tanggal,0,10));
        $tahun = substr($surat->nomorSurat, -4);
        $angka = str_replace($tahun, '', $surat->nomorSurat);
        return view('PicTelkom/detailSuratKeluar', compact('surat', 'angka', 'tahun','tanggal', 'arrayL1', 'arrayL2', 'arrayL3','arrayK1', 'arrayK2', 'arrayK3','arrayP1','arrayP2','arrayP3','arrayN1','arrayN2','arrayN3','arrayZ1','arrayZ2','arrayZ3'));

    }



     public function cetakSuratKeluar($id)
    {
        $surat = SuratKeluarBarang::where([
            'id' => $id,
        ])->get()->first();

        if (!$surat) {
            return redirect()->route('get-picTelkomIndexLihatSuratKeluar')
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

     
        

      
        $tanggal = SuratKeluarBarangController::formatTanggalIndo(substr($surat->tanggal,0,10));
        $tahun = substr($surat->nomorSurat, -4);
        $angka = str_replace($tahun, '', $surat->nomorSurat);
        return view('PicTelkom/cetakSurat', compact('surat', 'angka', 'tahun','tanggal', 'arrayL1', 'arrayL2', 'arrayL3','arrayK1', 'arrayK2', 'arrayK3','arrayP1','arrayP2','arrayP3','arrayN1','arrayN2','arrayN3','arrayZ1','arrayZ2','arrayZ3'));

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
