@extends('Validator.Layouts.rootPage')

@section('extraStyleSheet')
    <link rel="stylesheet" href="{{url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content-header')
    <h1>Data NDA PIC SIGMA
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
                    <h3 class="box-title">Data NDA PIC SIGMA</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive" >
                    <table id="table1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="vertical-align: middle">Nama</th>
                            <th style="vertical-align: middle">Kontak</th>
                            <th style="vertical-align: middle">Unit</th>
                            <th style="vertical-align: middle">Status NDA</th>
                            <th style="vertical-align: middle">Masa Berlaku NDA</th>
                            <th style="width: 12%;vertical-align: middle">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pics as $index => $pic)
                            <tr>
                                <td>{{$pic->nama}}</td>
                                <td>{{$pic->kontak}}</td>
                                <td>{{$pic->unitPerusahaan->namaUnit}}</td>
                                <td>
                                    {{$arrayStatusNda[$index]}}
                                </td>
                                <td>
                                    {{$arrayMasaBerlakuNda[$index]}}
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-xs-12 " style="padding: 0px 12px 2px 12px">
                                            <a href="{{route('get-validatorLihatNda',['path' => ($pic->statusNda == 1 ? $pic->nda->pathUri : 'null')])}}">
                                                <button type="button"
                                                        class="btn btn-info pull-right btn-block btn-sm"
														data-toogle="tooltip" data-placement="bottom"  title="Tampilkan NDA">
                                                    <i class="fa fa-map-pin"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6" style="padding: 2px 7px 0px 12px">
                                            <a href="{{route('get-validatorIndexUploadNda',['id' => $pic->id])}}">
                                                <button type="button"
                                                        class="btn btn-warning pull-right btn-block btn-sm"
														data-toogle="tooltip" data-placement="bottom"  title="Upload NDA">
                                                    <i class="fa fa-upload"></i>
                                                </button>
                                            </a>
                                        </div>
                                        <div class="col-xs-6" style="padding: 2px 12px 0px 7px">
                                            <a href="{{route('get-validatorHapusNda',['id' => $pic->id])}}">
                                                <button type="button"
                                                        class="btn btn-danger pull-right btn-block btn-sm hapus"
														data-toogle="tooltip" data-placement="bottom"  title="Hapus NDA"
                                                        
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

            $('.hapus').on('click', function () {
                return confirm('Hapus nama '+$(this).val()+'?')
            });

//            $('.validasi').on('click', function () {
//                return confirm('Validasi NDA petugas dengan nama ' + $(this).val() + '?')
//            });

            $('#table1').DataTable();
        });
    </script>
@endsection
