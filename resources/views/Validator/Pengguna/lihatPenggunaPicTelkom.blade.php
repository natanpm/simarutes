@extends('Validator.Layouts.rootPage')

@section('extraStyleSheet')
    <link rel="stylesheet" href="{{url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content-header')
    <h1>Lihat Data Pengguna PIC Telkom
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
                    <h3 class="box-title">Data Pengguna PIC Telkom</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="table1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="vertical-align: middle">NIK</th>
                            <th style="vertical-align: middle">Nama</th>
                            <th style="vertical-align: middle">Username</th>
                            <th style="vertical-align: middle">Kontak</th>
                            <th style="vertical-align: middle">Status</th>
                            <th style="width: 12%; vertical-align: middle">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->nik}}</td>
                                <td>{{$user->nama}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->kontak}}</td>
                                <td>
                                    @if($user->statusUser == 1)
                                        Aktif
                                    @else
                                        Pending
                                    @endif
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-xs-4" style="padding: 0px 4px 0px 10px">
                                            <a href="{{route('get-validatorValidasiPicTelkom',['id' => $user->id])}}">
                                                <button type="submit"
                                                        class="btn btn-success pull-right btn-block btn-sm validasi"
														data-toogle="tooltip" data-placement="bottom"  title="Validasi Akun">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            </a>
                                        </div>
                                        <div class="col-xs-4" style="padding: 0px 7px 0px 4px">
                                            <a href="{{route('get-validatorEditUserPicTelkom',['id' => $user->id])}}">
                                                <button type="submit"
                                                        class="btn btn-warning pull-right btn-block btn-sm"
														data-toogle="tooltip" data-placement="bottom"  title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                            </a>
                                        </div>
                                        <div class="col-xs-4" style="padding: 0px 12px 0px 0px">
                                            <a href="{{route('get-validatorHapusUserPicTelkom',['id' => $user->id])}}')}}">
                                                <button type="submit"
                                                        class="btn btn-danger pull-right btn-block btn-sm hapus"
														data-toogle="tooltip" data-placement="bottom"  title="Hapus"
                                                   
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
                return confirm('Hapus nama ' + $(this).val() + '?')
            });

            $('.validasi').on('click', function () {
                return confirm('Validasi Akun '+$(this).val()+'?')
            });

            $('#table1').DataTable();
        });
    </script>
@endsection
