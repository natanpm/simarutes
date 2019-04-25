@extends('SuperValidator.Layouts.rootPage')

@section('extraStyleSheet')
    <link rel="stylesheet" href="{{url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content-header')
    <h1>Lihat Data PIC TKM NETRA
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('supervalidator-home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
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
                    <h3 class="box-title">Data PIC TKM NETRA</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive" >
                    <table id="table1" class="table table-bordered table-striped" >
                        <thead>
                        <tr>
                            <th style="vertical-align: middle">No Identitas</th>
                            <th style="vertical-align: middle">Nama</th>
                            <th style="vertical-align: middle">Kontak</th>
                            <th style="vertical-align: middle">Unit</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($picTkmNetra as $pic)
                            <tr>
                                <td>{{$pic->nik}}</td>
                                <td>{{$pic->nama}}</td>
                                <td>{{$pic->kontak}}</td>
                                <td>{{$pic->unitPerusahaan->namaUnit}}</td>
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
            <a href="{{route('supervalidator-home')}}">
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

            $('#table1').DataTable();
        });
    </script>
@endsection
