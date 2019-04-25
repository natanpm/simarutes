@extends('Admin.Layouts.rootPage')

@section('extraStyleSheet')
    <link rel="stylesheet" href="{{url('css/chosen.min.css')}}">
@endsection

@section('content-header')
    <h1>Edit Akun PIC Telkom
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
                    <h3 class="box-title">Form Edit Akun PIC Telkom</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>

                <form action="{{route('post-editUserPicTelkom',['id' => $user->id])}}" class="form-horizontal"
                      method="POST">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">PIC Telkom</label>

                            <div class="col-sm-10">
                                <select class="form-control chosen" name="picTelkom" style="border-radius: 10px"
                                        required>
                                    @foreach($picTelkoms as $picTelkom)
                                        @if(old('picTelkom') == $picTelkom->id)
                                            <option title="" value="{{$picTelkom->id}}"
                                                    selected>{{$picTelkom->nama}}({{$picTelkom->unit}})
                                            </option>
                                        @else
                                            @if($user->pengguna->idPicTelkom == $picTelkom->id)
                                                <option title="" selected
                                                        value="{{$picTelkom->id}}">{{$picTelkom->nama}}
                                                    ({{$picTelkom->unit}})
                                                </option>
                                            @else
                                                <option title="" value="{{$picTelkom->id}}">{{$picTelkom->nama}}
                                                    ({{$picTelkom->unit}})
                                                </option>
                                            @endif
                                        @endif
                                    @endforeach
                                </select>
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
                                    <input type="text" class="form-control" name="kontak" id="kontak"
                                           placeholder="08xx-xxxx-xxxx" required autocomplete="off" value="{{$user->kontak}}">
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
                                           placeholder="Username" required autocomplete="off"
                                           value="{{$user->username}}">
                                @endif
                                <small>Karaktek Minimal 6 dan Maksimal 30</small>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Password</label>

                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password" id="password"
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
                                       id="validatePassword" autocomplete="off">
                                <small>Karaktek Minimal 6 dan Maksimal 30 (Disarankan)</small>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-right" id="submit">Edit Pengguna</button>
                        <a href="{{route('get-lihatUserPicTelkom')}}">
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
            $(".chosen").chosen({
                no_results_text: "Tidak Ditemukan!",
                width: "100%"
            });
        });

        $('#kembali').on('click', function () {
            return confirm('Kembali ke halaman utama? Data yang diinputkan akan dibuang.')
        });

        $('#submit').on('click', function () {
            return confirm('Simpan Perubahan?')
        });
    </script>
@endsection