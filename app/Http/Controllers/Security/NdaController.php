<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use App\Nda;
use Illuminate\Http\Request;
use App\PicMitra;
use App\Petugas;
use App\SUratKeluarBarang;
use Illuminate\Support\Facades\Storage;

class NdaController extends Controller
{
    public function tambahkanNda($id)
    {
        $pic = Petugas::where([
            'id' => $id
        ])->get()->first();

        if (!$pic) {
            return redirect()->back()
                ->with([
                    'status' => 'danger',
                    'message' => 'Data PIC Mitra dengan ID tersebut tidak ditemukan.'
                ]);
        }

        if ($pic->picMitra->statusNda == 0) {
            if ($pic->picMitra->idPerusahaan == 1) {
                $ndaBaru = Nda::create([
                    'path' => '-',
                    'idPicMitra' => $pic->picMitra->id,
                    'pathUri' => '-',
                    'tanggalBerlaku' => date('Y-m-d'),
                    'tanggalBerakhir' => $pic->suratMasuk->pekerjaan->tanggalBerakhir,
                    'statusNda' => 0,
                    'validasiNda' => 0
                ]);
            } else {
                $ndaBaru = Nda::create([
                    'path' => '-',
                    'idPicMitra' => $pic->picMitra->id,
                    'pathUri' => '-',
                    'tanggalBerlaku' => date('Y-m-d'),
                    'tanggalBerakhir' => date('Y-m-d', strtotime("+1 years")),
                    'statusNda' => 0,
                    'validasiNda' => 0
                ]);
            }
        } else {
            if ($pic->picMitra->nda->statusNda == 1) {
                return redirect()->back()
                    ->with([
                        'status' => 'warning',
                        'message' => 'NDA PIC Mitra ' . $pic->nama . ' sudah aktif.'
                    ]);
            }

            $NdaLama = Nda::where([
                'idPicMitra' => $pic->picMitra->id
            ])->get()->first();

            Storage::delete($NdaLama->path);
            $NdaLama->delete();

            if ($pic->idPerusahaan == 1) {
                $ndaBaru = Nda::create([
                    'path' => '-',
                    'idPicMitra' => $pic->picMitra->id,
                    'pathUri' => '-',
                    'tanggalBerlaku' => date('Y-m-d'),
                    'tanggalBerakhir' => $pic->suratMasuk->pekerjaan->tanggalBerakhir,
                    'statusNda' => 0,
                    'validasiNda' => 0
                ]);
            } else {
                $ndaBaru = Nda::create([
                    'path' => '-',
                    'idPicMitra' => $pic->picMitra->id,
                    'pathUri' => '-',
                    'tanggalBerlaku' => date('Y-m-d'),
                    'tanggalBerakhir' => date('Y-m-d', strtotime("+1 years")),
                    'statusNda' => 0,
                    'validasiNda' => 0
                ]);
            }
        }

        $pic->picMitra->update([
            'statusNda' => 1
        ]);

        $statusNda = NdaController::checkTimes($ndaBaru->tanggalBerlaku, $ndaBaru->tanggalBerakhir, date('Y-m-d'));

        $ndaBaru->update([
            'statusNda' => ($statusNda == true ? 1 : 0)
        ]);

        return redirect()->back()->with([
            'status' => 'success',
            'message' => 'NDA Petugas ' . $pic->picMitra->nama . ' telah aktif, Berlaku hingga ' . NdaController::formatTanggalIndo($ndaBaru->tanggalBerakhir) . ' !'
        ]);


    }

    public function batalkanNda($id)
    {
        $pic = Petugas::where([
            'id' => $id
        ])->get()->first();

        if (!$pic) {
            return redirect()->back()
                ->with([
                    'status' => 'danger',
                    'message' => 'Data PIC Mitra dengan ID tersebut tidak ditemukan.'
                ]);
        }

        if ($pic->picMitra->statusNda == 1) {
            if ($pic->picMitra->nda->path == '-') {
                $nda = Nda::where([
                    'idPicMitra' => $pic->picMitra->id
                ])->get()->first();

                $nda->delete();

                $pic->picMitra->update([
                    'statusNda' => 0
                ]);

                return redirect()->back()
                    ->with([
                        'status' => 'success',
                        'message' => 'NDA PIC Mitra atas nama ' . $pic->picMitra->nama . ' berhasil dibatalkan!'
                    ]);
            } else {
                return redirect()->back()
                    ->with([
                        'status' => 'danger',
                        'message' => 'NDA tidak bisa dihapus, sudah divalidasi oleh admin!'
                    ]);
            }
        }

        return redirect()->back()
            ->with([
                'status' => 'danger',
                'message' => 'PIC Mitra belum memiliki NDA!'
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
                    'message' => 'PIC Belum memiliki NDA!'
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
