@extends('Validator.Layouts.rootPage')

@section('content-header')
    <h1>Edit Berita Simaru
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
                    <h3 class="box-title">Form Edit Berita SIMARU</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>

                <form action="{{route('post-validatorEditBerita',['id' => $berita->id])}}" class="form-horizontal" method="POST">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Pesan Berita</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="pesan" id="pesan"
                                       placeholder="Pesan berita" required autocomplete="off"
                                       value="{{$berita->pesan}}">
                                <small>Panjang Maksimal 500 Karakter</small>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Status Kondisi Berita</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="statusKondisi" id="statusKondisi" required>
                                    @if($berita->statusKondisi == "success")
                                        <option value="success" selected>Standar</option>
                                        <option value="warning">Menengah</option>
                                        <option value="danger">Tinggi</option>
                                    @elseif($berita->statusKondisi == "warning")
                                        <option value="success">Standar</option>
                                        <option value="warning" selected>Menengah</option>
                                        <option value="danger">Tinggi</option>
                                    @else
                                        <option value="success">Standar</option>
                                        <option value="warning">Menengah</option>
                                        <option value="danger" selected>Tinggi</option>
                                    @endif
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
                                    @if($berita->statusBerita == 0)
                                        <option value=0 selected>Pending</option>
                                        <option value=1>Aktif</option>
                                    @else
                                        <option value=0 >Pending</option>
                                        <option value=1 selected>Aktif</option>
                                    @endif

                                </select>
                                <small>Pilih Salah Satu Status Publikasi Berita</small>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-right" id="submit">Edit Berita</button>
                        <a href="{{route('get-validatorLihatBerita')}}">
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
            return confirm('Edit Berita ?')
        });
    </script>
@endsection