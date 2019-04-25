@extends('PicTelkom.Layouts.rootPage')

@section('extraStyleSheet')
    <link rel="stylesheet" href="{{url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection


@section('content-header')
    <h1>Dashboard PIC Telkom
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('picTelkom-home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    </ol>
@endsection

@section('content')

    @if($berita)
        <div class="row alert alert-{{$berita->statusKondisi}}" style="padding: 5px 0px 0px 0px;font-size: 18px;margin: 0px 0px 10px 0px;">
            <div class="col-md-1">
                <b>INFO : </b>
            </div>
            <div class="col-md-11">
                <marquee scrolldelay="120">
                    <b>{{$berita->pesan}}</b>
                </marquee>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-android-mail"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">SIMARU <br>Hari Ini</span>
                    <span class="info-box-number">{{$content['suratHariIni']}}</span>
                </div>

            </div>

        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green-active"><i class="ion ion-ios-people"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Jumlah TAMU<br> Hari INI</span>
                    <span class="info-box-number">{{$content['jumlahTamu']}}</span>
                </div>

            </div>

        </div>


        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-light-blue"><i class="ion ion-android-done"></i></span>

                <div class="info-box-content">
                    <a href="{{route('get-picTelkomLogMasukTervalidasi')}}">
                    <span class="info-box-text" style="color: black">JUMLAH TAMU<br> Masuk</span>
                    <span class="info-box-number" style="color: black">{{$content['tamuMasuk']}}</span>
                    </a>
                </div>

            </div>

        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-android-done-all"></i></span>

                <div class="info-box-content">
                    <a href="{{route('get-picTelkomLogKeluarTervalidasi')}}">
                    <span class="info-box-text" style="color: black">Jumlah Tamu<br>Keluar</span>
                    <span class="info-box-number" style="color: black">{{$content['tamuKeluar']}}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-android-warning"></i></span>

                <div class="info-box-content">
                    <a href="{{route('get-picTelkomLogBelumTerselesaikan')}}">
                    <span class="info-box-text" style="color: black">Log Tamu<br> Belum Terselesaikan</span>
                    <span class="info-box-number" style="color: black">{{$content['logBelumSelesai']}}</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="ion ion-android-close"></i></span>

                <div class="info-box-content">
                    <a href="{{route('get-picTelkomLogMelebihiWaktu')}}">
                    <span class="info-box-text" style="color: black">Log Tamu <br>Diluar Batas Waktu</span>
                    <span class="info-box-number" style="color: black">{{$content['logDiluarBatas']}}</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-blue-active"><i class="ion-android-alarm-clock"></i></span>

                <div class="info-box-content">
                    <a href="{{route('get-picTelkomLogPetugasExtend')}}">
                    <span class="info-box-text" style="color: black">Log Tamu <br>Ter-Extended</span>
                    <span class="info-box-number" style="color: black">{{$content['logExtend']}}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">SIMARU Hari Ini</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="table1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="width: 10%;vertical-align: middle">Nomor Surat</th>
                            <th style="width: 10%;vertical-align: middle">Instansi</th>
                            <th style="vertical-align: middle">Perihal</th>
                            <th style="vertical-align: middle">Lokasi</th>
                            <th style="vertical-align: middle">Keterangan</th>
                            <th style="vertical-align: middle">Tanggal</th>
                            <th style="vertical-align: middle">Waktu</th>
                            <th style="width: 5%; vertical-align: middle">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($surats as $surat)
                            <tr>
                                <td>{{$surat->nomorSurat}}</td>
                                <td>{{ucwords(strtolower($surat->kepada))}}</td>
                                <td>{{$surat->perihal}}</td>
                                <td>
                                    <?php
                                    $i = 0;
                                    $len = count($surat->pekerjaan->lokasiKerja);
                                    ?>
                                    @foreach($surat->pekerjaan->lokasiKerja as $loc)
                                        @if($i == $len-1)
                                            {{$loc->lokasi->lokasi}}.
                                        @else
                                            {{$loc->lokasi->lokasi}},
                                            <?php $i++?>
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{$surat->keterangan}}</td>
                                <td>{{$surat->pekerjaan->tanggalMulai}}<br>{{$surat->pekerjaan->tanggalBerakhir}}</td>
                                <td>{{$surat->pekerjaan->jamMasuk}}<br>{{$surat->pekerjaan->jamKeluar}}</td>
                                <td>
                                    <div class="col-xs-12" style="padding: 0px 0px 0px 0px">
                                        <a href="{{route('get-picTelkomDetailSurat',['id' => $surat->id])}}">
                                            <button type="submit"
                                                    class="btn btn-info pull-right btn-block btn-sm"
                                                    data-toogle="tooltip" data-placement="bottom"  title="Tampilkan Surat">
                                                <i class="fa fa-map-pin"></i>
                                            </button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">SIMARU Forward Hari Ini</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="table2" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="width: 10%;vertical-align: middle">Nomor Surat</th>
                            <th style="width: 10%;vertical-align: middle">Instansi</th>
                            <th style="vertical-align: middle">Kegiatan</th>
                            <th style="vertical-align: middle">Lokasi</th>
                            <th style="vertical-align: middle">Keterangan</th>
                            <th style="vertical-align: middle">Tanggal</th>
                            <th style="vertical-align: middle">Waktu</th>
                            <th style="width: 5%; vertical-align: middle">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($suratForwards as $surat)
                            <tr>
                                <td>{{$surat->nomorSurat}}</td>
                                <td>{{ucwords(strtolower($surat->kepada))}}</td>
                                <td>{{$surat->pekerjaan->kegiatan}}</td>
                                <td>
                                    <?php
                                    $i = 0;
                                    $len = count($surat->pekerjaan->lokasiKerja);
                                    ?>
                                    @foreach($surat->pekerjaan->lokasiKerja as $loc)
                                        @if($i == $len-1)
                                            {{$loc->lokasi->lokasi}}.
                                        @else
                                            {{$loc->lokasi->lokasi}},
                                            <?php $i++?>
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{$surat->keterangan}}</td>
                                <td>{{$surat->pekerjaan->tanggalMulai}}<br>{{$surat->pekerjaan->tanggalBerakhir}}</td>
                                <td>{{$surat->pekerjaan->jamMasuk}}<br>{{$surat->pekerjaan->jamKeluar}}</td>
                                <td>
                                    <div class="col-xs-12" style="padding: 0px 0px 0px 0px">
                                        <a href="{{route('get-picTelkomDetailSurat',['id' => $surat->id])}}">
                                            <button type="submit"
                                                    class="btn btn-info pull-right btn-block btn-sm"
                                                    data-toogle="tooltip" data-placement="bottom"  title="Tampilkan Surat">
                                                <i class="fa fa-map-pin"></i>
                                            </button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extraJavaScript')
    <!-- DataTables -->
    <script src="{{url('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script>
        $(function () {
            $('#table1').DataTable({
                "order": [[0, "desc"]]
            });

            $('#table2').DataTable({
                "order": [[0, "desc"]]
            });
        });
    </script>
@endsection
