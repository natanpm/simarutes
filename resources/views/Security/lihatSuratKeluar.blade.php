@extends('Security/Layouts.rootPage')

@section('extraStyleSheet')
    <link rel="stylesheet" href="{{url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content-header')
    <h1>Lihat Surat Ijin Keluar Barang
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
                    <h3 class="box-title">Data Surat Keluar Barang</h3>
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
                            <th style="width: 10%;vertical-align: middle">Lokasi</th>
                           
                            <th style="width: 10%;vertical-align: middle">Tanggal</th>
                            <th style="vertical-align: middle">Keterangan</th>
                            <th style="vertical-align: middle">Status</th>
                            <th style="width: 5%; vertical-align: middle">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                               @foreach($surats as $surat)
                            <tr>
                                <td>{{$surat->nomorSurat}}</td>
                                <td>{{ucwords(strtolower($surat->kepada))}}</td>
            
                              <td>
                                    <?php
                                    $i = 0;
                                    $len = count($surat->lokasiSuratKeluar);
                                    ?>
                                    @foreach($surat->lokasiSuratKeluar as $loc)
                                        @if($i == $len-1)
                                            {{$loc->lokasi->lokasi}}.
                                        @else
                                            {{$loc->lokasi->lokasi}},
                                            <?php $i++?>
                                        @endif
                                    @endforeach
                                </td>
                                     
                                  <td>{{$surat->tanggal}}</td>
                                <td>{{$surat->keterangan}}</td>
                          
                              
                                <td>
                                    @if($surat->statusSurat == 0)
                                        Belum Tervalidasi.
                                    @elseif($surat->statusSurat == 1)
                                        Tervalidasi
                                    @elseif($surat->statusSurat == 2)
                                        Revisi
                                    @elseif($surat->statusSurat == 4)
                                        Non-Aktif.
                                    @else
                                   
                                        Revisi.
                                    @endif
                                </td>
                                <td>

                                     <div class="row" style="padding-bottom: 5px">
                                        <div class="col-xs-6" style="padding: 0px 7px 0px 8px">
                                            <a href="{{route('get-securityValidasiSurat',['id' => $surat->id])}}">
                                                <button type="submit"
                                                        class="btn btn-success pull-right btn-block btn-sm validasi" value="{{$surat->nomorSurat}}"
                                                        data-toogle="tooltip" data-placement="bottom"  title="Validasi Surat">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            </a>
                                        </div>
                                        <div class="col-xs-6" style="padding: 0px 10px 0px 5px">
                                            <a href="{{route('get-securityRevisiSuratKeluar',['id' => $surat->id])}}')}}">
                                                <button type="submit"
                                                        class="btn btn-danger pull-right btn-block btn-sm hapus"
                                                        value="{{$surat->nomorSurat}}"
                                                        data-toogle="tooltip" data-placement="bottom"  title="Batalkan Surat">
                                                    <i class="fa fa-close"></i>
                                                </button>
                                            </a>
                                        </div>
                            
                        
                                     <div class="col-xs-12" style="padding: 4px 7px 0px 8px">
                                        <a href="{{route('get-securityDetailSuratKeluar',['id' => $surat->id])}}">
                                            <button type="submit"
                                                    class="btn btn-info pull-right btn-block btn-sm"
                                                    data-toogle="tooltip" data-placement="bottom"  title="Tampilkan Surat">
                                                <i class="fa fa-map-pin"></i>
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

            $('.hapus').on('click', function () {
                return confirm('Batalkan validasi ' + $(this).val() + '?')
            });

            $('.validasi').on('click', function () {
                return confirm('Validasi surat ' + $(this).val() + '?')
            });

            $('#table1').DataTable({
                "order": [[0, "desc"]]
            });

            $('#table2').DataTable({
                "order": [[0, "desc"]]
            });
        });
    </script>
@endsection
