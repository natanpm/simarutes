@extends('Validator.Layouts.rootPage')

@section('extraStyleSheet')
    <link rel="stylesheet" href="{{url('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
@endsection

@section('content-header')
    <h1>Export SIMARU
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('validator-home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li><strong> {{ $error }} </strong></li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session('status'))
                <div class="alert alert-{{session('status')}}">
                    {{session('message')}}
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Export File SIMARU</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>

                <form action="{{route('get-validatorExportSimaru')}}" class="form-horizontal" method="get">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Rentang Tanggal</label>

                            <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tanggal" id="reservation"
                                           required autocomplete="off">
                                <small>Tanggal Awal - Tanggal Akhir</small>

                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-right" id="submit">Export</button>
                        <a href="{{route('validator-home')}}">
                            <button type="button" class="btn btn-success pull-right" style="margin-right: 5px;"
                                    id="kembali">
                                Kembali
                            </button>
                        </a>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>
@endsection

@section('extraJavaScript')

    <script src="{{url('bower_components/moment/min/moment.min.js')}}"></script>
    <script src="{{url('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

    <script>
        $('#reservation').daterangepicker({
            locale: {
                format: 'YYYY-MM-DD'
            }
        });

        $('#kembali').on('click', function () {
            return confirm('Kembali ke halaman utama? Data yang diinputkan akan dibuang.')
        });

    </script>
@endsection