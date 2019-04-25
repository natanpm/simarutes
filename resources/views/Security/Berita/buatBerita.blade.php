@extends('Security.Layouts.rootPage')

@section('content-header')
    <h1>Buat Berita Simaru
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('security-home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
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
                    <h3 class="box-title">Form Berita SIMARU</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>

                <form action="{{route('post-buatBerita')}}" class="form-horizontal" method="POST">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Pesan Berita</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="pesan" id="pesan"
                                       placeholder="Pesan Berita" required autocomplete="off">
                                <small>Panjang Maksimal 500 Karakter</small>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Status Kondisi Berita</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="statusKondisi" id="statusKondisi" required>
                                    <option value="success" selected>Standar</option>
                                    <option value="warning">Menengah</option>
                                    <option value="danger">Tinggi</option>
                                </select>
                                <small>Pilih Salah Satu Status Berita</small>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Status Publish Berita</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="statusBerita" id="statusBerita" required>
                                    <option value=0>Pending</option>
                                    <option value=1 selected>Aktif</option>
                                </select>
                                <small>Pilih Salah Satu Status Publish Berita</small>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-right" id="submit">Buat Berita</button>
                        <a href="{{route('security-home')}}">
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
        $('#kembali').on('click', function () {
            return confirm('Kembali ke halaman utama? Data yang diinputkan akan dibuang.')
        });

        $('#submit').on('click', function () {
            return confirm('Buat Berita ?')
        });
    </script>
@endsection