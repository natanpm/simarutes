@extends('Security.Layouts.rootPage')

@section('extraStyleSheet')
    <link rel="stylesheet" href="{{url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content-header')
    <h1>Daftar Pencarian Nama
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('security-home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if(session('status'))
                <div class="alert alert-{{session('status')}}">
                    {{session('message')}}
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Data Nama</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body table-responsive">
                    <table id="table1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="vertical-align: middle">SIMARU</th>
                            <th style="vertical-align: middle">No ID</th>
                            <th style="vertical-align: middle">Nama</th>
                            <th style="vertical-align: middle">Perusahaan</th>
                            <th style="vertical-align: middle">Unit Perusahaan</th>
                            <th style="vertical-align: middle">Keterangan</th>
                            <th style="vertical-align: middle">PIC Telkom</th>
                            <th style="vertical-align: middle">Waktu Kerja</th>
                            <th style="vertical-align: middle">NDA</th>
                            <th style="width: 12%; vertical-align: middle;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($hasil as $index => $petugas)
                            <tr>
                                <td>{{$petugas->suratMasuk->nomorSurat}}</td>
                                <td>{{$petugas->picMitra->nik}}</td>
                                <td>{{$petugas->picMitra->nama}}</td>
                                <td>{{($petugas->picMitra->idPerusahaan == 1 ? $petugas->picMitra->keterangan : $petugas->picMitra->perusahaan->namaPerusahaan)}}</td>
                                <td>{{($petugas->picMitra->idPerusahaan == 1 ? $petugas->picMitra->keterangan : $petugas->picMitra->unitPerusahaan->namaUnit)}}</td>
                                <td>{{$petugas->suratMasuk->keterangan}}</td>
                                <td>
                                    @foreach($petugas->suratMasuk->waspang as $picTelkom)
                                        <strong>- </strong>{{$picTelkom->picTelkom->nama}}<br>
                                    @endforeach
                                </td>
                                <td>{{$petugas->suratMasuk->pekerjaan->jamMasuk}}
                                    <br>{{$petugas->suratMasuk->pekerjaan->jamKeluar}} </td>
                                <td>
                                    {{$arrayStatusNda[$index]}}
                                </td>
                                <td>
                                  
                                    <div class="row" style="padding-bottom: 5px">
                                        <div class="col-xs-6" style="padding: 0px 9px 0px 10px">
                                            <a href="{{route('get-securityBeriIjinMasuk',['id' => $petugas->id])}}">
                                                <button type="button"
                                                        class="btn btn-success pull-right btn-block btn-sm validasi"
                                                        value="{{$petugas->picMitra->nama}}"
                                                        data-toogle="tooltip" data-placement="bottom"  title="Ijinkan Masuk">
                                                    <i class="fa fa-sign-in"></i>
                                                </button>
                                            </a>
                                        </div>
                                        <div class="col-xs-6 " style="padding: 0px 12px 0px 7px">
                                            <a href="{{route('get-securityTambahkanNda',['id' => $petugas->id])}}">
                                                <button type="button"
                                                        class="btn btn-warning pull-right btn-block btn-sm nda"
                                                        value="{{$petugas->picMitra->nama}}"
                                                        data-toogle="tooltip" data-placement="bottom"  title="Aktifkan NDA">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4" style="padding: 0px 4px 0px 10px">
                                            <a href="{{route('get-securityDetailSurat',['id' => $petugas->suratMasuk->id])}}">
                                                <button type="button"
                                                        class="btn btn-info pull-right btn-block btn-sm"
                                                        data-toogle="tooltip" data-placement="bottom"  title="Tampilkan Surat">
                                                    <i class="fa fa-map-pin"></i>
                                                </button>
                                            </a>
                                        </div>
                                        <div class="col-xs-4" style="padding: 0px 7px 0px 4px">
                                            <a href="{{route('get-securityBatalkanNda',['id' => $petugas->id])}}">
                                                <button type="button"
                                                        class="btn btn-danger pull-right btn-block btn-sm batal"
                                                        value="{{$petugas->picMitra->nama}}"
                                                        data-toogle="tooltip" data-placement="bottom"  title="Batalkan NDA">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </a>
                                        </div>
                                        <div class="col-xs-4" style="padding: 0px 12px 0px 0px">
                                            <a href="{{route('get-securitylihatNda',['path' => ($petugas->statusNda == 1 ? $petugas->nda->pathUri : 'null')])}}">
                                                <button type="button"
                                                        class="btn btn-warning pull-right btn-block btn-sm"
                                                        data-toogle="tooltip" data-placement="bottom"  title="Tampilkan NDA">
                                                    <i class="fa fa-map-pin"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
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
                                <input type="text" class="form-control" name="nomorSurat" placeholder="No SIMARU"
                                       required>
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
    <div class="row">
        <div class="col-xs-12">
            <a href="{{route('security-home')}}">
                <button type="button" class="btn btn-success pull-right" style="margin-right: 5px;">
                    Kembali
                </button>
            </a>
        </div>
    </div>
@endsection

@section('extraJavaScript')
    <!-- DataTables -->
    <script src="{{url('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script>
        $(function () {
            $('#table1').DataTable({
                "order": [[0, "desc"]]
            })
        });

        $('.validasi').on('click', function () {
            return confirm('Beri Izin masuk untuk petugas ' + $(this).val() + ' ?')
        });

        $('.batal').on('click', function () {
            return confirm('Batalkan NDA untuk petugas ' + $(this).val() + ' ?')
        });

        $('.nda').on('click', function () {
            return confirm('Tambahkan NDA untuk petugas ' + $(this).val() + ' ?')
        });
    </script>
@endsection
