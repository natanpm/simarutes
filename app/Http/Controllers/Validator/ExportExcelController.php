<?php

namespace App\Http\Controllers\Validator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PicTelkom;
use App\PicMitra;
use App\Pekerjaan;
use Excel;

class ExportExcelController extends Controller
{
    public function indexExportSimaru()
    {
        return view('Validator/exportSuratMasuk');
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
            return redirect()->route('get-validatorIndexExportSimaru')
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
            return redirect()->route('get-validatorLihatPicTelkom')
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
            return redirect()->route('get-validatorLihatPicTelkomAkses')
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

    public function exportMitratel(Request $request)
    {
        $raw = PicMitra::where([
            'idPerusahaan' => 5
        ])->get()->sortBy('idUnitPerusahaan');

        if (!$raw->first()) {
            return redirect()->route('get-validatorLihatPicMitratel')
                ->with([
                    'status' => 'warning',
                    'message' => 'Tidak terdapat data PIC Mitratel!'
                ]);
        }

        $pics = array();
        $count = 0;
        foreach ($raw as $pic){
            array_push($pics,[++$count,$pic->nik,$pic->nama,$pic->kontak,$pic->unitPerusahaan->namaUnit]);
        }

        Excel::create("Data PIC Mitratel ".ExportExcelController::formatTanggalIndo(date('Y-m-d')), function ($excel) use ($pics) {

            $excel->setTitle('Data Pic Mitratel');
            $excel->setCreator('SIMARU Apps')->setCompany('Telkom');
            $excel->setDescription('PIC Mitratel');


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
            return redirect()->route('get-validatorLihatPicSigma')
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

    public function exportMitra(Request $request)
    {
        $raw = PicMitra::where([
            'idPerusahaan' => 1
        ])->get()->sortBy('id');

        if (!$raw->first()) {
            return redirect()->route('get-validatorLihatPicMitra')
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

    public function exportTkmNetra(Request $request)
    {
        $raw = PicMitra::where([
            'idPerusahaan' => 4
        ])->get()->sortBy('nama');

        if (!$raw->first()) {
            return redirect()->route('get-validatorlihatPicTkmNetra')
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
