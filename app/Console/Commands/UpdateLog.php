<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\LogMasuk;

class UpdateLog extends Command
{

    protected $signature = 'log:update';


    protected $description = 'Update Log Masuk Scheduled Task';


    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
        $logs = LogMasuk::where([
            'statusLog' => 0,
        ])->get();

        date_default_timezone_set('Asia/Jakarta');
        foreach ($logs as $log) {
            if ((UpdateLog::checkTimes($log->tanggalMasuk, $log->tanggalKeluar, date('Y-m-d')) == false
                || UpdateLog::checkTimes($log->masuk, $log->keluar, date('H:i:s')) == false)) {
                $log->update([
                    'statusLog' => 2
                ]);
            }
        }

        $logs = LogMasuk::where([
            'statusLog' => 3
        ])->get();

        foreach ($logs as $log) {
            if ((UpdateLog::checkTimes($log->tanggalMasuk, $log->tanggalKeluar, date('Y-m-d')) == false
                || UpdateLog::checkTimes($log->masuk, $log->keluar, date('H:i:s')) == false)) {
                $log->update([
                    'statusLog' => 2,
                ]);
            }
        }

        $this->info('Log Masuk Berhasil Di Update!');
    }

    public function checkTimes($tanggalMulai, $tanggalBerakhir, $tanggalSekarang)
    {

        $mulai = strtotime($tanggalMulai);
        $berakhir = strtotime($tanggalBerakhir);
        $sekarang = strtotime($tanggalSekarang);

        if($berakhir <= $mulai) {
            if ($sekarang >= $mulai) {
                return true;
            } else if ($sekarang <= $berakhir) {
                return true;
            }
        }

        return (($sekarang >= $mulai) && ($sekarang <= $berakhir));
    }
}
