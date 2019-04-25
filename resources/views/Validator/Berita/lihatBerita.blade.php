@extends('Validator.Layouts.rootPage')

@section('extraStyleSheet')
    <link rel="stylesheet" href="{{url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content-header')
    <h1>Lihat Berita SIMARU
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('validator-home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
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
                    <h3 class="box-title">Berita SIMARU</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body  table-responsive">
                    <table id="table1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="vertical-align: middle">Kondisi Berita</th>
                            <th style="vertical-align: middle">Berita</th>
                            <th style="vertical-align: middle">Status Berita</th>
                            <th style="width: 5%; vertical-align: middle">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($beritas as $berita)
                            <tr>
                                <td>
                                    @if($berita->statusKondisi === "success")
                                        Standar
                                    @elseif($berita->statusKondisi === "warning")
                                        Menengah
                                    @else
                                        Tinggi
                                    @endif
                                </td>
                                <td>{{$berita->pesan}}</td>
                                <td>
                                    @if($berita->statusBerita == 0)
                                        Tersimpan
                                    @else
                                        Terpublikasi
                                    @endif
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-xs-6" style="padding: 0px 9px 2px 10px">
                                            <a href="{{route('get-validatorSetAktifBerita',['id' => $berita->id])}}">
                                                <button type="button"
                                                        class="btn btn-info pull-right btn-block btn-sm aktif"
														data-toogle="tooltip" data-placement="bottom"  title="Aktifkan Berita"
                                                        
                                                >
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            </a>
                                        </div>
                                        <div class="col-xs-6 " style="padding: 0px 12px 2px 7px">
                                            <a href="{{route('get-validatorSetPasifBerita',['id' => $berita->id])}}')}}">
                                                <button type="button"
                                                        class="btn btn-danger pull-right btn-block btn-sm pasif"
														data-toogle="tooltip" data-placement="bottom"  title="Non-Aktifkan Berita"
                                                       
                                                >
                                                    <i class="fa fa-close"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6" style="padding: 2px 9px 0px 10px">
                                            <a href="{{route('get-validatorEditBerita',['id' => $berita->id])}}">
                                                <button type="button"
                                                        class="btn btn-warning pull-right btn-block btn-sm edit"
														data-toogle="tooltip" data-placement="bottom"  title="Edit Berita">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                            </a>
                                        </div>
                                        <div class="col-xs-6" style="padding: 2px 12px 0px 7px">
                                            <a href="{{route('get-validatorHapusBerita',['id' => $berita->id])}}')}}">
                                                <button type="button"
                                                        class="btn btn-danger pull-right btn-block btn-sm hapus"
														data-toogle="tooltip" data-placement="bottom"  title="Hapus Berita"
                                                        
                                                >
                                                    <i class="fa fa-trash"></i>
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
            <a href="{{route('validator-home')}}">
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
            $('.aktif').on('click', function () {
                return confirm('Atur berita "' + $(this).val() + '" sebagai aktif di publikasi ?  ')
            });

            $('.pasif').on('click', function () {
                return confirm('Atur berita "' + $(this).val() + '" sebagai berita tersimpan ?  ')
            });

            $('.hapus').on('click', function () {
                return confirm('Hapus berita "' + $(this).val() + '" ?')
            });

            $('#table1').DataTable();
        });
    </script>
@endsection
