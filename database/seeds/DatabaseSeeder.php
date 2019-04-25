<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Lokasi
//         DB::table('lokasi')->insert([
//             'lokasi' => 'All STO Netra Surabaya'
//         ]);
//         DB::table('lokasi')->insert([
//             'lokasi' => 'STO Waru 1'
//         ]);
//         DB::table('lokasi')->insert([
//             'lokasi' => 'STO Injoko'
//         ]);
//         DB::table('lokasi')->insert([
//             'lokasi' => 'STO Rungkut'
//         ]);
//         DB::table('lokasi')->insert([
//             'lokasi' => 'STO Jagir'
//         ]);
//         DB::table('lokasi')->insert([
//             'lokasi' => 'STO Tropodo'
//         ]);
//         DB::table('lokasi')->insert([
//             'lokasi' => 'STO Kebalen'
//         ]);
//         DB::table('lokasi')->insert([
//             'lokasi' => 'STO Manyar'
//         ]);
//         DB::table('lokasi')->insert([
//             'lokasi' => 'STO Darmo'
//         ]);
//         DB::table('lokasi')->insert([
//             'lokasi' => 'STO Gubeng'
//         ]);
//         DB::table('lokasi')->insert([
//             'lokasi' => 'STO Kapasan'
//         ]);
//         DB::table('lokasi')->insert([
//             'lokasi' => 'STO Kenjeran'
//         ]);
//         DB::table('lokasi')->insert([
//             'lokasi' => 'STO Tandes'
//         ]);
//         DB::table('lokasi')->insert([
//             'lokasi' => 'STO Lakarsantri'
//         ]);
//         DB::table('lokasi')->insert([
//             'lokasi' => 'STO Kandangan'
//         ]);
//         DB::table('lokasi')->insert([
//             'lokasi' => 'STO Karangpilang'
//         ]);
//         DB::table('lokasi')->insert([
//             'lokasi' => 'STO Bambe'
//         ]);
//         DB::table('lokasi')->insert([
//             'lokasi' => 'STO Mergoyoso'
//         ]);
//         DB::table('lokasi')->insert([
//             'lokasi' => 'STO Kalianak'
//         ]);
//         DB::table('lokasi')->insert([
//             'lokasi' => 'Plasa Yan Garuda'
//         ]);
//         DB::table('lokasi')->insert([
//             'lokasi' => 'Plasa Yan Tandes'
//         ]);
//         DB::table('lokasi')->insert([
//             'lokasi' => 'Plasa Yan Dinoyo'
//         ]);
//         DB::table('lokasi')->insert([
//             'lokasi' => 'Telkom Ketintang'
//         ]);

// //        PIC TELKOM
//         DB::table('picTelkom')->insert([
//             'nik' => '642572',
//             'nama' => 'HARMIN DJAYA',
//             'kontak' => '0851-0198-1010',
//             'unit' => 'OPTIMA',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '633496',
//             'nama' => 'MICHAEL WIBOWO HARIYANTO',
//             'kontak' => '0822-2551-1511',
//             'unit' => 'OPTIMA',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '640859',
//             'nama' => 'AHMAD RIVAI',
//             'kontak' => '0812-3230-0354',
//             'unit' => 'OPTIMA/TA WIFI',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '630709',
//             'nama' => 'HARRY PRASETYO',
//             'kontak' => '0857-4856-6939',
//             'unit' => 'OPTIMA',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '621326',
//             'nama' => 'DEDI JUNAEDI',
//             'kontak' => '0813-3035-0030',
//             'unit' => 'SIGMA',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '660413',
//             'nama' => 'I GDE WIRAYASA',
//             'kontak' => '0812-3493-9101',
//             'unit' => 'SIGMA',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '835540',
//             'nama' => 'ABDUL ROHIM',
//             'kontak' => '0812-3444-1983',
//             'unit' => 'TELIN',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '-',
//             'nama' => 'DANANG SANTOSO',
//             'kontak' => '0821-7302-9559',
//             'unit' => 'TELIN',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '611386',
//             'nama' => 'ANANG SUSANTO',
//             'kontak' => '0813-3289-4448',
//             'unit' => 'NETRA',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '622233',
//             'nama' => 'ADI WARTONO',
//             'kontak' => '0851-0903-2362',
//             'unit' => 'NETRA',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '710506',
//             'nama' => 'IKHWAN HARAPAN',
//             'kontak' => '0812-3456-1234',
//             'unit' => 'NETRA',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '640986',
//             'nama' => 'ACHMAD MUSLICH',
//             'kontak' => '0813-3209-2555',
//             'unit' => 'NETRA',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '631160',
//             'nama' => 'ISMU SUROSO',
//             'kontak' => '0851-0400-0910',
//             'unit' => 'NETRA',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '920268',
//             'nama' => 'NATANAEL PANDAPOTAN',
//             'kontak' => '0813-1010-8341',
//             'unit' => 'NETRA',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '640136',
//             'nama' => 'BAMBANG SETYO S',
//             'kontak' => '0812-3128-9674',
//             'unit' => 'NETRA',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '620181',
//             'nama' => 'PARIYUN',
//             'kontak' => '0851-0054-0638',
//             'unit' => 'NETRA',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '641160',
//             'nama' => 'HADY SISWANTO',
//             'kontak' => '0812-1789-5138',
//             'unit' => 'NETRA',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '621939',
//             'nama' => 'HERIDIK',
//             'kontak' => '0857-6085-1354',
//             'unit' => 'NETRA',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '621980',
//             'nama' => 'SARTONO',
//             'kontak' => '0851-0300-6400',
//             'unit' => 'NETRA',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '730331',
//             'nama' => 'DANNY ARIFIAN IDIARTO',
//             'kontak' => '0811-1732-669',
//             'unit' => 'DTVV',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '-',
//             'nama' => 'FIANDANA RIZKY',
//             'kontak' => '0838-3195-5682',
//             'unit' => 'DTVV',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '890041',
//             'nama' => 'HAFIDH AL AFIF',
//             'kontak' => '0821-2160-6818',
//             'unit' => 'DDTV',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '632340',
//             'nama' => 'YULMAN',
//             'kontak' => '0811-3587-412',
//             'unit' => 'RWS-V',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '641535',
//             'nama' => 'AGUS SUKONTO',
//             'kontak' => '0822-4591-7609',
//             'unit' => 'RWS-V',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '631619',
//             'nama' => 'SYAHRUL AMIN',
//             'kontak' => '0813-3150-8586',
//             'unit' => 'RWS-V',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '641127',
//             'nama' => 'SUPRIJANTO',
//             'kontak' => '0812-3493-9787',
//             'unit' => 'ED REG-V',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '650634',
//             'nama' => 'SARDI',
//             'kontak' => '0822-4455-9876',
//             'unit' => 'ED REG-V',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '632363',
//             'nama' => 'EKO PRASETYO',
//             'kontak' => '0821-8547-4105',
//             'unit' => 'ED REG-V',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '640955',
//             'nama' => 'PRIYO BASUKI',
//             'kontak' => '0812-3256-0300',
//             'unit' => 'ED REG-V',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '631157',
//             'nama' => 'MOCH BADRUL QOMAR',
//             'kontak' => '0813-3008-7772',
//             'unit' => 'ED REG-V',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '623482',
//             'nama' => 'ADJI PONTJO WARNO',
//             'kontak' => '0823-3265-1965',
//             'unit' => 'ED REG-V',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '631648',
//             'nama' => 'AGUS MINTONO',
//             'kontak' => '0821-4333-8755',
//             'unit' => 'ED REG-V',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '622401',
//             'nama' => 'DJAJA ROSADA',
//             'kontak' => '0812-3194-5803',
//             'unit' => 'IM REG-V',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '632305',
//             'nama' => 'SUHARTO',
//             'kontak' => '0821-3148-2418',
//             'unit' => 'IM REG-V',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '-',
//             'nama' => 'CANDRA PATRIYANTO',
//             'kontak' => '0853-3085-2225',
//             'unit' => 'GSD',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '-',
//             'nama' => 'IVANA AULIA',
//             'kontak' => '0821-4072-3816',
//             'unit' => 'GSD',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '-',
//             'nama' => 'EKO HARDIAN',
//             'kontak' => '0812-2123-0330',
//             'unit' => 'GSD',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '-',
//             'nama' => 'MUSYAFIR',
//             'kontak' => '-',
//             'unit' => 'GSD',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '623493',
//             'nama' => 'DARMOYO',
//             'kontak' => '0851-0091-2962',
//             'unit' => 'WAN WITEL',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '631966',
//             'nama' => 'SURIYANTO',
//             'kontak' => '0851-0001-2257',
//             'unit' => 'WAN WITEL',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '611935',
//             'nama' => 'ZAINAL ABIDIN',
//             'kontak' => '0813-3677-7270',
//             'unit' => 'MAINTENANCE ACCESS',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '621920',
//             'nama' => 'MUHAMMAD YASIN',
//             'kontak' => '0851-0190-1323',
//             'unit' => 'MAINTENANCE ACCESS',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '630126',
//             'nama' => 'SUDIRO',
//             'kontak' => '0851-0591-3476',
//             'unit' => 'MAINTENANCE ACCESS',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '621951',
//             'nama' => 'JAENAL',
//             'kontak' => '0812-1661-6388',
//             'unit' => 'MAINTENANCE ACCESS',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '641401',
//             'nama' => 'SUPADI',
//             'kontak' => '0812-1756-858',
//             'unit' => 'MSO',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '631174',
//             'nama' => 'AGUS WIDODO',
//             'kontak' => '0851-0199-3324',
//             'unit' => 'RNO',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '641583',
//             'nama' => 'AGUNG CIPTO WAHYONO',
//             'kontak' => '0812-3446-1222',
//             'unit' => 'RNO',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '621350',
//             'nama' => 'SUGIYONO',
//             'kontak' => '0813-3044-8844',
//             'unit' => 'RNO',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '650377',
//             'nama' => 'ARIEF BUDIRAHARJO',
//             'kontak' => '0851-0094-4666',
//             'unit' => 'CCAN',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '611936',
//             'nama' => 'UNTUNG',
//             'kontak' => '0851-0210-4540',
//             'unit' => 'TA CCAN',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '840022',
//             'nama' => 'ARZAD IWANTORO',
//             'kontak' => '0813-3344-4328',
//             'unit' => 'FTTH/BASIC/MAINTENANCE',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '623475',
//             'nama' => 'MOCH SANUSI',
//             'kontak' => '0851-0039-5866',
//             'unit' => 'TA MIGRASI',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '631064',
//             'nama' => 'TOFAN HIDAYAT',
//             'kontak' => '0851-0099-6635',
//             'unit' => 'TA OPTIMA',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '633496',
//             'nama' => 'MICHAEL WIBOWO H',
//             'kontak' => '0822-2551-1511',
//             'unit' => 'TA OPTIMA',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '623005',
//             'nama' => 'SUMARDJONO',
//             'kontak' => '0851-0098-5024',
//             'unit' => 'TA OPTIMA',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '640239',
//             'nama' => 'SOEGENG DJOENAEDI',
//             'kontak' => '0822-3467-2058',
//             'unit' => 'TA PROVISIONING',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '621955',
//             'nama' => 'HARIYANTO',
//             'kontak' => '0851-0023-7746',
//             'unit' => 'TA SQUAT',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '640859',
//             'nama' => 'AHMAD RIVAI',
//             'kontak' => '0812-3230-0354',
//             'unit' => 'TA WIFI',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '641570',
//             'nama' => 'YUSTRIANTO',
//             'kontak' => '0822-4524-2464',
//             'unit' => 'SPV SO AKSES',
//         ]);
//         DB::table('picTelkom')->insert([
//             'nik' => '623001',
//             'nama' => 'M YUNUS',
//             'kontak' => '0851-0196-0601',
//             'unit' => 'SPV SO AKSES',
//         ]);

// //        Contoh Akun
//         DB::table('user')->insert([
//             'nik' => '53940',
//             'nama' => 'Sigit Widagdo',
//             'username' => 'admin',
//             'password' => bcrypt('adminkbl'),
//             'role' => 'admin',
//             'statusUser' => 1,
//             'idLokasi' => 1,
//             'kontak' => '-'
//         ]);

//         DB::table('user')->insert([
//             'nik' => '-',
//             'nama' => 'Deputy GM WITEL',
//             'username' => 'gmwitel',
//             'password' => bcrypt('gmwitelkbl'),
//             'role' => 'gm',
//             'statusUser' => 1,
//             'idLokasi' => 1,
//             'kontak' => '-'
//         ]);

//         DB::table('user')->insert([
//             'nik' => '-',
//             'nama' => 'MGR SAS',
//             'username' => 'mgrsas',
//             'password' => bcrypt('mgrsaskbl'),
//             'role' => 'sas',
//             'statusUser' => 1,
//             'idLokasi' => 1,
//             'kontak' => '-'
//         ]);

//         DB::table('user')->insert([
//             'nik' => '720207',
//             'nama' => 'Titis Nursholichah',
//             'username' => 'validator',
//             'password' => bcrypt('validatorkbl'),
//             'role' => 'validator',
//             'statusUser' => 1,
//             'idLokasi' => 1,
//             'kontak' => '-'
//         ]);
//         DB::table('user')->insert([
//             'nik' => '650658    ',
//             'nama' => 'I Dewa K Swastika',
//             'username' => 'supervalidator',
//             'password' => bcrypt('supervalidatorkbl'),
//             'role' => 'supervalidator',
//             'statusUser' => 1,
//             'idLokasi' => 1,
//             'kontak' => '-'
//         ]);


//         //Perusahaan
//         DB::table('perusahaan')->insert([
//             'namaPerusahaan' => 'Umum',
//         ]);
//         DB::table('perusahaan')->insert([
//             'namaPerusahaan' => 'Telkom Akses',
//         ]);
//         DB::table('perusahaan')->insert([
//             'namaPerusahaan' => 'SIGMA',
//         ]);
//         DB::table('perusahaan')->insert([
//             'namaPerusahaan' => 'TKM NETRA',
//         ]);


//         //Unit Perusahaan Umum
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'Umum',
//             'idPerusahaan' => 1
//         ]);

//         //Unit perusahaan Telkom Akses
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'CCAN',
//             'idPerusahaan' => 2
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'FTTH BASIC',
//             'idPerusahaan' => 2
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'MAINTENANCE',
//             'idPerusahaan' => 2
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'MIGRASI',
//             'idPerusahaan' => 2
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'OPTIMA',
//             'idPerusahaan' => 2
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'PROVISIONING',
//             'idPerusahaan' => 2
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'SDI',
//             'idPerusahaan' => 2
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'SQUAT',
//             'idPerusahaan' => 2
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'WIFI',
//             'idPerusahaan' => 2
//         ]);

//         //Unit perusahaan Sigma Gubeng
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'MARKETING & SALES DIVRE V JAWA TIMUR',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'AKSES KOMUNITAS TELKOM MULTIMEDIA',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'YUGA PERKASA',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'ITS',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'SSC / SONY SUGEMA COLEGE',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'BINA PROGRAM PEMKOT SURABAYA',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'SPEED TEST TELKOM SPEEDY',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'PEMDA LAMONGAN',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'YAYASAN PENDIDIKAN TELKM(YPT) BANDUNG',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'DISHUBKOMINFO BANYUWANGI',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'TDI, PT(SURVEYLANCE)',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'DISKOMINFO JATIM',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'WAN - OPTI',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'DISHUB SURABAYA',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'SNMPTN',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'NEGAKOM',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'UNIVERSITAS NEGERI YOGYA',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'GBS INDONESIA',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'ASURANSI JASA RAHARJA',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'WINGS SURYA',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'KAHA TOUR N TRAVEL',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'DINAS PENDIDIKAN KUTAI TIMUR',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'BANK JATIM',
//             'idPerusahaan' => 3
//         ]);

//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'DRC DELIMA',
//             'idPerusahaan' => 3
//         ]);

//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'TKM NETRA',
//             'idPerusahaan' => 4
//         ]);

//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'KOPERTIS WILAYAH VI JATENG',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'IT TELKOM',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'PT . SIGRA ADHI SEJAHTERA',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'UNIVERSITAS AHMAD DAHLAN JOGJAKARTA',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'PT . BEON INTERMEDIA',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'UNIVERSITAS MULAWARMAN SAMARINDA',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'LEMBAGA SANDI NEGARA',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'PT . PANCANAKA SWASAKTI UTAMA - PROPERTI MALANG',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'LPSE KABUPATEN KUTAI TIMUR',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'PT . DOK DAN PERKAPALAN SURABAYA',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'SBMPTN 3025 [BNI]',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'POLDA JATIM - CV COMLEC MULTIMEDIA',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'STIE PERBANAS SURABAYA',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'PT . PASCAL SOLUSI NUSANTARA',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'CV . GRAHA SOLUTION U / POLDA JATIM',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'PT . ARSENET',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'PT . UNIVERSAL',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'DIKNAS SURABAYA',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'PT . TAMBORADB',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'DINAS PU CIPTA KARYA & TATA RUANG SURABAYA',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'POLDA DI YOGYAKARTA',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'PT . APIK KOMUNIKASI INDONESIA',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'UGT',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'CHINA NET CENTER',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'CDCI',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'Primedia EkaData',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'GREATSHOFT',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'PT. SMART MILENIUM EFFISIENSI',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'PT. JIVA JAYA TELECOM',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'PT. MSH NIAGA TELECOM',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'AKAMAI',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'PT. INFOMEDIA NUSANTARA',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'PT. BIMASAKTI MULTI SINERGI',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'PEMKAB SUKOHARJO',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'GRAHA WISATA GRESIK',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'POLDA JATIM',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'PT. GBS',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'PT. BIRO PERJALANAN WISATA SHAFIRA SEMESTA',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'CV. JILL COMPUTER',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'PT. DIKA DATA SECURINDO',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'PT.SUTINDO',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'OPTIK INTERNATIONAL',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'PT. GRATIKA',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'PT. ADHI KARYA',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'PRIMAGAMA',
//             'idPerusahaan' => 3
//         ]);
//         DB::table('unitPerusahaan')->insert([
//             'namaUnit' => 'EDUMAIL',
//             'idPerusahaan' => 3
//         ]);

//        DB::table('picMitra')->insert([
//            'nik' => '5610',
//            'nama' => 'Yunus Abraham',
//            'kontak' => '08123575050',
//            'keterangan' => '-',
//            'statusNda' => 0,
//            'idPerusahaan' => 2,
//            'idUnitPerusahaan' => 2,
//        ]);
//        DB::table('picMitra')->insert([
//            'nik' => '5611',
//            'nama' => 'Yohan Sanyoto',
//            'kontak' => '08123570123',
//            'keterangan' => '-',
//            'statusNda' => 0,
//            'idPerusahaan' => 2,
//            'idUnitPerusahaan' => 2,
//        ]);
//        DB::table('picMitra')->insert([
//            'nik' => '5612',
//            'nama' => 'Brilian Hakim',
//            'kontak' => '08123572020',
//            'keterangan' => '-',
//            'statusNda' => 0,
//            'idPerusahaan' => 2,
//            'idUnitPerusahaan' => 3,
//        ]);
//        DB::table('picMitra')->insert([
//            'nik' => '5613',
//            'nama' => 'Cholis RA',
//            'kontak' => '08123',
//            'keterangan' => '-',
//            'statusNda' => 0,
//            'idPerusahaan' => 2,
//            'idUnitPerusahaan' => 4,
//        ]);
//        DB::table('picMitra')->insert([
//            'nik' => '-',
//            'nama' => 'Ahmad Baihaqi',
//            'kontak' => '0123456',
//            'keterangan' => '-',
//            'statusNda' => 0,
//            'idPerusahaan' => 3,
//            'idUnitPerusahaan' => 11,
//        ]);
//        DB::table('picMitra')->insert([
//            'nik' => '-',
//            'nama' => 'Sunyoto',
//            'kontak' => '012345',
//            'keterangan' => '-',
//            'statusNda' => 0,
//            'idPerusahaan' => 3,
//            'idUnitPerusahaan' => 11,
//        ]);
//        DB::table('picMitra')->insert([
//            'nik' => '-',
//            'nama' => 'Mirana',
//            'kontak' => '012345',
//            'keterangan' => '-',
//            'statusNda' => 0,
//            'idPerusahaan' => 3,
//            'idUnitPerusahaan' => 12,
//        ]);
//        DB::table('picMitra')->insert([
//            'nik' => '-',
//            'nama' => 'Hafid Maulana',
//            'kontak' => '012345',
//            'keterangan' => '-',
//            'statusNda' => 0,
//            'idPerusahaan' => 3,
//            'idUnitPerusahaan' => 13,
//        ]);
//        DB::table('picMitra')->insert([
//            'nik' => '-',
//            'nama' => 'Yono',
//            'kontak' => '0123',
//            'keterangan' => '-',
//            'statusNda' => 0,
//            'idPerusahaan' => 3,
//            'idUnitPerusahaan' => 14,
//        ]);

    }
}
