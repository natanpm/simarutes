<?php

namespace App\Http\Controllers\Admin;

use App\Forwarding;
use App\Http\Controllers\Controller;
use App\Waspang;
use Illuminate\Http\Request;
use App\SuratMasuk;
use App\PicTelkom;
use App\PicMitra;
use App\UnitPerusahaan;
use App\Lokasi;
use App\LokasiKerja;
use App\Pekerjaan;
use App\Petugas;
use App\Lampiran;
use Illuminate\Support\Facades\Storage;

class SuratIjinMasukController extends Controller
{
    public function indexBuat()
    {
        $lokasis = Lokasi::all();
        $picTelkoms = PicTelkom::all();
        $picTkmNetras = PicMitra::where([
            'idPerusahaan' => 4,
        ])->get();
        $unitSigmas = UnitPerusahaan::where('idPerusahaan', 3)->get();
        $unitTas = UnitPerusahaan::where('idPerusahaan', 2)->get();
        $jmlSurat = array();

        date_default_timezone_set('Asia/Jakarta');
        foreach ($picTelkoms as $pic) {
            $jumlah = 0;
            foreach ($pic->waspang as $waspang) {
                if (SuratIjinMasukController::checkTimes(date('Y-m-d'), $waspang->suratMasuk->pekerjaan->tanggalBerakhir, $waspang->suratMasuk->pekerjaan->tanggalMulai)) {
                    $jumlah++;
                };
            }
            array_push($jmlSurat, $jumlah);
        }

        return view('Admin/buatSuratMasuk', compact('picTelkoms', 'unitSigmas', 'unitTas', 'lokasis', 'jmlSurat','picTkmNetras'));
    }

    public function indexLihatSurat()
    {
        $surats = SuratMasuk::all();
        return view('Admin/lihatSuratMasuk', compact('surats'));
    }

    public function suratTervalidasi()
    {
        $surats = SuratMasuk::where([
            'statusSurat' => 2, ]) -> get();
        return view('Admin/lihatSuratMasuk', compact('surats'));
    }

    public function suratBelumTervalidasi()
    {
        $surats = SuratMasuk::where (
            'statusSurat' , '<', 2 ) -> get();
        return view('Admin/lihatSuratMasuk', compact('surats'));
    }

    public function suratRevisi()
    {
        $surats = SuratMasuk::where ([
            'statusSurat' => 3, ]) -> get();
        return view('Admin/lihatSuratMasuk', compact('surats'));
    }

     public function suratNonaktif()
    {
        $surats = SuratMasuk::where ([
            'statusSurat' => 4, ]) -> get();
        return view('Admin/lihatSuratMasuk', compact('surats'));
    }

    public function indexEditSurat($id)
    {

        $surat = SuratMasuk::where([
            'id' => $id
        ])->get()->first();

        if (!$surat) {
            return redirect()->route('get-indexLihatSurat')
                ->with([
                    'status' => 'warning',
                    'message' => 'Tidak ada SIMARU dengan ID tersebut!'
                ]);
        }

         if ($surat->validate1 == 1){
            return redirect()->route('get-indexLihatSurat')
                ->with([
                    'status' => 'warning',
                    'message' => 'SIMARU yang sudah divalidasi oleh Validator tidak bisa dirubah!'
                ]);
        }

        if ($surat->validate2 == 1){
            return redirect()->route('get-indexLihatSurat')
                ->with([
                    'status' => 'warning',
                    'message' => 'SIMARU yang sudah divalidasi oleh Supervalidator tidak bisa dirubah!'
                ]);
        }

        $unitSurat = array();
        $perusahaanPic = 0;

        if ($surat->petugas->first()) {
            if($surat->petugas->first()->picMitra->idPerusahaan == 4){
                foreach ($surat->petugas as $person) {
                    array_push($unitSurat, $person->picMitra->id);
                }
            }else{
                foreach ($surat->petugas as $person) {
                    array_push($unitSurat, $person->picMitra->idUnitPerusahaan);
                }
            }
            $perusahaanPic = $surat->petugas->first()->picMitra->idPerusahaan;
        }

        $unitSurat = array_unique($unitSurat);

        $lokasis = Lokasi::all();
        $picTelkoms = PicTelkom::all();
        $unitSigmas = UnitPerusahaan::where('idPerusahaan', 3)->get();
        $picTkmNetras = PicMitra::where([
            'idPerusahaan' => 4,
        ])->get();
        $unitTas = UnitPerusahaan::where('idPerusahaan', 2)->get();

        $jmlSurat = array();

        date_default_timezone_set('Asia/Jakarta');

        foreach ($picTelkoms as $pic) {
            $jumlah = 0;
            foreach ($pic->waspang as $waspang) {
                if (SuratIjinMasukController::checkTimes(date('Y-m-d'), $waspang->suratMasuk->pekerjaan->tanggalBerakhir, $waspang->suratMasuk->pekerjaan->tanggalMulai)) {
                    $jumlah++;
                };
            }
            array_push($jmlSurat, $jumlah);
        }
        return view('Admin/editSurat', compact('surat', 'lokasis', 'picTelkoms', 'perusahaanPic', 'unitSigmas', 'unitTas', 'unitSurat', 'jmlSurat','picTkmNetras'));


    }

    public function buatSurat(Request $request)
    {
        $this->validate($request, [
            'kepada' => 'required|max:255',
            'jumlahLampiran' => 'required|numeric|min:1|max:20',
            'perihal' => 'required',
            'suratDinas' => 'required',
            'lampiran' => 'bail|required|mimes:pdf|max:2000',
            'lokasi' => 'required',
            'kegiatan' => 'required',
            'waktuDanTanggal' => 'required',
            'kategori' => 'required',
            'picTelkom' => 'required',
            'namaLampiran' => 'required',
        ], [
            'required' => ':Attribute tidak boleh kosong !',
            'mimes' => ':Attribute gagal diunggah, lampiran harus berupa PDF',
            'max' => 'Ukuran maksimum :attribute sebesar 2 Megabyte',
            'jumlahLampiran.max' => 'Jumlah Lampiran maksimal 20 lembar',
            'jumlahLampiran.min' => 'Jumlah Lampiran minimal 1 lembar'
        ]);

        if ($request->kategori == "telkomAkses") {
            if (!$request->unitTa) {
                return redirect()->back()->withInput()
                    ->with([
                        'status' => 'warning',
                        'message' => 'SIMARU harus memiliki PIC Mitra!'
                    ]);
            }
        } else if ($request->kategori == "sigma") {
            if (!$request->unitSigma) {
                return redirect()->back()->withInput()
                    ->with([
                        'status' => 'warning',
                        'message' => 'SIMARU harus memiliki PIC Mitra!'
                    ]);
            }
        } else if ($request->kategori == "tkmNetra") {
            if (!$request->unitTkmNetra) {
                return redirect()->back()->withInput()
                    ->with([
                        'status' => 'warning',
                        'message' => 'SIMARU harus memiliki PIC Mitra!'
                    ]);
            }
        } else {
            if (!$request->inputNama) {
                return redirect()->back()->withInput()
                    ->with([
                        'status' => 'warning',
                        'message' => 'SIMARU harus memiliki PIC Mitra!'
                    ]);
            }
        }

        date_default_timezone_set('Asia/Jakarta');

        if (SuratMasuk::all()->last()) {
            $nomorSurat = SuratMasuk::all()->last()->nomorSurat;
            $tahunSurat = substr($nomorSurat, -4);
            $jumlahSurat = str_replace($tahunSurat, '', $nomorSurat);

            if ($tahunSurat == date('Y')) {
                $surat = SuratMasuk::create([
                    'nomorSurat' => ($jumlahSurat + 1) . date('Y'),
                    'kepada' => strtoupper($request->kepada),
                    'jumlahLampiran' => $request->jumlahLampiran,
                    'perihal' => ucwords($request->perihal),
                    'suratDinas' => $request->suratDinas,
                    'keterangan' => ($request->keterangan ? $request->keterangan : '-' ),
                    'validate1' => 0,
                    'validate2' => 0,
                    'statusSurat' => 0,
                ]);
            } else {
                $surat = SuratMasuk::create([
                    'nomorSurat' => '1' . date('Y'),
                    'kepada' => strtoupper($request->kepada),
                    'jumlahLampiran' => $request->jumlahLampiran,
                    'perihal' => ucwords($request->perihal),
                    'suratDinas' => $request->suratDinas,
                    'keterangan' => ($request->keterangan ? $request->keterangan : '-' ),
                    'validate1' => 0,
                    'validate2' => 0,
                    'statusSurat' => 0,
                ]);
            }
        } else {
            $surat = SuratMasuk::create([
                'nomorSurat' => '1' . date('Y'),
                'kepada' => strtoupper($request->kepada),
                'jumlahLampiran' => $request->jumlahLampiran,
                'perihal' => ucwords($request->perihal),
                'suratDinas' => $request->suratDinas,
                'keterangan' => ($request->keterangan ? $request->keterangan : '-' ),
                'validate1' => 0,
                'validate2' => 0,
                'statusSurat' => 0,
            ]);
        }

        foreach ($request->picTelkom as $pic) {
            Waspang::create([
                'idPicTelkom' => $pic,
                'idSuratMasuk' => $surat->id
            ]);
        }

        if($request->forward){
            foreach ($request->forward as $pic) {
                Forwarding::create([
                    'idPicTelkom' => $pic,
                    'idSuratMasuk' => $surat->id
                ]);
            }
        }

        $path = Storage::putFile(
            'lampiran', $request->file('lampiran')
        );

        Lampiran::create([
            'path' => $path,
            'pathUri' => substr($path, 9),
            'namaFile' => strtoupper($request->namaLampiran),
            'idSuratMasuk' => $surat->id
        ]);

        $pekerjaan = Pekerjaan::create([
            'kegiatan' => ucwords($request->kegiatan),
            'tanggalMulai' => substr($request->waktuDanTanggal, 0, 10),
            'tanggalBerakhir' => substr($request->waktuDanTanggal, 19, 10),
            'jamMasuk' => substr($request->waktuDanTanggal, 11, 5) . ":00",
            'jamKeluar' => substr($request->waktuDanTanggal, 30, 5) . ":00",
            'idSuratMasuk' => $surat->id,
        ]);

        foreach ($request->lokasi as $loc) {
            LokasiKerja::create([
                'idLokasi' => $loc,
                'idPekerjaan' => $pekerjaan->id,
            ]);
        }

        if ($request->kategori == "telkomAkses") {
            if ($request->unitTa) {
                foreach ($request->unitTa as $unit) {
                    $units = PicMitra::where('idUnitPerusahaan', $unit)->get();
                    foreach ($units as $petugas) {
                        Petugas::create([
                            'idSuratMasuk' => $surat->id,
                            'idPicMitra' => $petugas->id,
                        ]);
                    }
                }
            }
        } else if ($request->kategori == "sigma") {
            if ($request->unitSigma) {
                foreach ($request->unitSigma as $unit) {
                    $units = PicMitra::where('idUnitPerusahaan', $unit)->get();
                    foreach ($units as $petugas) {
                        Petugas::create([
                            'idSuratMasuk' => $surat->id,
                            'idPicMitra' => $petugas->id,
                        ]);
                    }
                }
            }
        }else if ($request->kategori == "tkmNetra") {
            if ($request->unitTkmNetra) {
                foreach ($request->unitTkmNetra as $idPic) {
                    $petugas = PicMitra::where('id', $idPic)->get()->first();
                    if($petugas){
                        Petugas::create([
                            'idSuratMasuk' => $surat->id,
                            'idPicMitra' => $petugas->id,
                        ]);
                    }
                }
            }
        } else {
            if ($request->inputNama) {
                foreach ($request->inputNama as $index => $nama) {
                    if ($request->inputKontak[$index] && $request->inputId[$index]) {
                        $pic = PicMitra::create([
                            'nik' => $request->inputId[$index],
                            'nama' => $nama,
                            'kontak' => $request->inputKontak[$index],
                            'keterangan' => strtoupper($request->kepada),
                            'statusNda' => 0,
                            'idPerusahaan' => 1,
                            'idUnitPerusahaan' => 1,
                        ]);
                    } else {
                        $pic = PicMitra::create([
                            'nik' => $request->inputId[$index],
                            'nama' => $nama,
                            'kontak' => '-',
                            'keterangan' => strtoupper($request->kepada),
                            'statusNda' => 0,
                            'idPerusahaan' => 1,
                            'idUnitPerusahaan' => 1,
                        ]);
                    }
                    Petugas::create([
                        'idSuratMasuk' => $surat->id,
                        'idPicMitra' => $pic->id,
                    ]);
                }
            }
        }

        $nomorSurat = $surat->nomorSurat;
        $tahunSurat = substr($nomorSurat, -4);
        $jumlahSurat = str_replace($tahunSurat, '', $nomorSurat);

        return redirect()->route('get-buatSuratMasuk')
            ->with([
                'status' => 'success',
                'message' => 'SIMARU  Tel. ' . $jumlahSurat . '/SIMARU/SBS/' . $tahunSurat . ' berhasil dibuat !'
            ]);
    }

    public function editSurat(Request $request)
    {
        $this->validate($request, [
            'kepada' => 'required|max:255',
            'jumlahLampiran' => 'required|max:20',
            'perihal' => 'required',
            'suratDinas' => 'required',
            'lampiran' => 'bail|mimes:pdf|max:2000',
            'lampiranSelect' => 'required',
            'kegiatan' => 'required',
            'waktuDanTanggal' => 'required',
            'kategori' => 'required',
            'picTelkom' => 'required',
            'namaLampiran' => 'required'
        ], [
            'required' => ':Attribute tidak boleh kosong !',
            'mimes' => ':Attribute gagal diunggah, lampiran harus berupa PDF',
            'max' => 'Ukuran maksimum :attribute sebesar 2 Megabyte'
        ]);

        $surat = SuratMasuk::where([
            'id' => $request->id,
        ])->get()->first();

        if (!$surat) {
            return redirect()->route('get-indexLihatSurat')
                ->with([
                    'status' => 'warning',
                    'message' => 'Tidak ada SIMARU dengan ID tersebut'
                ]);
        }

        if ($surat->validate2 == 1){
            return redirect()->route('get-indexLihatSurat')
                ->with([
                    'status' => 'warning',
                    'message' => 'SIMARU yang sudah divalidasi oleh Supervalidator tidak bisa dirubah!'
                ]);
        }

        date_default_timezone_set('Asia/Jakarta');
        $surat->update([
            'kepada' => strtoupper($request->kepada),
            'jumlahLampiran' => $request->jumlahLampiran,
            'perihal' => ucwords($request->perihal),
            'suratDinas' => $request->suratDinas,
            'keterangan' => ($request->keterangan ? $request->keterangan : '-' ),
            'validate1' => 0,
            'validate2' => 0,
            'statusSurat' => 0,
        ]);

        Waspang::where([
            'idSuratMasuk' => $surat->id
        ])->delete();

        Forwarding::where([
            'idSuratMasuk' => $surat->id
        ])->delete();

        foreach ($request->picTelkom as $pic) {
            Waspang::create([
                'idPicTelkom' => $pic,
                'idSuratMasuk' => $surat->id
            ]);
        }

        if($request->forward){
            foreach ($request->forward as $pic) {
                Forwarding::create([
                    'idPicTelkom' => $pic,
                    'idSuratMasuk' => $surat->id
                ]);
            }
        }

        if ($request->lampiranSelect == 'baru') {
            $lampiranLama = Lampiran::where([
                'idSuratMasuk' => $request->id
            ])->get()->first();

            if($lampiranLama){
                Storage::delete($lampiranLama->path);
                $lampiranLama->delete();
            }

            $path = Storage::putFile(
                'lampiran', $request->file('lampiran')
            );

            Lampiran::create([
                'path' => $path,
                'pathUri' => substr($path, 9),
                'namaFile' => strtoupper($request->namaLampiran),
                'idSuratMasuk' => $request->id
            ]);
        }

        $pekerjaan = Pekerjaan::where([
            'idSuratMasuk' => $request->id
        ])->get()->first();

        $pekerjaan->update([
            'kegiatan' => ucwords($request->kegiatan),
            'tanggalMulai' => substr($request->waktuDanTanggal, 0, 10),
            'tanggalBerakhir' => substr($request->waktuDanTanggal, 19, 10),
            'jamMasuk' => substr($request->waktuDanTanggal, 11, 5) . ":00",
            'jamKeluar' => substr($request->waktuDanTanggal, 30, 5) . ":00",
        ]);

        LokasiKerja::where([
            'idPekerjaan' => $pekerjaan->id
        ])->delete();

        foreach ($request->lokasi as $loc) {
            LokasiKerja::create([
                'idLokasi' => $loc,
                'idPekerjaan' => $pekerjaan->id,
            ]);
        }

        if ($request->kategori == "telkomAkses") {
            if (!$request->unitTa) {
                return redirect()->route('get-indexEditSurat', ['id' => $request->id])
                    ->with([
                        'status' => 'warning',
                        'message' => 'SIMARU harus memiliki PIC Mitra!'
                    ]);
            }

            Petugas::where([
                'idSuratMasuk' => $request->id
            ])->delete();

            foreach ($request->unitTa as $unit) {
                $units = PicMitra::where('idUnitPerusahaan', $unit)->get();
                foreach ($units as $petugas) {
                    Petugas::create([
                        'idSuratMasuk' => $request->id,
                        'idPicMitra' => $petugas->id,
                    ]);
                }
            }
        } else if ($request->kategori == "sigma") {
            if (!$request->unitSigma) {
                return redirect()->route('get-indexEditSurat', ['id' => $request->id])
                    ->with([
                        'status' => 'warning',
                        'message' => 'SIMARU harus memiliki PIC Mitra!'
                    ]);
            }
            Petugas::where([
                'idSuratMasuk' => $request->id
            ])->delete();

            foreach ($request->unitSigma as $unit) {
                $units = PicMitra::where('idUnitPerusahaan', $unit)->get();
                foreach ($units as $petugas) {
                    Petugas::create([
                        'idSuratMasuk' => $request->id,
                        'idPicMitra' => $petugas->id,
                    ]);
                }
            }

        } else if ($request->kategori == "tkmNetra") {
            if (!$request->unitTkmNetra) {
                return redirect()->route('get-indexEditSurat', ['id' => $request->id])
                    ->with([
                        'status' => 'warning',
                        'message' => 'SIMARU harus memiliki PIC Mitra!'
                    ]);
            }

            Petugas::where([
                'idSuratMasuk' => $request->id
            ])->delete();

            foreach ($request->unitTkmNetra as $idPic) {
                $petugas = PicMitra::where('id', $idPic)->get()->first();
                if($petugas){
                    Petugas::create([
                        'idSuratMasuk' => $surat->id,
                        'idPicMitra' => $petugas->id,
                    ]);
                }
            }

        } else {
            if (!$request->inputNama) {
                return redirect()->route('get-indexEditSurat', ['id' => $request->id])
                    ->with([
                        'status' => 'warning',
                        'message' => 'SIMARU harus memiliki PIC Mitra!'
                    ]);
            }

            $petugas = Petugas::where([
                'idSuratMasuk' => $request->id
            ])->get();

            if ($request->inputNama) {
                for ($i = 0; $i < $petugas->count(); $i++) {
                    $pic = PicMitra::where([
                        'id' => $petugas[$i]->idPicMitra
                    ])->get()->first();

                    $pic->update([
                        'nik' => $request->inputId[$i],
                        'nama' => $request->inputNama[$i],
                        'kontak' => $request->inputKontak[$i],
                        'keterangan' => strtoupper($request->kepada),
                    ]);
                }
            }
        }

        $nomorSurat = $surat->nomorSurat;
        $tahunSurat = substr($nomorSurat, -4);
        $jumlahSurat = str_replace($tahunSurat, '', $nomorSurat);

        return redirect()->route('get-indexLihatSurat')
            ->with([
                'status' => 'success',
                'message' => 'SIMARU  Tel. ' . $jumlahSurat . '/SIMARU/SBS/' . $tahunSurat . ' berhasil diedit!'
            ]);
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
        return view('Admin/detailSurat', compact('surat', 'angka', 'tahun', 'tanggal', 'tanggalMulai', 'tanggalBerakhir', 'arrayK1', 'arrayK2', 'arrayK3', 'arrayL1', 'arrayL2', 'arrayL3'));
    }

    public function hapusSurat($id)
    {
        $surat = SuratMasuk::where([
            'id' => $id
        ])->get()->first();

        if (!$surat) {
            return redirect()->route('get-indexLihatSurat')
                ->with([
                    'status' => 'warning',
                    'message' => 'Tidak terdapat SIMARU dengan ID tersebut!'
                ]);
        }

        Waspang::where([
            'idSuratMasuk' => $surat->id
        ])->delete();

        $petugas = Petugas::where([
            'idSuratMasuk' => $surat->id
        ])->get();

        if($petugas->first()){
            if($petugas->first()->picMitra->idPerusahaan == 1){
                foreach ($petugas as $pic) {
                    $pic->picMitra->delete();
                }
            }
        }else{
            Petugas::where([
                'idSuratMasuk' => $surat->id
            ])->delete();
        }


        $tahun = substr($surat->nomorSurat, -4);
        $angka = str_replace($tahun, '', $surat->nomorSurat);
        $surat->delete();
        return redirect()->route('get-indexLihatSurat')
            ->with([
                'status' => 'success',
                'message' => 'SIMARU Tel. ' . $angka . '/SIMARU/SBS/' . $tahun . ' berhasil dihapus!'
            ]);
    }

    public function cetakSurat($id)
    {
        $surat = SuratMasuk::where([
            'id' => $id,
        ])->get()->first();

        if (!$surat) {
            return redirect()->route('get-indexLihatSurat')
                ->with([
                    'status' => 'warning',
                    'message' => 'Tidak terdapat SIMARU dengan ID tersebut!'
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

        foreach ($surat->pekerjaan->lokasiKerja as $lokasi){
            if($selector == 0){
                array_push($arrayL1,$lokasi->lokasi->lokasi);
                $selector++;
            }else if($selector == 1){
                array_push($arrayL2,$lokasi->lokasi->lokasi);
                $selector++;
            }else{
                array_push($arrayL3,$lokasi->lokasi->lokasi);
                $selector = 0;
            }
        }

        $tanggal = SuratIjinMasukController::formatTanggalIndo(substr($surat->updated_at,0,10));
        $tanggalMulai = SuratIjinMasukController::formatTanggalIndo($surat->pekerjaan->tanggalMulai);
        $tanggalBerakhir = SuratIjinMasukController::formatTanggalIndo($surat->pekerjaan->tanggalBerakhir);

        $tahun = substr($surat->nomorSurat, -4);
        $angka = str_replace($tahun, '', $surat->nomorSurat);
        return view('Admin/cetakSurat', compact('surat', 'angka', 'tahun', 'tanggal', 'tanggalMulai', 'tanggalBerakhir', 'arrayK1', 'arrayK2', 'arrayK3', 'arrayL1', 'arrayL2', 'arrayL3'));
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
