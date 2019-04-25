@extends('Security.Layouts.rootPage')

@section('extraStyleSheet')
    <link rel="stylesheet" href="{{url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content-header')
    <h1>Log Masuk {{auth('user')->user()->lokasi->lokasi}}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('security-home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
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
                    <h3 class="box-title">Data Log Masuk {{auth('user')->user()->lokasi->lokasi}}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body  table-responsive">
                    <table id="table1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="vertical-align: middle">SIMARU</th>
                            <th style="vertical-align: middle">NIK</th>
                            <th style="vertical-align: middle">Nama</th>
                            <th style="vertical-align: middle">Perusahaan</th>
                            <th style="vertical-align: middle">Unit Perusahaan</th>
                            <th style="vertical-align: middle">Pemberi<br>Izin Masuk</th>
                            <th style="vertical-align: middle">Waktu Kerja</th>
                            <th style="vertical-align: middle">Waktu Log</th>
                            <th style="width: 7%;vertical-align: middle">Status</th>
                            <th style="width: 12%;vertical-align: middle">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($logs as $log)
                            <tr>
                                <td>{{$log->suratMasuk->nomorSurat}}</td>
                                <td>{{$log->petugas->picMitra->nik}}</td>
                                <td>{{$log->petugas->picMitra->nama}}</td>
                                <td>
                                    {{($log->petugas->picMitra->idPerusahaan == 1 ? $log->petugas->picMitra->keterangan : $log->petugas->picMitra->perusahaan->namaPerusahaan)}}
                                </td>
                                <td>
                                    {{($log->petugas->picMitra->idUnitPerusahaan == 1 ? $log->petugas->picMitra->keterangan : $log->petugas->picMitra->unitPerusahaan->namaUnit)}}
                                </td>
                                <td>{{$log->securityMasuk->nama}}</td>
                                <td>{{$log->suratMasuk->pekerjaan->jamMasuk}}<br>{{$log->suratMasuk->pekerjaan->jamKeluar}}</td>
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
                                <td>
                                    <div class="row" style="padding-bottom: 5px">
                                        <div class="col-xs-6" style="padding: 0px 9px 0px 10px">
                                            <a href="{{route('get-securityBeriIjinKeluar',['id' => $log->id])}}">
                                                <button type="submit"
                                                        class="btn btn-success pull-right btn-block btn-sm validasi"
                                                        value="{{$log->petugas->picMitra->nama}}"
                                                        data-toogle="tooltip" data-placement="bottom"  title="Ijinkan Keluar">
                                                    <i class="fa fa-sign-out"></i>
                                                </button>
                                            </a>
                                        </div>
                                        <div class="col-xs-6" style="padding: 0px 12px 0px 7px">
                                            <a href="{{route('get-securityIndexBeriExtend',['id' => $log->id])}}">
                                                <button type="button"
                                                        class="btn btn-warning pull-right btn-block btn-sm extend"
                                                        value="{{$log->petugas->picMitra->nama}}"
                                                        data-toogle="tooltip" data-placement="bottom"  title="Extend Waktu Kerja">
                                                    <i class="fa fa-clock-o"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row" style="padding-bottom: 5px">
                                        <div class="col-xs-6" style="padding: 0px 9px 0px 10px">
                                            <a href="{{route('get-securityDetailSurat',['id' => $log->suratMasuk->id])}}">
                                                <button type="button"
                                                        class="btn btn-info pull-right btn-block btn-sm"
                                                        data-toogle="tooltip" data-placement="bottom"  title="Tampilkan Surat">
                                                    <i class="fa fa-map-pin"></i>
                                                </button>
                                            </a>
                                        </div>
                                        <div class="col-xs-6" style="padding: 0px 12px 0px 7px">
                                            <a href="{{route('get-securityHapusLog',['id' => $log->id])}}">
                                                <button type="button"
                                                        class="btn btn-danger pull-right btn-block btn-sm hapus"
                                                        value="{{$log->petugas->picMitra->nama}}"
                                                        data-toogle="tooltip" data-placement="bottom"  title="Hapus">
                                                    <i class="fa fa-trash"></i>
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
            <a href="{{route('security-home')}}">
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

            $('.validasi').on('click', function () {
                return confirm('Beri Izin keluar untuk petugas '+$(this).val()+' ?')
            });

            $('.extend').on('click', function () {
                return confirm('Beri Extend untuk petugas '+$(this).val()+' ?')
            });

            $('.hapus').on('click', function () {
                return confirm('Hapus Log '+$(this).val()+'?')
            });
        });
    </script>
@endsection
