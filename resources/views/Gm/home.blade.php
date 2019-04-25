@extends('Gm.Layouts.rootPage')

@section('extraStyleSheet')
    <link rel="stylesheet" href="{{url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection


@section('content-header')
    <h1>Dashboard SL WITEL
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('gm-home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
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
        <div class="col-xs-12">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Data SIMARU</h3>
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
                            <th style="width: 10%;vertical-align: middle">Instansi</th>
                            <th style="vertical-align: middle">PIC Telkom</th>
                            <th style="vertical-align: middle">Lokasi</th>
                            <th style="vertical-align: middle">Keterangan</th>
                            <th style="vertical-align: middle">Tanggal</th>
                            <th style="width: 5%; vertical-align: middle">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($surats as $surat)
                            <tr>
                                <td>{{$surat->nomorSurat}}</td>
                                <td>{{$surat->perihal}}</td>
                                <td>{{ucwords(strtolower($surat->kepada))}}</td>
                                <td>
                                    @foreach($surat->waspang as $picTelkom)
                                        <strong>- </strong>{{$picTelkom->picTelkom->nama}}<br>
                                    @endforeach
                                </td>
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
                                    <div class="col-xs-12" style="padding: 0px 0px 0px 0px">
                                        <a href="{{route('get-gmDetailSurat',['id' => $surat->id])}}">
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
        });
    </script>
@endsection
