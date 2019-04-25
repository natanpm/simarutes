@extends('Admin.Layouts.rootPage')


@section('content-header')
    <h1>Edit Profile Akun
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
                    <h3 class="box-title">Edit Profile Akun</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>

                <form action="{{route('admin-editProfile')}}" class="form-horizontal" method="POST">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Username</label>

                            <div class="col-sm-10">
                                @if(old('username'))
                                    <input type="text" class="form-control" name="username" id="username"
                                           required value="{{old('username')}}">
                                @else
                                    <input type="text" class="form-control" name="username" id="username"
                                           required value="{{$user->username}}">
                                @endif
                                    <small>Karaktek Minimal 6 dan Maksimal 30</small>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Password Baru</label>

                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password" id="password">
                                <small>Karaktek Minimal 6 dan Maksimal 30 (Disarankan)</small>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Konfirmasi Ulang Password Baru</label>

                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="validatePassword"
                                       id="validatePassword">
                                <small>Karaktek Minimal 6 dan Maksimal 30 (Disarankan)</small>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-right" id="kirim">Edit Profile</button>
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

        $('#kembali').on('click', function () {
            return confirm('Kembali ke halaman utama?')
        });

        $('#kirim').on('click', function () {
            return confirm('Edit Profile?')
        });
    </script>
@endsection