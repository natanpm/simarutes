@extends('Admin.Layouts.rootPage')

@section('content-header')
    <h1>Upload NDA Petugas
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin-home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    </ol>
@endsection

@section('extraStyleSheet')
    <link rel="stylesheet" href="{{url('css/chosen.min.css')}}">
    <link rel="stylesheet" href="{{url('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
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
                    <h3 class="box-title">Upload NDA Petugas</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>

                <form action="{{route('post-uploadNda',['id' => $pic->id])}}" class="form-horizontal" role="form"
                      method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">NIK / No Identitas</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" disabled
                                       value="{{$pic->nik}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" disabled
                                       value="{{$pic->nama}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Unit Perusahaan</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" disabled
                                       value="{{($pic->idUnitPerusahaan == 1 ? $pic->keterangan : $pic->unitPerusahaan->namaUnit)}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Perusahaan</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" disabled
                                       value="{{($pic->idPerusahaan == 1 ? $pic->keterangan : $pic->perusahaan->namaPerusahaan)}}">
                            </div>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">NDA</label>

                            <div class="col-sm-10">
                                <input type="text"
                                       class="form-control"
                                       disabled
                                       value="{{($pic->statusNda == 1 ? "Memiliki NDA" : "Belum Memiliki NDA")}}"
                                >
                            </div>
                        </div>

                        @if($pic->statusNda == 1)
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Status NDA</label>

                                <div class="col-sm-10">
                                    <input type="text"
                                           class="form-control"
                                           disabled
                                           value="{{($pic->statusNda == 1 ? "Aktif" : "Kadaluarsa")}}{{$pic->nda->path == '-' ? " (Belum Ter-upload)" : " (Ter-upload)"}}"
                                    >
                                </div>
                            </div>

                            

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tanggal Berlaku</label>

                                <div class="col-sm-10">
                                    <input type="text"
                                           class="form-control"
                                           name="berlakuNDA"
                                           id="berlakuNDA"
                                           required autocomplete="off"
                                           value="{{old('berlakuNDA')}}"
                                    >
                                </div>
                            </div>

                                <!-- <div class="col-sm-10">
                                <input type="text" class="form-control" name="tanggal" id="reservation"
                                       required autocomplete="off">
                                <small>Tanggal Awal - Tanggal Akhir</small>


                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tanggal Berakhir</label>

                                <div class="col-sm-10">
                                    <input type="text"
                                           class="form-control"
                                           disabled
                                           value="{{($pic->nda->tanggalBerakhir)}}"
                                    > 
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label class="col-sm-2 control-label">File Upload NDA</label>

                                <div class="col-sm-10">
                                    <input type="file"
                                           name="nda"
                                           required
                                    >
                                    <small>File berupa PDF/JPEG/PNG/JPG dan ukuran maksimal 1Mb</small>
                                </div>
                            </div>
                        @else

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tanggal Berlaku</label>

                                <div class="col-sm-10">
                                    <input type="text"
                                           class="form-control"
                                           name="berlakuNDA"
                                           id="berlakuNDA"
                                           required autocomplete="off"
                                           value="{{old('berlakuNDA')}}"
                                    >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">File Upload NDA</label>

                                <div class="col-sm-10">
                                    <input type="file"
                                           name="nda"
                                           required
                                    >
                                    <small>File berupa PDF/JPEG/PNG/JPG dan ukuran maksimal 2Mb</small>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-right" id="submit">Upload NDA</button>

                        <a href="{{url()->previous()}}">
                            <button type="button" class="btn btn-warning pull-right" style="margin-right: 5px;"
                                    id="kembali">
                                Kembali
                            </button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('extraJavaScript')
    <script src="{{url('bower_components/moment/min/moment.min.js')}}"></script>
    <script src="{{url('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{url('js/chosen.jquery.min.js')}}"></script>

    <script>
        $(function () {
            $('#submit').on('click', function () {
                return confirm('Upload NDA ?')
            });
        });

         $('#berlakuNDA').daterangepicker({
            locale: {
                format: 'YYYY-MM-DD'
            }
        });
    </script>
@endsection