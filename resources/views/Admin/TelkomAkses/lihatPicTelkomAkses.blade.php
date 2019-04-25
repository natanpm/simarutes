@extends('Admin.Layouts.rootPage')

@section('extraStyleSheet')
    <link rel="stylesheet" href="{{url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content-header')
    <h1>Lihat Data PIC Telkom Akses
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
                    <h3 class="box-title">Data PIC Telkom Akses</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive" >
                    <table id="table1" class="table table-bordered table-striped" >
                        <thead>
                        <tr>
                            <th style="vertical-align: middle">NIK</th>
                            <th style="vertical-align: middle">Nama</th>
                            <th style="vertical-align: middle">Kontak</th>
                            <th style="vertical-align: middle">Unit</th>
                            <th style="width: 5%; vertical-align: middle">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($picTas as $picTa)
                            <tr>
                                <td>{{$picTa->nik}}</td>
                                <td>{{$picTa->nama}}</td>
                                <td>{{$picTa->kontak}}</td>
                                <td>{{$picTa->unitPerusahaan->namaUnit}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-xs-6" style="padding: 0px 7px 0px 12px">
                                            <a href="{{route('get-editPicTelkomAkses',['id' => $picTa->id])}}">
                                                <button type="submit"
                                                        class="btn btn-warning pull-right btn-block btn-sm"
														data-toogle="tooltip" data-placement="bottom"  title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                            </a>
                                        </div>
                                        <div class="col-xs-6" style="padding: 0px 12px 0px 7px">
                                            <a href="{{route('get-hapusPicTelkomAkses',['id' => $picTa->id])}}')}}">
                                                <button type="submit"
                                                        class="btn btn-danger pull-right btn-block btn-sm hapus"
                                                        value="{{$picTa->nama}}"
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
                return confirm('Hapus nama '+$(this).val()+'?')
            });

            $('#table1').DataTable();
			
        });
    </script>
@endsection
