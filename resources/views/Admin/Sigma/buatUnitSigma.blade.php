@extends('Admin.Layouts.rootPage')

@section('content-header')
    <h1>Buat Unit SIGMA
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin-home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
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
                    <h3 class="box-title">Form Tambah Unit PIC Sigma</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>

                <form action="{{route('post-buatUnitSigma')}}" class="form-horizontal" method="POST">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama Unit</label>

                            <div class="col-sm-10">
                                @if(old('namaUnit'))
                                    <input type="text" class="form-control" name="namaUnit" placeholder="Nama Perusahaan"
                                           required autocomplete="off" value="{{old('namaUnit')}}">
                                @else
                                    <input type="text" class="form-control" name="namaUnit" placeholder="Nama Perusahaan"
                                           required autocomplete="off">
                                @endif
                                    <small>Karakter Minimal 1 dan Maksimal 30</small>
                            </div>
                        </div>
                    </div>


                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-right" id="submit">Tambah</button>
                        <a href="{{route('admin-home')}}">
                            <button type="button" class="btn btn-warning pull-right" style="margin-right: 5px;"
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
    <script>
        $(function () {
            $('#kembali').on('click', function () {
                return confirm('Kembali ke halaman utama?')
            });

            $('#submit').on('click', function () {
                return confirm('Tambah Unit Sigma?')
            });
        });
    </script>
@endsection