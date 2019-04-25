@extends('SuperValidator.Layouts.rootCetak')

@section('title')
    <title>SIMARU Tel-{{$angka}}-SIMARU-SBS-{{$tahun}}</title>
@endsection

@section('extraStyleSheet')
    <style type="text/css">
        @page {
            size: A4;
            margin-top: 35px;
            margin-bottom: 50px;
            margin-left: 50px;
            margin-right: 50px;
        }

        @media print {
            html, body {
                width: auto;
                height: auto;
                font-family: "Times New Roman";
                font-size: 15px;
            }
        }
    </style>
@endsection

@section('content')
    <section class="invoice">
        <div class="row">
            <div class="col-md-12 table-responsive">
                <h4>
                    <div class="pull-right">
                        <img src="{{url('img/TelkomAsset/logoSurat.png')}}" alt="TelkomLogo">
                    </div>
                    <small style="font-family: 'Times New Roman'">
                        PT. TELEKOMUNIKASI INDONESIA, Tbk.<br>
                        WILAYAH TELKOM SURABAYA SELATAN<br>
                        DIVISI TELKOM REGIONAL V JAWA BALI NUSRA
                    </small>
                </h4>
                <hr style="margin: 1% 0px 1% 0px;border: 1px solid #000;">
            </div>
        </div>
        <div class="row invoice-info">
            <div class="col-md-12 table-responsive">
                <table>
                    <tbody>
                    <tr>
                        <td style="vertical-align: top;padding-right: 35px"> Nomor</td>
                        <td style="vertical-align: top"> :</td>
                        <td style="padding-left: 5px"> Tel. {{$angka}}/SIMARU/SBS/{{$tahun}}</td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;"> Kepada</td>
                        <td style="vertical-align: top"> :</td>
                        <td style="padding-left: 5px"> Sdr. {{strtoupper($surat->kepada)}}</td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;"> Dari</td>
                        <td style="vertical-align: top"> :</td>
                        <td style="padding-left: 5px"> MGR NETWORK AREA & IS OPERATION SURABAYA SELATAN</td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;"> Lampiran
                        </td>
                        <td style="vertical-align: top"> :</td>
                        <td style="padding-left: 5px">{{$surat->jumlahLampiran}}</td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;"> Perihal</td>
                        <td style="vertical-align: top"> :</td>
                        <td style="padding-left: 5px"> {{$surat->perihal}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <br>
            <div class="col-md-12 table-responsive">
                <table>
                    <tbody>
                    <tr>
                        <td style="vertical-align: top"><span class="badanSuratNumber">1.</span></td>
                        <td style="text-align: justify"> Menunjuk dan menindaklanjuti {{$surat->suratDinas}}
                            terlampir.
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top"><span class="badanSuratNumber">2.</span></td>
                        <td style="text-align: justify"> Pada Prinsipnya kami memberikan ijin masuk ke lokasi instalasi
                            PT. TELKOM kepada petugas Saudara untuk melaksanakan pekerjaan dengan ketentuan sebagai
                            berikut :
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <div class="col-md-12 table-responsive">
                <table style="width: 100%">
                    <tbody>
                    <tr>
                        <td style="vertical-align: top;text-align: justify;padding-left: 50px">
                            <ul style="margin: 0px;">
                                <li>Lokasi</li>
                            </ul>
                        </td>
                        <td style="vertical-align: top;text-align: justify;">
                            :
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-md-4" style="display: inline-block;width: 205px;vertical-align: top">
                                    <ul style="padding: 0px 0px 0px 25px;margin: 0px">
                                        @foreach($arrayL1 as $loc)
                                            <li>{{$loc}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-md-4" style="display: inline-block;width: 170px;vertical-align: top">
                                    <ul style="padding: 0px;margin: 0px">
                                        @foreach($arrayL2 as $loc)
                                            <li>{{$loc}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-md-4" style="display: inline-block;width: 170px;vertical-align: top">
                                    <ul style="padding: 0px;margin: 0px">
                                        @foreach($arrayL3 as $loc)
                                            <li>{{$loc}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;text-align: justify;padding-left: 50px">
                            <ul style="margin: 0px">
                                <li>Kegiatan</li>
                            </ul>
                        </td>
                        <td style="vertical-align: top;text-align: justify">
                            :
                        </td>
                        <td style="vertical-align: top;text-align: justify">
                            <div style="padding-left: 9px">
                                {{$surat->pekerjaan->kegiatan}}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;text-align: justify;padding-left: 50px">
                            <ul style="margin: 0px">
                                <li>Waktu</li>
                            </ul>
                        </td>
                        <td style="vertical-align: top;text-align: justify">
                            :
                        </td>
                        <td style="vertical-align: top;text-align: justify">
                            <div style="padding-left: 9px">
                                {{$tanggalMulai}} s.d {{$tanggalBerakhir}}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;text-align: justify;padding-left: 50px">
                            <ul style="margin: 0px">
                                <li>Jam Kerja</li>
                            </ul>
                        </td>
                        <td style="vertical-align: top;text-align: justify">
                            :
                        </td>
                        <td style="vertical-align: top;text-align: justify">
                            <div style="padding-left: 9px">
                                {{substr($surat->pekerjaan->jamMasuk,0,5)}}
                                s.d {{substr($surat->pekerjaan->jamKeluar,0,5)}} Waktu Setempat
                            </div>
                        </td>
                    </tr>
                    @if($surat->keterangan != '-')
                        <tr>
                            <td style="vertical-align: top;text-align: justify;padding-left: 50px">
                                <ul style="margin: 0px">
                                    <li>Keterangan</li>
                                </ul>
                            </td>
                            <td style="vertical-align: top;text-align: justify">
                                :
                            </td>
                            <td style="vertical-align: top;text-align: justify">
                                <div style="padding-left: 9px">
                                    {{$surat->keterangan}}
                                </div>
                            </td>
                        </tr>
                    @endif
                    <tr>
                        <td style="vertical-align: top;text-align: justify;padding-left: 50px">
                            <ul style="margin: 0px">
                                <li>Petugas</li>
                            </ul>
                        </td>
                        <td style="vertical-align: top;text-align: justify">
                            :
                        </td>
                        <td style="vertical-align: top;text-align: justify">
                            <div style="padding-left: 9px">
                                {{$surat->kepada}}
                                @if($surat->petugas->first())
                                    @if($surat->petugas->count() > 30 || $surat->petugas->first()->picMitra->idPerusahaan == 2 || $surat->petugas->first()->picMitra->idPerusahaan == 3 || $surat->petugas->first()->picMitra->idPerusahaan == 4)
                                        (Terlampir)
                                    @endif
                                @endif
                            </div>
                        </td>
                    </tr>
                    @if($surat->petugas->first())
                        @if($surat->petugas->first()->picMitra->idPerusahaan == 2 || $surat->petugas->first()->picMitra->idPerusahaan == 3 || $surat->petugas->first()->picMitra->idPerusahaan == 4)
                        @else
                            @if($surat->petugas->count() <= 30)
                                <tr>
                                    <td style="vertical-align: top;text-align: justify">
                                        <ul style="margin: 0px">

                                        </ul>
                                    </td>
                                    <td style="vertical-align: top;text-align: justify">

                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-4"
                                                 style="display: inline-block;width: 195px;vertical-align: top">
                                                <ul style="padding: 0px 0px 0px 25px;margin: 0px">
                                                    @foreach($arrayK1 as $person)
                                                        <li>{{$person}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="col-md-4"
                                                 style="display: inline-block;width: 170px;vertical-align: top">
                                                <ul style="padding: 0px;margin: 0px">
                                                    @foreach($arrayK2 as $person)
                                                        <li>{{$person}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="col-md-4"
                                                 style="display: inline-block;width: 170px;vertical-align: top">
                                                <ul style="padding: 0px;margin: 0px">
                                                    @foreach($arrayK3 as $person)
                                                        <li>{{$person}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endif
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="col-md-12 table-responsive">
                <br>
                <table>
                    <tbody>
                    <tr>
                        <td style="vertical-align: top"><span class="badanSuratNumber">3.</span></td>
                        <td style="text-align: justify"> Selanjutnya untuk pelaksanaan di lapangan agar diperhatikan
                            hal-hal
                            sebagai berikut:
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table>
                    <tbody>
                    <tr>
                        <td style=" vertical-align: top">
                            <ul style="margin:0px 0px 0px 50px">
                                <li style="text-align: justify">
                                    Nama petugas yang melaksanakan pekerjaan harus sesuai
                                    dengan yang
                                    tertera dalam Nota ini, membawa bukti/surat perintah dari perusahaan yang
                                    bersangkutan dan mencatatkan identitas diri
                                    masing-masing di bagian satuan Pengamanan/Security/Petugas Site.
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td style=" vertical-align: top">
                            <ul style="margin:0px 0px 0px 50px">
                                <li style="text-align: justify">
                                    Foto copy identitas yang masih berlaku petugas, serta
                                    foto copy Surat Izin Masuk
                                    Ruang ini diserahkan di bagian satuan Pengamanan/Security/Petugas Site.
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td style=" vertical-align: top">
                            <ul style="margin:0px 0px 0px 50px">
                                <li style="text-align: justify">
                                    Bahwa sesuai klausul standar IT Security Management
                                    System dan Business Continuity
                                    Management System, maka setiap personil Mitra terkait kegiatan tersebut di atas
                                    diwajibkan untuk mengisi dan
                                    menandatangani Non Disclosure Agreement bermaterai 6000(form NDA terlampir) dan
                                    selanjutnya diserahkan kepada pihak
                                    Pengamanan/Security/Petugas Site di STO sebelum berkegiatan.
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td style=" vertical-align: top">
                            <ul style="margin:0px 0px 0px 50px">
                                <li style="text-align: justify">
                                    Tidak menimbulkan gangguan terhadap operasional
                                    perangkat Existing dan apabila
                                    mengakibatkan gangguan pada perangkat Existing menjadi tanggung jawab Mitra,
                                    serta menjaga kebersihan, kerapihan
                                    dan ketertiban dilokasi selama kegiatan berlangsung.
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td style=" vertical-align: top">
                            <ul style="margin:0px 0px 0px 50px">
                                <li style="text-align: justify">
                                    Petugas mentaati peraturan penerapan sistim
                                    Management K3 di Lingkungan tempat kerja.
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td style=" vertical-align: top">
                            <ul style="margin:0px 0px 0px 50px">
                                <li style="text-align: justify">
                                    Untuk pelaksanaan integrasi perangkat harap
                                    dikoordinasikan dengan petugas Area Network
                                    setempat
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td style=" vertical-align: top">
                            <ul style="margin:0px 0px 0px 50px">
                                <li style="text-align: justify">
                                    Nama petugas yang melaksanakan pekerjaan harus sesuai
                                    dengan yang tertera dalam Nota ini, membawa
                                    bukti/surat perintah dari perusahaan yang bersangkutan dan mencatatkan identitas
                                    diri masing masing di
                                    bagian satuan Pengamanan/Security/Petugas.
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td style=" vertical-align: top">
                            <ul style="margin:0px 0px 0px 50px">
                                <li>
                                    <div style="display: inline-block;vertical-align: top">
                                        <div style="display: inline-block;vertical-align: top;width: 75px">
                                            <span>PIC Telkom</span>
                                        </div>
                                        <div style="display: inline-block;vertical-align: top">
                                            :
                                        </div>
                                        <div style="display: inline-block">
                                            @foreach($surat->waspang as $waspang)
                                                Sdr. {{$waspang->picTelkom->nama}}{{" ("}}{{$waspang->picTelkom->unit}}{{") / NIK."}}{{$waspang->picTelkom->nik}}
                                                {{" Telp : "}}{{$waspang->picTelkom->kontak}} <br>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td style=" vertical-align: top">
                            <ul style="margin:0px 0px 0px 50px">
                                <li>
                                    <div style="display: inline-block;vertical-align: top">
                                        <div style="display: inline-block;vertical-align: top;width: 75px">
                                            <span>PIC Mitra</span>
                                        </div>
                                        <div style="display: inline-block;vertical-align: top">
                                            :
                                        </div>
                                        <div style="display: inline-block">
                                            @if($surat->petugas->first())
                                                @if($surat->petugas->first()->picMitra->idPerusahaan == 2 ||$surat->petugas->first()->picMitra->idPerusahaan == 3||$surat->petugas->first()->picMitra->idPerusahaan == 4)
                                                    (Terlampir)
                                                @else
                                                    <?php
                                                    $count = 0;
                                                    ?>
                                                    @foreach($surat->petugas as $petugas)
                                                        Sdr. {{$petugas->picMitra->nama}}{{" / No.Identitas "}}{{$petugas->picMitra->nik}}
                                                        {{" Telp : "}}{{$petugas->picMitra->kontak}} <br>
                                                        @if(++$count >= 2)
                                                            @break
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @else
                                                -
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <div class="col-md-12 table-responsive">
                <table>
                    <tbody>
                    <tr>
                        <td style="vertical-align: top"><span class="badanSuratNumber">4.</span></td>
                        <td style="text-align: justify"> Demikian kami sampaikan atas perhatian dan kerjasamanya
                            diucapkan
                            terima kasih.
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top"><span class="badanSuratNumber"></span></td>
                        <td style="text-align: justify"><b>SALAM, Solid, Speed, and Smart</b></td>
                    </tr>
                    </tbody>
                </table>
                <br>
                <table>
                    <tbody>
                    <tr>
                        <td style="vertical-align: top"><span class="badanSuratNumber"></span></td>
                        <td style="text-align: justify">Surabaya, {{$tanggal}}</td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top"><span class="badanSuratNumber"></span></td>
                        <td style="text-align: justify">MGR NETWORK AREA & IS OPERATION SURABAYA SELATAN</td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top"><span class="badanSuratNumber"></span></td>
                        <td style="text-align: justify"><img style="padding-left: 10px"
                                                             src="{{url('img/TelkomAsset/ttd.png')}}" alt="ttd">
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top"><span class="badanSuratNumber"></span></td>
                        <td style="text-align: justify"><u>ACHMAD MUSLICH</u></td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top"><span class="badanSuratNumber"></span></td>
                        <td style="text-align: justify">NIK : 640986</td>
                    </tr>
                    </tbody>
                </table>
                <br>
                <table>
                    <tbody>
                    <tr>
                        <td style="vertical-align: top"><span class="badanSuratNumber"></span></td>
                        <td style="vertical-align: top; width: 60px">Lampiran</td>
                        <td style="vertical-align: top"> :</td>
                        <td style="padding-left: 5px"> {{($surat->lampiran ? $surat->lampiran->namaFile : "-")}}</td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top"><span class="badanSuratNumber"></span></td>
                        <td style="vertical-align: top; width: 60px"> Tembusan</td>
                        <td style="vertical-align: top"> :</td>
                        <td style="padding-left: 5px"> 1.GM WITEL SURABAYA SELATAN</td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top"><span class="badanSuratNumber"></span></td>
                        <td style="vertical-align: top;"></td>
                        <td style="vertical-align: top"> :</td>
                        <td style="padding-left: 5px"> 2.MGR SAS SURABAYA SELATAN</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>


        @if($surat->petugas->first())
            <div style="page-break-before: always">
                @if($surat->petugas->count() > 30 || $surat->petugas->first()->picMitra->idPerusahaan == 2 ||$surat->petugas->first()->picMitra->idPerusahaan == 3 || $surat->petugas->first()->picMitra->idPerusahaan == 4)
                    <div class="col-md-12 table-responsive">
                        <h4>
                            <div class="pull-right">
                                <img src="{{url('img/TelkomAsset/logoSurat.png')}}" alt="TelkomLogo">
                            </div>
                            <small style="font-family: 'Times New Roman'">
                                PT. TELEKOMUNIKASI INDONESIA, Tbk.<br>
                                WILAYAH TELKOM SURABAYA SELATAN<br>
                                DIVISI TELKOM REGIONAL V JAWA BALI NUSRA
                            </small>
                        </h4>
                        <hr style="margin: 1% 0px 1% 0px;border: 1px solid #000;">
                    </div>

                    <div class="col-md-12 table-responsive">
                        <h3>Lampiran Nama</h3>
                        <table id="table1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th style="width: 5%; vertical-align: middle">No</th>
                                <th style="vertical-align: middle">NIK</th>
                                <th style="vertical-align: middle">Nama</th>
                                <th style="vertical-align: middle">Kontak</th>
                                <th style="vertical-align: middle">Unit Perusahaan</th>
                                <th style="vertical-align: middle">Perusahaan</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 0;
                            ?>
                            @foreach($surat->petugas as $worker)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$worker->picMitra->nik}}</td>
                                    <td>{{$worker->picMitra->nama}}</td>
                                    <td>{{$worker->picMitra->kontak}}</td>
                                    <td>{{($worker->picMitra->idUnitPerusahaan == 1 ? $worker->picMitra->keterangan : $worker->picMitra->unitPerusahaan->namaUnit)}}</td>
                                    <td>{{($worker->picMitra->idPerusahaan == 1 ? $worker->picMitra->keterangan : $worker->picMitra->perusahaan->namaPerusahaan)}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        @endif
    </section>
@endsection
