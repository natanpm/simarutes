<?php

namespace App\Http\Controllers\Validator;

use App\Http\Controllers\Controller;
use App\Nda;
use Illuminate\Http\Request;
use App\PicMitra;
use Illuminate\Support\Facades\Storage;

class NdaController extends Controller
{
    public function indexPicTelkomAkses()
    {
        $pics = PicMitra::where([
            'idPerusahaan' => 2
        ])->get();

        $arrayStatusNda = array();
        $arrayMasaBerlakuNda = array();

        foreach ($pics as $pic) {
            if ($pic->statusNda == 0) {
                array_push($arrayStatusNda, "-");
                array_push($arrayMasaBerlakuNda, "-");
            } elseif ($pic->statusNda == 1) {
                if ($pic->nda->statusNda == 0) {
                    array_push($arrayStatusNda, "Kadaluarsa" . "\r\n" . ($pic->nda->validasiNda == 1 ? "(Valid)" : "(-)"));
                    array_push($arrayMasaBerlakuNda, $pic->nda->tanggalBerakhir);
                } elseif ($pic->nda->statusNda == 1) {
                    array_push($arrayStatusNda, "Aktif" . "\r\n" . ($pic->nda->validasiNda == 1 ? "(Valid)" : "(-)"));
                    array_push($arrayMasaBerlakuNda, $pic->nda->tanggalBerakhir);
                }
            }
        }
        return view('Validator/TelkomAkses/lihatNdaPicTelkomAkses', compact('pics', 'arrayStatusNda', 'arrayMasaBerlakuNda'));
    }

    public function indexPicTkmNetra()
    {
        $pics = PicMitra::where([
            'idPerusahaan' => 4
        ])->get();

        $arrayStatusNda = array();
        $arrayMasaBerlakuNda = array();

        foreach ($pics as $pic) {
            if ($pic->statusNda == 0) {
                array_push($arrayStatusNda, "-");
                array_push($arrayMasaBerlakuNda, "-");
            } elseif ($pic->statusNda == 1) {
                if ($pic->nda->statusNda == 0) {
                    array_push($arrayStatusNda, "Kadaluarsa" . "\r\n" . ($pic->nda->validasiNda == 1 ? "(Valid)" : "(-)"));
                    array_push($arrayMasaBerlakuNda, $pic->nda->tanggalBerakhir);
                } elseif ($pic->nda->statusNda == 1) {
                    array_push($arrayStatusNda, "Aktif" . "\r\n" . ($pic->nda->validasiNda == 1 ? "(Valid)" : "(-)"));
                    array_push($arrayMasaBerlakuNda, $pic->nda->tanggalBerakhir);
                }
            }
        }
        return view('Validator/TkmNetra/lihatNdaPicTkmNetra', compact('pics', 'arrayStatusNda', 'arrayMasaBerlakuNda'));
    }

    public function indexPicSigma()
    {
        $pics = PicMitra::where([
            'idPerusahaan' => 3
        ])->get();

        $arrayStatusNda = array();
        $arrayMasaBerlakuNda = array();

        foreach ($pics as $pic) {
            if ($pic->statusNda == 0) {
                array_push($arrayStatusNda, "-");
                array_push($arrayMasaBerlakuNda, "-");
            } elseif ($pic->statusNda == 1) {
                if ($pic->nda->statusNda == 0) {
                    array_push($arrayStatusNda, "Kadaluarsa" . "\r\n" . ($pic->nda->validasiNda == 1 ? "(Valid)" : "(-)"));
                    array_push($arrayMasaBerlakuNda, $pic->nda->tanggalBerakhir);
                } elseif ($pic->nda->statusNda == 1) {
                    array_push($arrayStatusNda, "Aktif" . "\r\n" . ($pic->nda->validasiNda == 1 ? "(Valid)" : "(-)"));
                    array_push($arrayMasaBerlakuNda, $pic->nda->tanggalBerakhir);
                }
            }
        }
        return view('Validator/Sigma/lihatNdaPicSigma', compact('pics', 'arrayStatusNda', 'arrayMasaBerlakuNda'));
    }

    public function indexPicMitra()
    {
        $pics = PicMitra::where([
            'idPerusahaan' => 1
        ])->get();

        $arrayStatusNda = array();
        $arrayMasaBerlakuNda = array();

        foreach ($pics as $pic) {
            if ($pic->statusNda == 0) {
                array_push($arrayStatusNda, "-");
                array_push($arrayMasaBerlakuNda, "-");
            } elseif ($pic->statusNda == 1) {
                if ($pic->nda->statusNda == 0) {
                    array_push($arrayStatusNda, "Kadaluarsa" . "\r\n" . ($pic->nda->validasiNda == 1 ? "(Valid)" : "(-)"));
                    array_push($arrayMasaBerlakuNda, $pic->nda->tanggalBerakhir);
                } elseif ($pic->nda->statusNda == 1) {
                    array_push($arrayStatusNda, "Aktif" . "\r\n" . ($pic->nda->validasiNda == 1 ? "(Valid)" : "(-)"));
                    array_push($arrayMasaBerlakuNda, $pic->nda->tanggalBerakhir);
                }
            }
        }
        return view('Validator/Mitra/lihatNdaPicMitra', compact('pics', 'arrayStatusNda', 'arrayMasaBerlakuNda'));
    }

    public function indexUploadNda($id)
    {

        $pic = PicMitra::where([
            'id' => $id
        ])->get()->first();

        if (!$pic) {
            return redirect()->back()
                ->with([
                    'status' => 'danger',
                    'message' => 'Data PIC Mitra dengan ID tersebut tidak ditemukan.'
                ]);
        }

        return view('Validator/uploadNda', compact('pic'));
    }

    public function uploadNda(Request $request)
    {

        $this->validate($request, [
            'nda' => 'bail|required|mimes:pdf,jpeg,png,jpg|max:2000',
        ], [
            'required' => ':Attribute tidak boleh kosong !',
            'mimes' => ':Attribute gagal diunggah, lampiran harus berupa PDF',
            'max' => 'Ukuran maksimum :Attribute sebesar 2 Megabyte',
        ]);

        $pic = PicMitra::where([
            'id' => $request->id
        ])->get()->first();

        if (!$pic) {
            return redirect()->back()
                ->with([
                    'status' => 'danger',
                    'message' => 'Data PIC Mitra dengan ID tersebut tidak ditemukan.'
                ]);
        }

        if ($pic->statusNda == 0) {
            $path = Storage::putFile(
                'NDA', $request->file('nda')
            );

            if ($pic->idPerusahaan == 1) {
                $ndaBaru = Nda::create([
                    'path' => $path,
                    'idPicMitra' => $pic->id,
                    'pathUri' => substr($path, 4),
                    'tanggalBerlaku' => date('Y-m-d'),
                    'tanggalBerakhir' => $pic->petugas->first()->suratMasuk->pekerjaan->tanggalBerakhir,
                    'statusNda' => 0,
                    'validasiNda' => 1
                ]);
            } else {
                $ndaBaru = Nda::create([
                    'path' => $path,
                    'idPicMitra' => $pic->id,
                    'pathUri' => substr($path, 4),
                    'tanggalBerlaku' => date('Y-m-d'),
                    'tanggalBerakhir' => date('Y-m-d', strtotime("+1 years")),
                    'statusNda' => 0,
                    'validasiNda' => 1
                ]);
            }
        } else {
            $NdaLama = Nda::where([
                'idPicMitra' => $request->id
            ])->get()->first();


            Storage::delete($NdaLama->path);
            $NdaLama->delete();

            $path = Storage::putFile(
                'NDA', $request->file('nda')
            );

            if ($pic->idPerusahaan == 1) {
                $ndaBaru = Nda::create([
                    'path' => $path,
                    'idPicMitra' => $pic->id,
                    'pathUri' => substr($path, 4),
                    'tanggalBerlaku' => date('Y-m-d'),
                    'tanggalBerakhir' => $pic->petugas->first()->suratMasuk->pekerjaan->tanggalBerakhir,
                    'statusNda' => 0,
                    'validasiNda' => 1
                ]);
            } else {
                $ndaBaru = Nda::create([
                    'path' => $path,
                    'idPicMitra' => $pic->id,
                    'pathUri' => substr($path, 4),
                    'tanggalBerlaku' => substr($request->berlakuNDA, 0, 10),
                    'tanggalBerakhir' => substr($request->berlakuNDA, 13, 10),
                    'statusNda' => 0,
                    'validasiNda' => 1
                ]);
            }
        }

        $pic->update([
            'statusNda' => 1
        ]);

        $statusNda = NdaController::checkTimes($ndaBaru->tanggalBerlaku, $ndaBaru->tanggalBerakhir, date('Y-m-d'));

        $ndaBaru->update([
            'statusNda' => ($statusNda == true ? 1 : 0)
        ]);

        if ($pic->idPerusahaan == 1) {
            return redirect()->route('get-validatorLihatNdaMitra')
                ->with([
                    'status' => 'success',
                    'message' => 'NDA Petugas ' . $pic->nama . ' Berhasil diunggah, Berlaku hingga ' . NdaController::formatTanggalIndo($ndaBaru->tanggalBerakhir) . ' !'
                ]);
        } elseif ($pic->idPerusahaan == 2) {
            return redirect()->route('get-validatorLihatNdaTelkomAkses')
                ->with([
                    'status' => 'success',
                    'message' => 'NDA Petugas ' . $pic->nama . ' Berhasil diunggah, Berlaku hingga ' . NdaController::formatTanggalIndo($ndaBaru->tanggalBerakhir) . ' !'
                ]);
        } elseif ($pic->idPerusahaan == 3) {
            return redirect()->route('get-validatorLihatNdaSigma')
                ->with([
                    'status' => 'success',
                    'message' => 'NDA Petugas ' . $pic->nama . ' Berhasil diunggah, Berlaku hingga ' . NdaController::formatTanggalIndo($ndaBaru->tanggalBerakhir) . ' !'
                ]);
        } else {
            return redirect()->route('get-validatorLihatNdaTkmNetra')
                ->with([
                    'status' => 'success',
                    'message' => 'NDA Petugas ' . $pic->nama . ' Berhasil diunggah, Berlaku hingga ' . NdaController::formatTanggalIndo($ndaBaru->tanggalBerakhir) . ' !'
                ]);
        }


    }

//    public function validasiNda($id)
//    {
//        $pic = PicMitra::where([
//            'id' => $id
//        ])->get()->first();
//
//        if (!$pic) {
//            return redirect()->back()
//                ->with([
//                    'status' => 'danger',
//                    'message' => 'Data PIC Mitra tidak ditemukan!'
//                ]);
//        }
//
//        if ($pic->statusNda == 0) {
//            return redirect()->back()
//                ->with([
//                    'status' => 'danger',
//                    'message' => 'PIC Mitra belum memiliki NDA!'
//                ]);
//        }
//
//        if ($pic->nda->validasiNda == 1) {
//            return redirect()->back()
//                ->with([
//                    'status' => 'warning',
//                    'message' => 'NDA sudah tervalidasi sebelumnya'
//                ]);
//        }
//
//        if ($pic->nda->path == '-') {
//            return redirect()->back()
//                ->with([
//                    'status' => 'warning',
//                    'message' => 'NDA PIC belum diupload untuk divalidasi'
//                ]);
//        }
//
//        $pic->nda->update([
//            'validasiNda' => 1
//        ]);
//
//        if ($pic->idPerusahaan == 1) {
//            return redirect()->route('get-validatorLihatNdaMitra')
//                ->with([
//                    'status' => 'success',
//                    'message' => 'NDA Petugas ' . $pic->nama . ' Berhasil divalidasi!'
//                ]);
//        } elseif ($pic->idPerusahaan == 2) {
//            return redirect()->route('get-validatorLihatNdaTelkomAkses')
//                ->with([
//                    'status' => 'success',
//                    'message' => 'NDA Petugas ' . $pic->nama . ' Berhasil divalidasi!'
//                ]);
//        } elseif ($pic->idPerusahaan == 3) {
//            return redirect()->route('get-validatorLihatNdaSigma')
//                ->with([
//                    'status' => 'success',
//                    'message' => 'NDA Petugas ' . $pic->nama . ' Berhasil divalidasi!'
//                ]);
//        } else {
//            return redirect()->route('get-validatorLihatNdaTkmNetra')
//                ->with([
//                    'status' => 'success',
//                    'message' => 'NDA Petugas ' . $pic->nama . ' Berhasil divalidasi!'
//                ]);
//        }
//    }

    public function hapusNda($id)
    {
        $pic = PicMitra::where([
            'id' => $id
        ])->get()->first();

        if (!$pic) {
            return redirect()->back()
                ->with([
                    'status' => 'danger',
                    'message' => 'Data PIC Mitra dengan ID tersebut tidak ditemukan.'
                ]);
        }

        if ($pic->statusNda == 0) {
            return redirect()->back()
                ->with([
                    'status' => 'danger',
                    'message' => 'PIC Mitra Belum memiliki NDA!'
                ]);
        } else {
            $NdaLama = Nda::where([
                'idPicMitra' => $id
            ])->get()->first();


            Storage::delete($NdaLama->path);
            $NdaLama->delete();

            $pic->update([
                'statusNda' => 0
            ]);
        }

        return redirect()->back()
            ->with([
                'status' => 'success',
                'message' => 'NDA Petugas ' . $pic->nama . ' berhasil dihapus!'
            ]);

    }

    public function lihatNda($path)
    {

        $nda = Nda::where([
            'pathUri' => $path,
        ])->get()->first();

        if (!$nda) {
            return redirect()->back()
                ->with([
                    'status' => 'warning',
                    'message' => 'PIC Mitra Belum memiliki NDA!'
                ]);
        }

        $exist = Storage::exists($nda->path);

        if (!$exist) {
            return redirect()->back()
                ->with([
                    'status' => 'warning',
                    'message' => 'NDA PIC Belum di upload!'
                ]);
        }

        return response()->file(Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix() . $nda->path);
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
