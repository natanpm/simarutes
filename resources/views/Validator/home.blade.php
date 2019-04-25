@extends('Validator.Layouts.rootPage')

@section('extraStyleSheet')
    <link rel="stylesheet" href="{{url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection


@section('content-header')
    <h1>Dashboard Asman NetPerf & Admin
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('validator-home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
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
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box" >
			
                <span class="info-box-icon bg-aqua"><i class="ion ion-android-mail"></i></span>

                <div class="info-box-content">
                    <a href="{{route('get-validatorIndexLihatSurat')}}">
                    <span class="info-box-text" style="color: black">Jumlah <br>Surat</span>
                    <span class="info-box-number" style="color: black">{{$content['jumlahSurat']}}</span>
                    </a>
                </div>
			</button>	
				
            </div>

        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">		
                <span class="info-box-icon bg-green"><i class="ion ion-checkmark"></i></span>

                <div class="info-box-content">
                    <a href="{{route('get-validatorSuratTervalidasi')}}">
                    <span class="info-box-text" style="color: black">Surat<br>Tervalidasi</span>
                    <span class="info-box-number" style="color: black">{{$content['suratTervalidasi']}}</span>
                    </a>
                </div>
            </div>

        </div>


        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-android-warning"></i></span>

                <div class="info-box-content">
                    <a href="{{route('get-validatorSuratBelumTervalidasi')}}">
                    <span class="info-box-text" style="color: black">Surat Belum<br> Tervalidasi</span>
                    <span class="info-box-number" style="color: black">{{$content['suratTakTervalidasi']}}</span>
                    </a>
                </div>
            </div>

        </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-android-cancel"></i></span>

                <div class="info-box-content">
                    <a href="{{route('get-validatorSuratRevisi')}}">
                    <span class="info-box-text" style="color: black">Surat<br>Revisi</span>
                    <span class="info-box-number" style="color: black">{{$content['suratRevisi']}}</span>
                    </a>
                </div>
            </div>
        </div>


         <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="ion ion-android-cancel"></i></span>

                <div class="info-box-content">
                    <a href="{{route('get-ValidatorSuratNonaktif')}}">
                    <span class="info-box-text" style="color: black">SIMARU<br>di Non-Aktifkan</span>
                    <span class="info-box-number" style="color: black">{{$content['suratNonAktif']}}</span>
                    </a>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            @if(session('status'))
                <div class="alert alert-{{session('status')}}">
                    {{session('message')}}
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Data SIMARU Belum Tervalidasi</h3>
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
                            <th style="vertical-align: middle">Perihal</th>
                            <th style="vertical-align: middle">Lokasi</th>
                            <th style="vertical-align: middle">Keterangan</th>
                            <th style="vertical-align: middle">Waktu</th>
                            <th style="vertical-align: middle">PIC Telkom</th>
                            <th style="width: 8%;vertical-align: middle">Status</th>
                            <th style="width: 12%; vertical-align: middle">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($suratPending as $surat)
                            <tr>
                                <td>{{$surat->nomorSurat}}</td>
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
                                <td>
                                    @foreach($surat->waspang as $picTelkom)
                                        <strong>- </strong>{{$picTelkom->picTelkom->nama}}<br>
                                    @endforeach
                                </td>
                                <td>
                                    @if($surat->statusSurat == 0)
                                        Belum Tervalidasi.
                                    @elseif($surat->statusSurat == 1)
                                        Validasi Tahap 1.
                                    @elseif($surat->statusSurat == 2)
                                        Tervalidasi.
                                    @elseif($surat->statusSurat == 4)
                                        Non-Aktif.
                                    @else
                                        Revisi.
                                    @endif
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-xs-4" style="padding: 0px 4px 0px 10px">
                                            <a href="{{route('get-validatorValidasiSurat',['id' => $surat->id])}}">
                                                <button type="submit"
                                                        class="btn btn-success pull-right btn-block btn-sm validasi"
														data-toogle="tooltip" data-placement="bottom"  title="Validasi Surat">
                                                        
                                                
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            </a>
                                        </div>
                                        <div class="col-xs-4" style="padding: 0px 7px 0px 4px">
                                            <a href="{{route('get-validatorDetailSurat',['id' => $surat->id])}}">
                                                <button type="submit"
                                                        class="btn btn-info pull-right btn-block btn-sm"
														data-toogle="tooltip" data-placement="bottom"  title="Tampilkan Surat">
                                                    <i class="fa fa-map-pin"></i>
                                                </button>
                                            </a>
                                        </div>

                                        <div class="col-xs-4" style="padding: 0px 12px 0px 0px">
                                            <a href="{{route('get-validatorBatalkanValidasi',['id' => $surat->id])}}')}}">
                                                <button type="submit"
                                                        class="btn btn-danger pull-right btn-block btn-sm hapus"
														data-toogle="tooltip" data-placement="bottom"  title="Batalkan Surat">
                                                        
                                                
                                                    <i class="fa fa-close"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Data SIMARU Revisi</h3>
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
                            <th style="vertical-align: middle">Perihal</th>
                            <th style="vertical-align: middle">Lokasi</th>
                            <th style="vertical-align: middle">Keterangan</th>
                            <th style="vertical-align: middle">Waktu</th>
                            <th style="vertical-align: middle">PIC Telkom</th>
                            <th style="width : 8%;vertical-align: middle">Status</th>
                            <th style="width: 12%; vertical-align: middle">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($suratRevisi as $surat)
                            <tr>
                                <td>{{$surat->nomorSurat}}</td>
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
                                <td>
                                    @foreach($surat->waspang as $picTelkom)
                                        <strong>- </strong>{{$picTelkom->picTelkom->nama}}<br>
                                    @endforeach
                                </td>
                                <td>
                                    @if($surat->statusSurat == 0)
                                        Belum Tervalidasi.
                                    @elseif($surat->statusSurat == 1)
                                        Validasi Tahap 1.
                                    @elseif($surat->statusSurat == 2)
                                        Tervalidasi.
                                    @elseif($surat->statusSurat == 4)
                                        Non-Aktif.
                                    @else
                                        Revisi.
                                    @endif
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-xs-4" style="padding: 0px 4px 0px 10px">
                                            <a href="{{route('get-validatorValidasiSurat',['id' => $surat->id])}}">
                                                <button type="submit"
                                                        class="btn btn-success pull-right btn-block btn-sm validasi"
                                                        value="{{$surat->nomorSurat}}"
                                                data-toogle="tooltip" data-placement="bottom"  title="Validasi Surat">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            </a>
                                        </div>
                                        <div class="col-xs-4" style="padding: 0px 7px 0px 4px">
                                            <a href="{{route('get-validatorDetailSurat',['id' => $surat->id])}}">
                                                <button type="submit"
                                                        class="btn btn-info pull-right btn-block btn-sm"
														data-toogle="tooltip" data-placement="bottom"  title="Tampilkan Surat">
                                                    <i class="fa fa-map-pin"></i>
                                                </button>
                                            </a>
                                        </div>

                                        <div class="col-xs-4" style="padding: 0px 12px 0px 0px">
                                            <a href="{{route('get-validatorIndexEditSurat',['id' => $surat->id])}}">
                                                <button type="submit"
                                                        class="btn btn-warning pull-right btn-block btn-sm"
														data-toogle="tooltip" data-placement="bottom"  title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
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
        });

        $(function () {
            $('#table2').DataTable({
                "order": [[0, "desc"]]
            });
        });

        $('.hapus').on('click', function () {
            return confirm('Batalkan validasi ' + $(this).val() + '?')
        });

        $('.validasi').on('click', function () {
            return confirm('Validasi surat ' + $(this).val() + '?')
        });
		
    </script>


@endsection
