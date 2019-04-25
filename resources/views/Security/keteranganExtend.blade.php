@extends('Security.Layouts.rootPage')

@section('extraStyleSheet')
    <link rel="stylesheet" href="{{url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content-header')
    <h1>Keterangan Extends
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
                    <h3 class="box-title">Keterangan Extends</h3>
                </div>
                <!-- /.box-header -->
                <form action="{{route('post-securityBeriExtend',['id' => $log->id])}}" method="POST">
                    {{csrf_field()}}

                    <div class="box-body">
                        <div class="form-group">
                            <h5>Keterangan Extend Sebelumnya</h5>

                            <textarea class="form-control" name="pesan" rows="1" placeholder="Keterangan"
                                      style="margin: 0px -12px 0px 0px; height: 160px;"
                                      disabled>{{$log->pesan}}</textarea>
                        </div>

                        <div class="form-group">
                            <h5>Keterangan Baru</h5>

                            <textarea class="form-control" name="pesan" rows="1" placeholder="Keterangan"
                                      style="margin: 0px -12px 0px 0px; height: 160px;"></textarea>
                        </div>
                        <small>Masukan Keterangan Extend dengan Singkat Jelas dan Padat.</small>

                        <button type="submit" class="btn btn-success pull-right" style="margin-right: 5px;">
                            Beri Extend
                        </button>
                        <a href="{{url()->previous()}}">
                            <button type="button" class="btn btn-success pull-right" style="margin-right: 5px;">
                                Kembali
                            </button>
                        </a>
                    </div>
                </form>
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
            $('#table1').DataTable()

            $('.validasi').on('click', function () {
                return confirm('Beri Izin keluar untuk petugas ' + $(this).val() + ' ?')
            });

            $('.hapus').on('click', function () {
                return confirm('Hapus log nama ' + $(this).val() + '?')
            });
        });
    </script>
@endsection
