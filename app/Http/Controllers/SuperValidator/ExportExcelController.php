<?php

namespace App\Http\Controllers\SuperValidator;

use App\Http\Controllers\Controller;
use App\LogMasuk;
use Illuminate\Http\Request;
use App\PicTelkom;
use App\PicMitra;
use App\Lokasi;
use App\Pekerjaan;
use Excel;

class ExportExcelController extends Controller
{
    public function indexExportLogBook()
    {
        $lokasis = Lokasi::all();
        return view('SuperValidator/exportLogBook', compact('lokasis'));
    }

    public function indexExportSimaru()
    {
        return view('SuperValidator/exportSimaru');
    }

    public function exportLogBook(Request $request)
    {
        if ($request->lokasi == 1) {
            $logs = LogMasuk::where([
                'statusLog' => 1
            ])->get()->sortBy('idLokasi');
        } else {
            $logs = LogMasuk::where([
                'idLokasi' => $request->lokasi,
                'statusLog' => 1
            ])->get()->sortBy('tanggal');
        }

        $raw = array();

        foreach ($logs as $log) {
            if (ExportExcelController::checkTimes(substr($request->tanggal, 0, 10), substr($request->tanggal, 13, 10), $log->tanggalMasuk)) {
                array_push($raw, $log);
            };
        }

        if (!$raw) {
            return redirect()->route('get-superValidatorIndexExportLogBook')
                ->with([
                    'status' => 'warning',
                    'message' => 'Tidak terdapat log pada rentang tanggal tersebut!'
                ]);
        }

        $lokasi = '';

        $logArray = array();
        $count = 0;
        foreach ($logs as $log) {
            $tahun = substr($log->suratMasuk->nomorSurat, -4);
            $angka = str_replace($tahun, '', $log->suratMasuk->nomorSurat);
            $namaInstansi = $log->petugas->picMitra->unitPerusahaan->namaUnit;
            if($log->petugas->picMitra->idPerusahaan == 1){
                $namaInstansi = $log->petugas->picMitra->keterangan;
            }
            $listWaspang = '';
            foreach ($log->suratMasuk->waspang as $waspang){
                $listWaspang = $listWaspang.$waspang->picTelkom->nama."\r\n";
            }
            array_push($logArray, [++$count,
                'Tel '.$angka.'/SIMARU/SBS/'.$tahun,
                $log->petugas->picMitra->nik,
                $log->petugas->picMitra->nama,
                $log->petugas->picMitra->perusahaan->namaPerusahaan,
                $namaInstansi,
                $log->$listWaspang,
                $log->lokasi->lokasi,
                $log->securityMasuk->nama,
                $log->securityKeluar->nama,
                $log->suratMasuk->pekerjaan->jamMasuk . ' ' . $log->suratMasuk->pekerjaan->jamKeluar,
                $log->masuk . ' ' . $log->keluar,
                $log->keterangan,
                $log->pesan,
            ]);
        }

        if($request->lokasi == 1){
            $lokasi = 'ALL STO SURABAYA SELATAN';
        }else{
            $lokasi = $logs->first()->lokasi->lokasi;
        }

        Excel::create("Data LogBook ".$lokasi." ".ExportExcelController::formatTanggalIndo(date('Y-m-d')), function ($excel) use ($logArray) {

            $excel->setTitle('Data LogBook Waru');
            $excel->setCreator('SIMARU Apps')->setCompany('Telkom');
            $excel->setDescription('LogBook Waru');

            $excel->sheet('sheet1', function ($sheet) use ($logArray) {
                $sheet->fromArray($logArray, null, 'A1', false, false);
                $headings = array('No',
                    'SIMARU',
                    'No Identitas',
                    'Nama',
                    'Perusahaan',
                    'Unit Perusahaan',
                    'PIC Telkom',
                    'Lokasi',
                    'Pemberi Izin Masuk',
                    'Pemberi Izin Keluar',
                    'Waktu Kerja',
                    'Waktu Log',
                    'Keterangan',
                    'Pesan');
                $sheet->prependRow(1, $headings);

                $sheet->setFreeze('A2');

                $sheet->cells('A1:N1', function ($cells) {
                    $cells->setAlignment('center');
                    $cells->setValignment('center');
                    $cells->setFont(array(
                        'bold' => true
                    ));
                    $cells->setBackground('#008000');
                    $cells->setFontColor('#ffffff');
                });

                $sheet->setBorder('A1:N1', 'medium');

            });

        })->download('xlsx');
    }

    public function exportSimaru(Request $request)
    {
        $pekerjaans = Pekerjaan::all();
        $raw = array();

        foreach ($pekerjaans as $pekerjaan) {
            if (ExportExcelController::checkTimes(substr($request->tanggal, 0, 10), substr($request->tanggal, 13, 10), $pekerjaan->tanggalMulai)) {
                array_push($raw, $pekerjaan->suratMasuk);
            };
        }

        if (!$raw) {
            return redirect()->route('get-superValidatorIndexExportSimaru')
                ->with([
                    'status' => 'warning',
                    'message' => 'Tidak terdapat surat pada rentang tanggal tersebut!'
                ]);
        }


        $surats = collect($raw)->sortBy('nomorSurat');

        $simaruArray = array();
        $count = 0;
        foreach ($surats as $surat){
            $tahun = substr($surat->nomorSurat, -4);
            $angka = str_replace($tahun, '', $surat->nomorSurat);

            $listWaspang = '';
            foreach ($surat->waspang as $waspang){
                $listWaspang = $listWaspang.$waspang->picTelkom->nama."\r\n";
            }
            array_push($simaruArray,[++$count, 'Tel '.$angka.'/SIMARU/SBS/'.$tahun, ucwords(strtolower($surat->kepada)), $surat->perihal, $surat->suratDinas, ucwords(strtolower($listWaspang)), $surat->pekerjaan->kegiatan, $surat->keterangan,ExportExcelController::formatTanggalIndo($surat->pekerjaan->tanggalMulai).' s/d '.ExportExcelController::formatTanggalIndo($surat->pekerjaan->tanggalBerakhir), $surat->pekerjaan->jamMasuk.'-'.$surat->pekerjaan->jamKeluar]);
        }

        Excel::create('Data SIMARU '.ExportExcelController::formatTanggalIndo(date('Y-m-d')), function ($excel) use ($simaruArray) {

            $excel->setTitle('SIMARU');
            $excel->setCreator('SIMARU Apps')->setCompany('Telkom');
            $excel->setDescription('SIMARU');


            $excel->sheet('sheet1', function ($sheet) use ($simaruArray) {

                $sheet->fromArray($simaruArray, null, 'A1', false, false);
                $headings = array('No', 'Nomor Surat', 'Kepada', 'Perihal', 'Surat Dinas', 'Pic Telkom', 'Kegiatan','Keterangan','Tanggal', 'Jam');
                $sheet->prependRow(1, $headings);

                $sheet->setFreeze('A2');

                $sheet->cells('A1:J1', function ($cells) {
                    $cells->setAlignment('center');
                    $cells->setValignment('center');
                    $cells->setFont(array(
                        'bold' => true
                    ));
                    $cells->setBackground('#008000');
                    $cells->setFontColor('#ffffff');
                });

                $sheet->setBorder('A1:J1', 'medium');

            });

        })->download('xlsx');
    }

    public function exportPicTelkom(Request $request)
    {
        $raw = PicTelkom::all()->sortBy('unit');

        if (!$raw->first()) {
            return redirect()->route('get-superValidatorLihatPicTelkom')
                ->with([
                    'status' => 'warning',
                    'message' => 'Tidak terdapat data PIC Telkom!'
                ]);
        }

        $picTelkomArray = array();
        $count = 0;
        foreach ($raw as $pic){
            array_push($picTelkomArray,[++$count,$pic->nik,$pic->nama,$pic->kontak,$pic->unit]);
        }

        Excel::create("Data PIC Telkom ".ExportExcelController::formatTanggalIndo(date('Y-m-d')), function ($excel) use ($picTelkomArray) {

            $excel->setTitle('Data Pic Telkom');
            $excel->setCreator('SIMARU Apps')->setCompany('Telkom');
            $excel->setDescription('PIC Telkom');


            $excel->sheet('sheet1', function ($sheet) use ($picTelkomArray) {

                $sheet->fromArray($picTelkomArray, null, 'A1', false, false);
                $headings = array('No','NIK', 'Nama', 'Kontak', 'Unit');
                $sheet->prependRow(1, $headings);

                $sheet->setFreeze('A2');

                $sheet->cells('A1:E1', function ($cells) {
                    $cells->setAlignment('center');
                    $cells->setValignment('center');
                    $cells->setFont(array(
                        'bold' => true
                    ));
                    $cells->setBackground('#008000');
                    $cells->setFontColor('#ffffff');
                });

                $sheet->setBorder('A1:E1', 'medium');

            });

        })->download('xlsx');
    }

    public function exportTelkomAkses(Request $request)
    {
        $raw = PicMitra::where([
            'idPerusahaan' => 2
        ])->get()->sortBy('idUnitPerusahaan');

        if (!$raw->first()) {
            return redirect()->route('get-superValidatorLihatPicTelkomAkses')
                ->with([
                    'status' => 'warning',
                    'message' => 'Tidak terdapat data PIC Telkom Akses!'
                ]);
        }

        $pics = array();
        $count = 0;
        foreach ($raw as $pic){
            array_push($pics,[++$count,$pic->nik,$pic->nama,$pic->kontak,$pic->unitPerusahaan->namaUnit]);
        }

        Excel::create("Data PIC Telkom Akses ".ExportExcelController::formatTanggalIndo(date('Y-m-d')), function ($excel) use ($pics) {

            $excel->setTitle('Data Pic Telkom Akses');
            $excel->setCreator('SIMARU Apps')->setCompany('Telkom');
            $excel->setDescription('PIC Telkom Akses');


            $excel->sheet('sheet1', function ($sheet) use ($pics) {

                $sheet->fromArray($pics, null, 'A1', false, false);
                $headings = array('No','NIK', 'Nama', 'Kontak', 'Unit');
                $sheet->prependRow(1, $headings);

                $sheet->setFreeze('A2');

                $sheet->cells('A1:E1', function ($cells) {
                    $cells->setAlignment('center');
                    $cells->setValignment('center');
                    $cells->setFont(array(
                        'bold' => true
                    ));
                    $cells->setBackground('#008000');
                    $cells->setFontColor('#ffffff');
                });

                $sheet->setBorder('A1:E1', 'medium');

            });

        })->download('xlsx');
    }

    public function exportSigma(Request $request)
    {
        $raw = PicMitra::where([
            'idPerusahaan' => 3
        ])->get()->sortBy('idUnitPerusahaan');

        if (!$raw->first()) {
            return redirect()->route('get-superValidatorLihatPicSigma')
                ->with([
                    'status' => 'warning',
                    'message' => 'Tidak terdapat data PIC SIGMA!'
                ]);
        }

        $pics = array();
        $count = 0;
        foreach ($raw as $pic){
            array_push($pics,[++$count,$pic->nama,$pic->kontak,$pic->unitPerusahaan->namaUnit]);
        }

        Excel::create("Data PIC SIGMA ".ExportExcelController::formatTanggalIndo(date('Y-m-d')), function ($excel) use ($pics) {

            $excel->setTitle('Data Pic SIGMA');
            $excel->setCreator('SIMARU Apps')->setCompany('Telkom');
            $excel->setDescription('PIC SIGMA');


            $excel->sheet('sheet1', function ($sheet) use ($pics) {

                $sheet->fromArray($pics, null, 'A1', false, false);
                $headings = array('No', 'Nama', 'Kontak', 'Unit');
                $sheet->prependRow(1, $headings);

                $sheet->setFreeze('A2');

                $sheet->cells('A1:D1', function ($cells) {
                    $cells->setAlignment('center');
                    $cells->setValignment('center');
                    $cells->setFont(array(
                        'bold' => true
                    ));
                    $cells->setBackground('#008000');
                    $cells->setFontColor('#ffffff');
                });

                $sheet->setBorder('A1:D1', 'medium');

            });

        })->download('xlsx');
    }

    public function exportTkmNetra(Request $request)
    {
        $raw = PicMitra::where([
            'idPerusahaan' => 4
        ])->get()->sortBy('nama');

        if (!$raw->first()) {
            return redirect()->route('get-superValidatorLihatPicTkmNetra')
                ->with([
                    'status' => 'warning',
                    'message' => 'Tidak terdapat data PIC TKM Netra!'
                ]);
        }

        $pics = array();
        $count = 0;
        foreach ($raw as $pic){
            array_push($pics,[++$count,$pic->nik,$pic->nama,$pic->kontak,$pic->unitPerusahaan->namaUnit]);
        }

        Excel::create("Data PIC TKM NETRA ".ExportExcelController::formatTanggalIndo(date('Y-m-d')), function ($excel) use ($pics) {

            $excel->setTitle('Data PIC TKM NETRA');
            $excel->setCreator('SIMARU Apps')->setCompany('Telkom');
            $excel->setDescription('PIC TKM NETRA');


            $excel->sheet('sheet1', function ($sheet) use ($pics) {

                $sheet->fromArray($pics, null, 'A1', false, false);
                $headings = array('No','No Identitas', 'Nama', 'Kontak', 'Unit');
                $sheet->prependRow(1, $headings);

                $sheet->setFreeze('A2');

                $sheet->cells('A1:E1', function ($cells) {
                    $cells->setAlignment('center');
                    $cells->setValignment('center');
                    $cells->setFont(array(
                        'bold' => true
                    ));
                    $cells->setBackground('#008000');
                    $cells->setFontColor('#ffffff');
                });

                $sheet->setBorder('A1:E1', 'medium');

            });

        })->download('xlsx');
    }

    public function exportMitra(Request $request)
    {
        $raw = PicMitra::where([
            'idPerusahaan' => 1
        ])->get()->sortBy('id');

        if (!$raw->first()) {
            return redirect()->route('get-superValidatorLihatPicMitra')
                ->with([
                    'status' => 'warning',
                    'message' => 'Tidak terdapat data PIC Mitra!'
                ]);
        }

        $pics = array();
        $count = 0;
        foreach ($raw as $pic){
            $tahun = substr($pic->petugas->first()->suratMasuk->nomorSurat, -4);
            $angka = str_replace($tahun, '', $pic->petugas->first()->suratMasuk->nomorSurat);
            array_push($pics,[++$count,$pic->nik,$pic->nama,$pic->kontak,$pic->keterangan,'Tel '.$angka.'/SIMARU/SBS/'.$tahun]);
        }

        Excel::create("Data PIC Mitra Umum ".ExportExcelController::formatTanggalIndo(date('Y-m-d')), function ($excel) use ($pics) {

            $excel->setTitle('Data Pic Mitra Umum');
            $excel->setCreator('SIMARU Apps')->setCompany('Telkom');
            $excel->setDescription('PIC Mitra Umum');


            $excel->sheet('sheet1', function ($sheet) use ($pics) {

                $sheet->fromArray($pics, null, 'A1', false, false);
                $headings = array('No','No Identitas','Nama', 'Kontak','Instansi','Nomor Simaru');
                $sheet->prependRow(1, $headings);

                $sheet->setFreeze('A2');

                $sheet->cells('A1:F1', function ($cells) {
                    $cells->setAlignment('center');
                    $cells->setValignment('center');
                    $cells->setFont(array(
                        'bold' => true
                    ));
                    $cells->setBackground('#008000');
                    $cells->setFontColor('#ffffff');
                });

                $sheet->setBorder('A1:F1', 'medium');

            });

        })->download('xlsx');
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
