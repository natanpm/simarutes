<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use App\BeritaSimaru;
use Illuminate\Http\Request;
use App\SuratKeluarBarang;

class beritaSimaruController extends Controller
{

    public function indexBuatBerita()

    {

         $pesan = SuratKeluarBarang::where([
           'statusSurat'=>0,
           'tanggal'=> date('Y-m-d'),
           
        ])->get()->count();

         $content = [
            'pesan' => $pesan,
  
        ];

        return view('Security/Berita/buatBerita', compact('content'));
    }

    public function indexEditBerita($id)
    {

         $pesan = SuratKeluarBarang::where([
           'statusSurat'=>0,
           'tanggal'=> date('Y-m-d'),
           
        ])->get()->count();

         $content = [
            'pesan' => $pesan,
  
        ];

        $berita = BeritaSimaru::where([
            'id' => $id
        ])->get()->first();

        if (!$berita) {
            return redirect()->back()
                ->with([
                    'status' => 'danger',
                    'message' => 'Berita dengan ID tersebut tidak ditemukan!'
                ]);
        }
        return view('Security/Berita/editBerita', compact('berita','content'));
    }

    public function lihatBerita()
    {
         $pesan = SuratKeluarBarang::where([
           'statusSurat'=>0,
           'tanggal'=> date('Y-m-d'),
           
        ])->get()->count();

         $content = [
            'pesan' => $pesan,
  
        ];

        $beritas = BeritaSimaru::all();
        return view('Security/Berita/lihatBerita', compact('beritas','content'));
    }

    public function buatBerita(Request $request)
    {

        if ($request->statusBerita == 1) {
            $beritaLama = BeritaSimaru::where([
                'statusBerita' => 1
            ])->update([
                'statusBerita' => 0
            ]);
        }

        $beritaBaru = BeritaSimaru::create([
            'statusKondisi' => $request->statusKondisi,
            'pesan' => $request->pesan,
            'statusBerita' => $request->statusBerita,
        ]);

        return redirect()->back()
            ->with([
                'status' => 'success',
                'message' => 'Berita berhasil dibuat dan ' . ($beritaBaru->statusBerita == 1 ? 'berhasil di publikasi' : 'disimpan')
            ]);
    }

    public function editBerita(Request $request)
    {
        $berita = BeritaSimaru::where([
            'id' => $request->id
        ])->get()->first();

        if (!$berita) {
            return redirect()->back()
                ->with([
                    'status' => 'danger',
                    'message' => 'Berita dengan ID tersebut tidak ditemukan!'
                ]);
        }

        if ($request->statusBerita == 1) {
            $beritaLama = BeritaSimaru::where([
                'statusBerita' => 1
            ])->update([
                'statusBerita' => 0
            ]);
        }

        $berita->update([
            'statusKondisi' => $request->statusKondisi,
            'pesan' => $request->pesan,
            'statusBerita' => $request->statusBerita
        ]);

        return redirect()->route('get-lihatBerita')
            ->with([
                'status' => 'success',
                'message' => 'Berita berhasil diedit dan ' . ($berita->statusBerita == 1 ? 'berhasil di publikasi' : 'disimpan')
            ]);
    }

    public function hapusBerita($id)
    {
        $berita = BeritaSimaru::where([
            'id' => $id
        ])->get()->first();

        if (!$berita) {
            return redirect()->back()
                ->with([
                    'status' => 'danger',
                    'message' => 'Berita dengan ID tersebut tidak ditemukan!'
                ]);
        }

        $berita->delete();

        return redirect()->back()
            ->with([
                'status' => 'success',
                'message' => 'Berita berhasil dihapus !'
            ]);
    }

    public function setAktif($id)
    {
        $berita = BeritaSimaru::where([
            'id' => $id
        ])->get()->first();

        if (!$berita) {
            return redirect()->back()
                ->with([
                    'status' => 'danger',
                    'message' => 'Berita dengan ID tersebut tidak ditemukan!'
                ]);
        }

        if ($berita->statusBerita == 1) {
            return redirect()->back()
                ->with([
                    'status' => 'warning',
                    'message' => 'Berita dengan ID tersebut sudah di publikasi!'
                ]);
        }

        $beritaLama = BeritaSimaru::where([
            'statusBerita' => 1
        ])->update([
            'statusBerita' => 0
        ]);

        $berita->update([
            'statusBerita' => 1
        ]);

        return redirect()->back()
            ->with([
                'status' => 'success',
                'message' => 'Berita dengan ID tersebut berhasil di publikasikan'
            ]);
    }

    public function setPasif($id)
    {
        $berita = BeritaSimaru::where([
            'id' => $id
        ])->get()->first();

        if (!$berita) {
            return redirect()->back()
                ->with([
                    'status' => 'danger',
                    'message' => 'Berita dengan ID tersebut tidak ditemukan!'
                ]);
        }

        if ($berita->statusBerita == 0) {
            return redirect()->back()
                ->with([
                    'status' => 'warning',
                    'message' => 'Berita dengan ID tersebut sudah ditandai sebagai tersimpan (non-aktif)!'
                ]);
        }

        $berita->update([
            'statusBerita' => 0
        ]);

        return redirect()->back()
            ->with([
                'status' => 'success',
                'message' => 'Berita dengan ID tersebut berhasil di non aktifkan'
            ]);
    }

}
