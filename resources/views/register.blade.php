<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>SIMARU | Register Page</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="{{url('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{url('css/register.min.css')}}">

    <link rel="stylesheet" href="{{url('css/skins/skin-red-light.min.css')}}">

    <link rel="stylesheet" href="{{url('css/login.min.css')}}">

</head>
<body class="hold-transition bgscreen ">
<div class="register-box">
    <div class="login-logo">
        <span><b>SIMARU</b> | Register Page</span>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <div class="login-logo">
            <img class="telkom-logo" src="{{url('img/TelkomAsset/logofix-100x70.png')}}" alt="User Image">
        </div>
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
        <form action="{{route('register')}}" method="POST">
            {{csrf_field()}}
            <div class="box-body">
                <div class="form-group has-feedback">
                    <label class="col-md-2 control-label">NIK</label>
                    <div class="col-md-10">
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
                <div class="form-group has-feedback">
                    <label class="col-md-2 control-label">Nama</label>
                    <div class="col-md-10">
                        @if(old('nama'))
                            <input type="text" class="form-control" name="nama" id="nama"
                                   placeholder="Nama" required autocomplete="off" value="{{old('nama')}}">
                        @else
                            <input type="text" class="form-control" name="nama" id="nama"
                                   placeholder="Nama" required autocomplete="off">
                        @endif
                            <small>Karaktek Minimal 1 dan Maksimal 30</small>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="form-group has-feedback">
                    <label class="col-md-2 control-label">Kontak</label>
                    <div class="col-md-10">
                        @if(old('kontak'))
                            <input type="text" class="form-control" name="kontak" id="kontak"
                                   placeholder="08xx-xxxx-xxxx" required autocomplete="off" value="{{old('kontak')}}">
                        @else
                            <input type="text" class="form-control" name="kontak" id="kontak"
                                   placeholder="08xx-xxxx-xxxx" required autocomplete="off">
                        @endif
                            <small>Input Berupa Angka Karaktek Minimal 6 dan Maksimal 30</small>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="form-group has-feedback">
                    <label class="col-md-2 control-label">Username</label>
                    <div class="col-md-10">
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
                <div class="form-group has-feedback">
                    <label class="col-md-2 control-label">Password</label>
                    <div class="col-md-10">
                        <input type="password" class="form-control" name="password" id="password"
                               placeholder="Password" required autocomplete="off">
                        <small>Karaktek Minimal 6 dan Maksimal 30 (Disarankan)</small>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="form-group has-feedback">
                    <label class="col-md-2 control-label">Konfirmasi Password</label>
                    <div class="col-md-10">
                        <input type="password" class="form-control" name="konfirmasiPassword" id="konfirmasiPassword"
                               placeholder="Password" required autocomplete="off">
                        <small>Karaktek Minimal 6 dan Maksimal 30 (Disarankan)</small>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="form-group has-feedback">
                    <label class="col-md-2 control-label">Jenis Akun</label>
                    <div class="col-md-10">
                        <select class="form-control" name="akun" id="akun" required>
                            @if(old('akun') && old('akun') == 'picTelkom')
                                <option value="security">Security</option>
                                <option value="picTelkom" selected>PIC Telkom</option>
                            @elseif(old('akun') && old('akun')== 'security')
                                <option value="security" selected>Security</option>
                                <option value="picTelkom">PIC Telkom</option>
                            @else
                                <option value="security">Security</option>
                                <option value="picTelkom">PIC Telkom</option>
                            @endif
                        </select>
                        <small>Pilih Salah Satu Jenis Akun</small>
                    </div>
                </div>
            </div>

            <div class="box-body" id="loc">
                <div class="form-group has-feedback">
                    <label class="col-md-2 control-label">Lokasi Kerja</label>
                    <div class="col-md-10">
                        <select class="form-control" name="lokasi" required>
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

            <div class="row" style="padding-top: 10px">
                <div class="col-md-6" style="padding-top: 5px">
                    <a href="{{route('index-login')}}">
                        <button type="button" class="btn btn-primary btn-block border-radius-element">Login</button>
                    </a>
                </div>
                <div class="col-md-6" style="padding-top: 5px">
                    <button type="submit" class="btn btn-success btn-block border-radius-element">Register</button>
                </div>
            </div>
            <!-- /.col -->
        </form>
        <div class="lockscreen-footer text-center" style="padding-top: 10px">
            <strong>Copyright © 2017 TELKOM INDONESIA.</strong><br>
            <strong>All rights reserved</strong><br>
            <small><strong>SIMARU V 2.6</strong></small><br>
            <strong>
                <small><a target="_blank" href="mailto:natanaelpandapotan@gmail.com">Dev</a></small>
            </strong>
        </div>
    </div>
</div>

<script src="{{url('bower_components/jquery/dist/jquery.min.js')}}"></script>

<script src="{{url('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<script>
    $(function () {
        $('#loc').hide();

        $("#akun").prop("selectedIndex", -1);

        $("#akun").on('change', function () {
            var selected = $(this).val();
            if (selected == 'picTelkom') {
                $('#loc').hide('slow');
            } else if (selected == 'security') {
                $('#loc').show('slow');
            }
        });
    });
</script>
</body>
</html>
