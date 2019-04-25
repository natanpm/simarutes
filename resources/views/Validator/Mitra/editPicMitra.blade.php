@extends('Validator.Layouts.rootPage')

@section('content-header')
    <h1>Edit PIC Mitra
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
                    <h3 class="box-title">Form Edit PIC Mitra</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>

                <form action="{{route('post-validatorEditPicMitra',['id' => $mitra->id])}}" class="form-horizontal"
                      method="POST">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">No Identitas</label>

                            <div class="col-sm-10">
                                @if(old('nik'))
                                    <input type="text" class="form-control" name="nik" id="nik"
                                           placeholder="No Identitas" value="{{old('nik')}}" required>
                                @else
                                    <input type="text" class="form-control" name="nik" id="nik"
                                           placeholder="No Identitas" value="{{$mitra->nik}}" required>
                                @endif
                                <small>Input Berupa Angka atau Strip (-) Bila tidak memiliki Identitas</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama</label>

                            <div class="col-sm-10">
                                @if(old('nama'))
                                    <input type="text" class="form-control" name="nama" id="nama"
                                           placeholder="Nama Lengkap" value="{{old('nama')}}" required>
                                @else
                                    <input type="text" class="form-control" name="nama" id="nama"
                                           placeholder="Nama Lengkap" value="{{$mitra->nama}}" required>
                                @endif
                                    <small>Karaktek Minimal 1 dan Maksimal 30</small>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Kontak</label>

                            <div class="col-sm-10">
                                @if(old('kontak'))
                                    <input type="text" class="form-control" name="kontak" id="kontak"
                                           placeholder="08XX-XXXX-XXXX" value="{{old('kontak')}}" required>
                                @else
                                    <input type="text" class="form-control" name="kontak" id="kontak"
                                           placeholder="08XX-XXXX-XXXX" value="{{$mitra->kontak}}" required>
                                @endif
                                    <small>Karaktek Minimal 1, Maksimal 30 atau Strip (-) Bila Tidak Memiliki Kontak</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Instansi</label>

                            <div class="col-sm-10">
                                @if(old('keterangan'))
                                    <input type="text" class="form-control" name="keterangan" id="kontak"
                                           placeholder="Instansi PIC Mitra" value="{{old('keterangan')}}" required>
                                @else
                                    <input type="text" class="form-control" name="keterangan" id="kontak"
                                           placeholder="Instansi PIC Mitra" value="{{$mitra->keterangan}}" required>
                                @endif
                                    <small>Karaktek Minimal 1 dan Maksimal 30</small>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-right" id="submit" style="margin-left: 10px">Edit PIC
                            Mitra
                        </button>
                        <a href="{{route('get-validatorLihatPicMitra')}}">
                            <button type="button" class="btn btn-warning pull-right" id="kembali" style="margin-right: 10px">Batal
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
                return confirm('Kembali ke halaman sebelumnya? Data yang diinputkan akan dibuang.')
            });

            $('#submit').on('click', function () {
                return confirm('Simpan Perubahan?')
            });
        });
    </script>
@endsection