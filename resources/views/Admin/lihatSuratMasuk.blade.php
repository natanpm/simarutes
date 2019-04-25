@extends('Admin.Layouts.rootPage')

@section('extraStyleSheet')
    <link rel="stylesheet" href="{{url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content-header')
    <h1>Lihat Surat Ijin Masuk
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin-home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
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
                    <h3 class="box-title">Data Surat Ijin Masuk</h3>
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
                            <th style="width: 5%; vertical-align: middle">Nomor Surat</th>
                            <th style="vertical-align: middle">Perihal</th>
                            <th style="vertical-align: middle">Lokasi</th>
                            <th style="vertical-align: middle">Keterangan</th>
                            <th style="vertical-align: middle">Waktu</th>
                            <th style="vertical-align: middle">PIC Telkom</th>
                            <th style="vertical-align: middle">Status</th>
                            <th style="width: 12%; vertical-align: middle">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($surats as $surat)
                            <tr>
                                <td>
                                    {{$surat->nomorSurat}}
                                </td>
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
                                            <a href="{{route('get-indexEditSurat',['id' => $surat->id])}}">
                                                <button type="submit"
                                                        class="btn btn-warning pull-right btn-block btn-sm"
                                                        data-toogle="tooltip" data-placement="bottom"  title="Edit Surat">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                            </a>
                                        </div>
                                        <div class="col-xs-4 " style="padding: 0px 7px 0px 4px">
                                            <a href="{{route('get-detailSurat',['id' => $surat->id])}}">
                                                <button type="submit"
                                                        class="btn btn-info pull-right btn-block btn-sm"
                                                        data-toogle="tooltip" data-placement="bottom"  title="Tampilkan Surat">
                                                    <i class="fa fa-map-pin"></i>
                                                </button>
                                            </a>
                                        </div>
                                        <div class="col-xs-4" style="padding: 0px 12px 0px 0px">
                                            <a href="{{route('get-hapusSurat',['id' => $surat->id])}}">
                                                <button type="submit"
                                                        class="btn btn-danger pull-right btn-block btn-sm hapus"
                                                        value="{{$surat->nomorSurat}}"
                                                data-toogle="tooltip" data-placement="bottom"  title="Hapus Surat">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </a>
                                        </div>


                                           <div class="col-xs-4" style="padding: 7px 4px 0px 10px">
                                            <a href="{{route('get-matikanSurat',['id' => $surat->id])}}')}}">
                                                <button type="submit"
                                                        class="btn btn-danger pull-right btn-block btn-sm mati"
                                                        data-toogle="tooltip" data-placement="bottom"  title="Non Aktifkan Surat">
                                                    <i class="fa fa-close"></i>
                                                </button>
                                            </a>
                                        </div>

                                         <div class="col-xs-4" style="padding: 7px 7px 0px 4px">
                                            <a href="{{route('get-aktifkanSurat',['id' => $surat->id])}}')}}">
                                                <button type="submit"
                                                        class="btn btn-success pull-right btn-block btn-sm aktif"
                                                        data-toogle="tooltip" data-placement="bottom"  title="Aktifkan Surat">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            </a>
                                        </div>

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
            <a href="{{route('admin-home')}}">
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

            $('.hapus').on('click', function () {
                return confirm('Hapus SIMARU ' + $(this).val() + '?')
            });

            $('.mati').on('click', function () {
                return confirm('Non-Aktifkan SIMARU ' + $(this).val() + '?')
            });

             $('.aktif').on('click', function () {
                return confirm('Aktifkan SIMARU ' + $(this).val() + '?')
            });
            $('#table1').DataTable({
                "order": [[0, "desc"]]
            });
        });
    </script>
@endsection
