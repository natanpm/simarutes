@extends('Validator.Layouts.rootPage')

@section('extraStyleSheet')
    <link rel="stylesheet" href="{{url('css/chosen.min.css')}}">
@endsection

@section('content-header')
    <h1>Edit PIC SIGMA
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
                    <h3 class="box-title">Form Edit PIC Sigma</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>

                <form action="{{route('post-validatorEditPicSigma',['id' => $pic->id])}}" class="form-horizontal"
                      method="POST">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama</label>

                            <div class="col-sm-10">
                                @if(old('nama'))
                                    <input type="text" class="form-control" name="nama" id="nama"
                                           placeholder="Nama Lengkap" value="{{old('nama')}}" required
                                           autocomplete="off">
                                @else
                                    <input type="text" class="form-control" name="nama" id="nama"
                                           placeholder="Nama Lengkap" value="{{$pic->nama}}" required
                                           autocomplete="off">
                                @endif
                                <small>Karakter Minimal 1 dan Maksimal 30</small>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Kontak</label>

                            <div class="col-sm-10">
                                @if(old('kontak'))
                                    <input type="text" class="form-control" name="kontak" id="kontak"
                                           placeholder="08XX-XXXX-XXXX" value="{{old('kontak')}}" required
                                           autocomplete="off">
                                @else
                                    <input type="text" class="form-control" name="kontak" id="kontak"
                                           placeholder="08XX-XXXX-XXXX" value="{{$pic->kontak}}" required
                                           autocomplete="off">
                                @endif
                                <small>Karaktek Minimal 1, Maksimal 30 atau Strip (-) Bila Tidak Memiliki Kontak</small>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Unit</label>

                            <div class="col-sm-10">
                                <select class="form-control sigmaDropDown chosen-select"
                                        name="idUnitPerusahaan" required>
                                    @foreach($units as $unit)
                                        @if(old('idUnitPerusahaan') && old('idUnitPerusahaan') == $unit->id)
                                            <option title="" selected value="{{$unit->id}}">{{$unit->namaUnit}}</option>
                                        @else
                                            @if($unit->id ==$pic->idUnitPerusahaan)
                                                <option title="" selected
                                                        value="{{$unit->id}}">{{$unit->namaUnit}}</option>
                                            @else
                                                <option title="" value="{{$unit->id}}">{{$unit->namaUnit}}</option>
                                            @endif
                                        @endif
                                    @endforeach
                                    <small>Pilih Salah Satu Unit SIGMA</small>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-right" id="submit" style="margin-left: 10px">
                            Edit PIC
                            SIGMA
                        </button>
                        <a href="{{route('get-validatorLihatPicSigma')}}">
                            <button type="button" class="btn btn-warning pull-right" id="kembali"
                                    style="margin-right: 10px">Batal
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
    <script src="{{url('js/chosen.jquery.min.js')}}"></script>

    <script>
        $(function () {
            $(".sigmaDropDown").chosen({
                no_results_text: "Tidak Ditemukan!",
                width: "100%"
            });

            $('#kembali').on('click', function () {
                return confirm('Kembali ke halaman sebelumnya? Data yang diinputkan akan dibuang')
            });

            $('#submit').on('click', function () {
                return confirm('Simpan Perubahan?')
            });
        });
    </script>
@endsection