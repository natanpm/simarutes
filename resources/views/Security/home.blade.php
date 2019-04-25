@extends('Security.Layouts.rootPage')

@section('content-header')
    <h1>Dashboard Security
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('security-home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    </ol>
@endsection

@section('content')

    @if($berita)
        <div class="row alert alert-{{$berita->statusKondisi}}" style="padding: 5px 0px 0px 0px;font-size: 18px;margin: 0px 0px 10px 0px;">
            <div class="col-md-1">
                <b>INFO : </b>
            </div>
            <div class="col-md-11">
                <marquee scrolldelay="120">
                    <b>{{$berita->pesan}}</b>
                </marquee>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Jumlah Tamu<br>Hari Ini</span>
                    <span class="info-box-number">{{$content['jumlahTamuHariIni']}}</span>
                </div>

            </div>

        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-light-blue"><i class="ion ion-android-done"></i></span>

                <div class="info-box-content">
                    <a href="{{route('get-securityLogBelumTerselesaikan')}}">
                    <span class="info-box-text" style="color: black">Tamu Masuk<br> Tervalidasi</span>
                    <span class="info-box-number" style="color: black">{{$content['tamuMasukHariIni']}}</span>
                    </a>
                </div>

            </div>

        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-android-done-all"></i></span>

                <div class="info-box-content">
                    <a href="{{route('get-securityKeluarTervalidasi')}}">
                    <span class="info-box-text" style="color: black">Tamu Keluar<br>Tervalidasi</span>
                    <span class="info-box-number" style="color: black">{{$content['tamuKeluarHariIni']}}</span>
                    </a>
                </div>

            </div>

        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="ion ion-android-warning"></i></span>

                <div class="info-box-content">
                    <a href="{{route('get-securityLogMelebihiWaktu')}}">
                    <span class="info-box-text" style="color: black">Tamu Diluar<br>Batas Waktu</span>
                    <span class="info-box-number" style="color: black">{{$content['tamuDiluarBatas']}}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-android-alert"></i></span>

                <div class="info-box-content">
                    <a href="{{route('get-securityLogBelumTerselesaikan')}}">
                    <span class="info-box-text" style="color: black">Log Belum<br> Terselesaikan</span>
                    <span class="info-box-number" style="color: black">{{$content['logBelumTerselesaikan']}}</span>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-blue-active"><i class="ion-android-alarm-clock"></i></span>

                <div class="info-box-content">
                    <a href="{{route('get-securityIndexExtendLog')}}">
                    <span class="info-box-text" style="color: black">Log Extended</span>
                    <span class="info-box-number" style="color: black">{{$content['logExtend']}}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Pencarian Tamu Berdasarkan Nama</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>

                <form action="{{route('get-securityCariPicMitra')}}" class="form-horizontal" method="get">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama PIC Mitra</label>
                            <div class="col-sm-10">
                                @if(old('nama'))
                                    <input type="text" class="form-control" name="nama"
                                           placeholder="Nama Depan PIC Mitra" required autocomplete="off"
                                           value="{{old('nama')}}">
                                @else
                                    <input type="text" class="form-control" name="nama"
                                           placeholder="Nama Depan PIC Mitra" required autocomplete="off">
                                @endif
                                <small>Nama Depan PIC Mitra</small>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-right">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Pencarian Tamu Berdasarkan Nomor SIMARU</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>

                <form action="{{route('get-securityCariNoSimaru')}}" class="form-horizontal" method="get">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nomor SIMARU</label>
                            <div class="col-sm-10">
                                @if(old('nomorSurat'))
                                    <input type="text" class="form-control" name="nomorSurat"
                                           placeholder="No SIMARU"
                                           required autocomplete="off" value="{{old('nomorSurat')}}">
                                @else
                                    <input type="text" class="form-control" name="nomorSurat"
                                           placeholder="No SIMARU"
                                           required autocomplete="off">
                                @endif
                                <small>Nomor Surat+Tahun Surat ex: 1232017</small>
                            </div>
                        </div>
                    </div>


                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-right">Cari</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>
@endsection
