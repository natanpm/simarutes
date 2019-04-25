@extends('PicTelkom.Layouts.rootPage')

@section('extraStyleSheet')
    <link rel="stylesheet" href="{{url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content-header')
    <h1>Log Masuk Petugas
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('picTelkom-home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    </ol>
@endsection

@section('content')
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
                    <h3 class="box-title">Data Log Masuk Petugas</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body  table-responsive">
                    <table id="table1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="vertical-align: middle">SIMARU</th>
                            <th style="vertical-align: middle">NIK</th>
                            <th style="vertical-align: middle">Nama</th>
                            <th style="vertical-align: middle">Unit Perusahaan</th>
                            <th style="vertical-align: middle">Pemberi<br>Izin Masuk</th>
                            <th style="vertical-align: middle">Pemberi<br>Izin Keluar</th>
                            <th style="vertical-align: middle">Waktu Log</th>
                            <th style="vertical-align: middle">Status</th>
                            <th style="vertical-align: middle">Keterangan</th>
                            <th style="vertical-align: middle">Lokasi</th>
                            <th style="width: 7%;vertical-align: middle">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($logs as $log)
                            <tr>
                                <td>{{$log->suratMasuk->nomorSurat}}</td>
                                <td>{{$log->petugas->picMitra->nik}}</td>
                                <td>{{$log->petugas->picMitra->nama}}</td>
                                <td>{{$log->petugas->picMitra->unitPerusahaan->namaUnit}}</td>
                                <td>{{$log->securityMasuk->nama}}</td>
                                <td>{{$log->securityKeluar->nama}}</td>
                                <td>{{$log->masuk}}<br>{{$log->keluar}}</td>
                                <td>
                                    @if($log->statusLog == 0)
                                        Belum Keluar
                                    @elseif($log->statusLog == 1)
                                        Sudah Keluar
                                    @elseif($log->statusLog == 2)
                                        Melebihi Batas Waktu
                                    @elseif($log->statusLog == 3)
                                        Extended
                                    @endif
                                </td>
                                <td>{{$log->keterangan}}</td>
                                <td>{{$log->lokasi->lokasi}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-xs-6" style="padding: 0px 9px 0px 10px">
                                            <a href="{{route('get-picTelkomDetailSurat',['id' => $log->suratMasuk->id])}}">
                                                <button type="submit"
                                                        class="btn btn-info pull-right btn-block btn-sm"
                                                        data-toogle="tooltip" data-placement="bottom"  title="Tampilkan Surat">
                                                    <i class="fa fa-map-pin"></i>
                                                </button>
                                            </a>
                                        </div>
                                        <div class="col-xs-6" style="padding: 0px 12px 0px 7px">
                                            <a href="{{route('get-picTelkomLihatPesanExtend',['id' => $log->id])}}">
                                                <button type="submit"
                                                        class="btn btn-info pull-right btn-block btn-sm"
                                                        data-toogle="tooltip" data-placement="bottom"  title="Tampilkan Log Extend">
                                                    <i class="fa fa-sticky-note-o"></i>
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
            <a href="{{route('picTelkom-home')}}">
                <button type="button" class="btn btn-success pull-right" style="margin-right: 5px;">
                    Kembali
                </button>
            </a>
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
    </script>
@endsection
