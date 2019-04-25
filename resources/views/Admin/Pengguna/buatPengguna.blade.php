@extends('Admin.Layouts.rootPage')


@section('extraStyleSheet')
    <link rel="stylesheet" href="{{url('css/chosen.min.css')}}">
@endsection

@section('content-header')
    <h1>Buat Akun Security
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
                    <h3 class="box-title">Form Pengguna Security Baru</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>

                <form action="{{route('post-buatUser')}}" class="form-horizontal" method="POST">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">NIK</label>

                            <div class="col-sm-10">
                                @if(old('nik'))
                                    <input type="number" class="form-control" name="nik" id="nik"
                                           placeholder="NIK" required autocomplete="off" value="{{old('nik')}}">
                                @else
                                    <input type="number" class="form-control" name="nik" id="nik"
                                           placeholder="NIK" required autocomplete="off">
                                @endif
                                <small>Input Berupa Angka</small>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama</label>

                            <div class="col-sm-10">
                                @if(old('nama'))
                                    <input type="text" class="form-control" name="nama" id="nama"
                                           placeholder="Nama Lengkap" required autocomplete="off"
                                           value="{{old('nama')}}">
                                @else
                                    <input type="text" class="form-control" name="nama" id="nama"
                                           placeholder="Nama Lengkap" required autocomplete="off">
                                @endif
                                <small>Karaktek Minimal 1 dan Maksimal 30</small>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Kontak</label>

                            <div class="col-sm-10">
                                @if(old('kontak'))
                                    <input type="text" class="form-control" name="kontak" id="kontak"
                                           placeholder="08xx-xxxx-xxxx" required autocomplete="off"
                                           value="{{old('kontak')}}">
                                @else
                                    <input type="text" class="form-control" name="kontak" id="nama"
                                           placeholder="08xx-xxxx-xxxx" required autocomplete="off">
                                @endif
                                    <small>Karaktek Minimal 1, Maksimal 30 atau Strip (-) Bila Tidak Memiliki Kontak</small>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Username</label>

                            <div class="col-sm-10">
                                @if(old('username'))
                                    <input type="text" class="form-control" name="username" id="username"
                                           placeholder="Username" required autocomplete="off"
                                           value="{{old('username')}}">
                                @else
                                    <input type="text" class="form-control" name="username" id="username"
                                           placeholder="Username" required autocomplete="off">
                                @endif
                                <small>Karaktek Minimal 6 dan Maksimal 30</small>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Password</label>

                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password" id="password" required
                                       autocomplete="off">
                                <small>Karaktek Minimal 6 dan Maksimal 30 (Disarankan)</small>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Konfirmasi Ulang Password</label>

                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="validatePassword"
                                       id="validatePassword" required autocomplete="off">
                                <small>Karaktek Minimal 6 dan Maksimal 30 (Disarankan)</small>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Lokasi Kerja</label>

                            <div class="col-sm-10">
                                <select class="form-control chosen" name="lokasi" style="border-radius: 10px" required>
                                    @foreach($lokasis as $lokasi)
                                        @if(old('lokasi'))
                                            @if(old('lokasi') == $lokasi->id)
                                                <option value="{{$lokasi->id}}" selected>{{$lokasi->lokasi}}</option>
                                            @else
                                                <option value="{{$lokasi->id}}">{{$lokasi->lokasi}}</option>
                                            @endif
                                        @else
                                            <option value="{{$lokasi->id}}">{{$lokasi->lokasi}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <small>Pilih Salah Satu Lokasi Kerja</small>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-right" id="submit">Tambah Pengguna</button>
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
    <script src="{{url('js/chosen.jquery.min.js')}}"></script>


    <script>
        $(function () {
            $(".chosen").chosen({
                no_results_text: "Tidak Ditemukan!",
                width: "100%"
            });
        });

        $('#kembali').on('click', function () {
            return confirm('Kembali ke halaman utama? Data yang diinputkan akan dibuang.')
        });

        $('#submit').on('click', function () {
            var jumlah = $('#nik').val();
            if (/^[0-9]*$/.test(jumlah) == false || jumlah == '') {
                alert('NIK tidak boleh kosong dan harus berupa angka positif!');
                return false;
            }
            return confirm('Tambah Pengguna?')
        });
    </script>
@endsection