<?php

namespace App\Console\Commands;

use App\Nda;
use Illuminate\Console\Command;

class UpdateNda extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nda:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update NDA Scheduled Task';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $ndas = Nda::where([
            'statusNda' => 1
        ])->get();

        date_default_timezone_set('Asia/Jakarta');
        foreach ($ndas as $nda) {
            if (UpdateNda::checkTimes($nda->tanggalBerlaku, $nda->tanggalBerakhir, date('Y-m-d')) == false){
                $nda->update([
                    'statusNda' => 0
                ]);
            }
        }

        $this->info('NDA Berhasil Di Update!');
    }

    public function checkTimes($tanggalMulai, $tanggalBerakhir, $tanggalSekarang)
    {

        $mulai = strtotime($tanggalMulai);
        $berakhir = strtotime($tanggalBerakhir);
        $sekarang = strtotime($tanggalSekarang);

        return (($sekarang >= $mulai) && ($sekarang <= $berakhir));
    }
}
