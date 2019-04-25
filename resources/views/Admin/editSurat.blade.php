@extends('Admin.Layouts.rootPage')

@section('extraStyleSheet')
    <link rel="stylesheet" href="{{url('css/chosen.min.css')}}">
    <link rel="stylesheet" href="{{url('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
@endsection

@section('content-header')
    <h1>Edit Surat Ijin Masuk
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
    <form action="{{route('post-editSurat', ['id' => $surat->id])}}" role="form" method="POST"
          enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form SIMARU</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Kepada</label>
                            @if(old('kepada'))
                                <input type="text"
                                       class="form-control"
                                       name="kepada"
                                       placeholder="Instansi PIC MITRA" required autocomplete="off"
                                       value="{{old('kepada')}}"
                                >
                            @else
                                <input type="text"
                                       class="form-control"
                                       name="kepada"
                                       placeholder="Instansi PIC MITRA" required autocomplete="off"
                                       value="{{$surat->kepada}}"
                                >
                            @endif

                        </div>
                        <div class="form-group">
                            <label>Jumlah Lampiran</label>
                            @if(old('jumlahLampiran'))
                                <input type="number"
                                       class="form-control"
                                       name="jumlahLampiran"
                                       id="jumlahLampiran"
                                       placeholder="0" required autocomplete="off"
                                       value="{{old('jumlahLampiran')}}"
                                >
                            @else
                                <input type="number"
                                       class="form-control"
                                       name="jumlahLampiran"
                                       id="jumlahLampiran"
                                       placeholder="0" required autocomplete="off"
                                       value="{{$surat->jumlahLampiran}}"
                                >
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Nama Lampiran</label>
                            @if(old('namaLampiran'))
                                <input type="text"
                                       class="form-control"
                                       name="namaLampiran"
                                       placeholder="Nama Lampiran" required
                                       autocomplete="off"
                                       value="{{old('namaLampiran')}}"
                                >
                            @else
                                <input type="text"
                                       class="form-control"
                                       name="namaLampiran"
                                       placeholder="Nama Lampiran" required
                                       autocomplete="off"
                                       value="{{($surat->lampiran ? $surat->lampiran->namaFile : "Lampiran Telah Dihapus!")}}"
                                >
                            @endif

                        </div>
                        <div class="form-group">
                            <label>Perihal</label>
                            @if(old('perihal'))
                                <input type="text"
                                       class="form-control"
                                       name="perihal"
                                       placeholder="Surat Izin Masuk Dan Ijin Kerja Untuk ..." required
                                       autocomplete="off"
                                       value="{{old('perihal')}}"
                                >
                            @else
                                <input type="text"
                                       class="form-control"
                                       name="perihal"
                                       placeholder="Surat Izin Masuk Dan Ijin Kerja Untuk ..." required
                                       autocomplete="off"
                                       value="{{$surat->perihal}}"
                                >
                            @endif

                        </div>
                        <div class="form-group">
                            <label>Surat Dinas</label>
                            @if(old('suratDinas'))
                                <input type="text" class="form-control" name="suratDinas"
                                       placeholder="NDE MGR HR AND CDC SURABAYA SELATAN NOMOR" required autocomplete="off"
                                       value="{{old('suratDinas')}}"
                                >
                            @else
                                <input type="text" class="form-control" name="suratDinas"
                                       placeholder="NDE MGR HR AND CDC SURABAYA SELATAN NOMOR" required autocomplete="off"
                                       value="{{$surat->suratDinas}}"
                                >
                            @endif

                        </div>
                        <div class="form-group">
                            <label>Lokasi</label>
                            <select class="form-control chosen-select" multiple="" name="lokasi[]"
                                    style="border-radius: 10px" required>
                                <?php $ketemu = false?>
                                @if(old('lokasi'))
                                    @foreach($lokasis as $lokasi)
                                        @foreach(old('lokasi') as $loc)
                                            @if($loc == $lokasi->id)
                                                <option value="{{$lokasi->id}}" selected>{{$lokasi->lokasi}}</option>
                                                <?php $ketemu = true?>
                                                @break
                                            @endif
                                        @endforeach
                                        @if(!$ketemu)
                                            <option value="{{$lokasi->id}}">{{$lokasi->lokasi}}</option>
                                        @endif
                                        <?php $ketemu = false?>
                                    @endforeach
                                @else
                                    @foreach($lokasis as $lokasi)
                                        @foreach($surat->pekerjaan->lokasiKerja as $loc)
                                            @if($loc->idLokasi == $lokasi->id)
                                                <option value="{{$lokasi->id}}" selected>{{$lokasi->lokasi}}</option>
                                                <?php $ketemu = true?>
                                                @break
                                            @endif
                                        @endforeach
                                        @if(!$ketemu)
                                            <option value="{{$lokasi->id}}">{{$lokasi->lokasi}}</option>
                                        @endif
                                        <?php $ketemu = false?>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kegiatan</label>
                            @if(old('kegiatan'))
                                <input type="text"
                                       class="form-control"
                                       name="kegiatan"
                                       placeholder="Praktek Kerja Lapangan" required autocomplete="off"
                                       value="{{old('kegiatan')}}"
                                >
                            @else
                                <input type="text"
                                       class="form-control"
                                       name="kegiatan"
                                       placeholder="Praktek Kerja Lapangan" required autocomplete="off"
                                       value="{{$surat->pekerjaan->kegiatan}}"
                                >
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Keterangan Tambahan</label>
                            @if(old('keterangan'))
                                <input type="text"
                                       class="form-control"
                                       name="keterangan"
                                       placeholder="Keterangan Khusus Untuk SIMARU" autocomplete="off"
                                       value="{{old('keterangan')}}"
                                >
                            @else
                                <input type="text"
                                       class="form-control"
                                       name="keterangan"
                                       placeholder="Keterangan Khusus Untuk SIMARU" autocomplete="off"
                                       value="{{$surat->keterangan}}"
                                >
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Waktu dan Tanggal</label>
                            @if(old('waktuDanTanggal'))
                                <input type="text" class="form-control" name="waktuDanTanggal" id="reservationtime"
                                       required
                                       value="{{old('waktuDanTanggal')}}"
                                >
                            @else
                                <input type="text" class="form-control" name="waktuDanTanggal" id="reservationtime"
                                       required
                                       value="{{$surat->pekerjaan->tanggalMulai}} {{$surat->pekerjaan->jamMasuk}} - {{$surat->pekerjaan->tanggalBerakhir}} {{$surat->pekerjaan->jamKeluar}}"
                                >
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Lampiran</label>
                            <select class="form-control" id="lampiranSelect" name="lampiranSelect" required>
                                <option value="lama" selected>Lampiran Lama</option>
                                <option value="baru">Lampiran Baru</option>
                            </select>
                        </div>
                        <div class="form-group" id="lamp">
                            <label>Upload Lampiran</label>
                            <input type="file"
                                   name="lampiran"
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">PIC MITRA</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select class="form-control" id="kategori" name="kategori">
                                        @if($perusahaanPic == 1)
                                            <option value="umum" selected>Umum</option>
                                        @elseif($perusahaanPic == 2)
                                            <option value="telkomAkses" selected>Telkom Akses</option>
                                        @elseif($perusahaanPic == 3)
                                            <option value="sigma" selected>SIGMA</option>
                                        @elseif($perusahaanPic == 4)
                                            <option value="tkmNetra" selected>TKM NETRA</option>
                                        @endif
                                    </select>
                                </div>
                                <div id="formUmum">
                                    <div class="form-group" id="tambah">
                                        <?php $i = 1?>
                                        @if(old('inputNama'))
                                            @foreach(old('inputNama') as $index => $nama)
                                                <div class="form-group">
                                                    <label class="labelFormInput">No Identitas {{$i}}</label>
                                                    <input type="text" class="form-control formInput "
                                                           name="inputId[]" required
                                                           value="{{old('inputId.'.$index)}}"
                                                    >
                                                </div>
                                                <div class="form-group">
                                                    <label class="labelFormInput">Nama {{$i}}</label>
                                                    <input type="text" class="form-control formInput "
                                                           name="inputNama[]" required
                                                           value="{{$nama}}"
                                                    >
                                                </div>
                                                <div class="form-group">
                                                    <label class="labelFormInput">Kontak {{$i++}}</label>
                                                    <input type="number" class="form-control formInput "
                                                           name="inputKontak[]" required
                                                           value="{{old('inputKontak.'.$index)}}"
                                                    >
                                                </div>
                                            @endforeach
                                        @else
                                            @foreach($surat->petugas as $pic)
                                                <div class="form-group">
                                                    <label class="labelFormInput">No Identitas {{$i}}</label>
                                                    <input type="text" class="form-control formInput "
                                                           name="inputId[]" required
                                                           value="{{$pic->picMitra->nik}}"
                                                    >
                                                </div>
                                                <div class="form-group">
                                                    <label class="labelFormInput">Nama {{$i}}</label>
                                                    <input type="text" class="form-control formInput "
                                                           name="inputNama[]" required
                                                           value="{{$pic->picMitra->nama}}"
                                                    >
                                                </div>
                                                <div class="form-group">
                                                    <label class="labelFormInput">Kontak {{$i++}}</label>
                                                    <input type="text" class="form-control formInput "
                                                           name="inputKontak[]" required
                                                           value="{{$pic->picMitra->kontak}}"
                                                    >
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div id="formTelkomAkses">
                                    <div class="form-group">
                                        <label>Unit Petugas Telkom Akses</label>
                                        <select class="form-control chosen-select"
                                                multiple id="unitTa"
                                                name="unitTa[]"
                                                data-placeholder="Nama Unit">
                                            <?php $ketemu = false?>
                                            @if(old('unitTa'))
                                                @foreach($unitTas as $unitTa)
                                                    @foreach(old('unitTa') as $unit)
                                                        @if($unit == $unitTa->id)
                                                            <option value="{{$unitTa->id}}"
                                                                    selected>{{$unitTa->namaUnit}}</option>
                                                            <?php $ketemu = true?>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                    @if(!$ketemu)
                                                        <option value="{{$unitTa->id}}">{{$unitTa->namaUnit}}</option>
                                                    @endif
                                                    <?php $ketemu = false?>
                                                @endforeach
                                            @else
                                                @foreach($unitTas as $unitTa)
                                                    @foreach($unitSurat as $unit)
                                                        @if($unit == $unitTa->id)
                                                            <option value="{{$unitTa->id}}"
                                                                    selected>{{$unitTa->namaUnit}}</option>
                                                            <?php $ketemu = true?>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                    @if(!$ketemu)
                                                        <option value="{{$unitTa->id}}">{{$unitTa->namaUnit}}</option>
                                                    @endif
                                                    <?php $ketemu = false?>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div id="formSigma">
                                    <div class="form-group ">
                                        <label>Unit Petugas SIGMA</label>
                                        <select class="form-control chosen-select"
                                                multiple id="unitSigma"
                                                name="unitSigma[]"
                                                data-placeholder="Nama Unit">
                                            <?php $ketemu = false?>
                                            @if(old('unitSigma'))
                                                @foreach($unitSigmas as $unitSigma)
                                                    @foreach(old('unitSigma') as $unit)
                                                        @if($unit == $unitSigma->id)
                                                            <option value="{{$unitSigma->id}}"
                                                                    selected>{{$unitSigma->namaUnit}}</option>
                                                            <?php $ketemu = true?>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                    @if(!$ketemu)
                                                        <option value="{{$unitSigma->id}}">{{$unitSigma->namaUnit}}</option>
                                                    @endif
                                                    <?php $ketemu = false?>
                                                @endforeach
                                            @else
                                                @foreach($unitSigmas as $unitSigma)
                                                    @foreach($unitSurat as $unit)
                                                        @if($unit == $unitSigma->id)
                                                            <option value="{{$unitSigma->id}}"
                                                                    selected>{{$unitSigma->namaUnit}}</option>
                                                            <?php $ketemu = true?>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                    @if(!$ketemu)
                                                        <option value="{{$unitSigma->id}}">{{$unitSigma->namaUnit}}</option>
                                                    @endif
                                                    <?php $ketemu = false?>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div id="formTkmNetra">
                                    <div class="form-group">
                                        <label>PIC TKM NETRA</label>
                                        <select class="form-control chosen-select-tkmNetra"
                                                data-placeholder="Nama PIC TKM NETRA" name="unitTkmNetra[]" multiple>
                                            <?php $ketemu = false?>
                                            @if(old('unitTkmNetra'))
                                                @foreach($picTkmNetras as $tkmNetra)
                                                    @foreach(old('unitTkmNetra') as $pic)
                                                        @if($pic == $tkmNetra->id)
                                                            <option value="{{$tkmNetra->id}}" selected>
                                                                {{$tkmNetra->nama}}
                                                            </option>
                                                            <?php $ketemu = true?>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                    @if(!$ketemu)
                                                        <option value="{{$tkmNetra->id}}">
                                                            {{$tkmNetra->nama}}
                                                        </option>
                                                    @endif
                                                    <?php $ketemu = false?>
                                                @endforeach
                                            @else
                                                @foreach($picTkmNetras as $tkmNetra)
                                                    @foreach($unitSurat as $pic)
                                                        @if($pic == $tkmNetra->id)
                                                            <option value="{{$tkmNetra->id}}" selected>
                                                                {{$tkmNetra->nama}}
                                                            </option>
                                                            <?php $ketemu = true?>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                    @if(!$ketemu)
                                                        <option value="{{$tkmNetra->id}}">
                                                            {{$tkmNetra->nama}}
                                                        </option>
                                                    @endif
                                                    <?php $ketemu = false?>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">PIC TELKOM</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Nama PIC Telkom</label>
                                    <select class="form-control chosen-select-picTelkom"
                                            data-placeholder="Nama" name="picTelkom[]" multiple required>
                                        <?php $ketemu = false?>
                                        @if(old('picTelkom'))
                                            @foreach($picTelkoms as $index => $picTelkom)
                                                @foreach(old('picTelkom') as $pic)
                                                    @if($pic == $picTelkom->id)
                                                        <option value="{{$picTelkom->id}}" selected>
                                                            {{$picTelkom->nama}}
                                                            ({{$picTelkom->unit}})
                                                            [{{$jmlSurat[$index]}}]
                                                        </option>
                                                        <?php $ketemu = true?>
                                                        @break
                                                    @endif
                                                @endforeach
                                                @if(!$ketemu)
                                                    <option value="{{$picTelkom->id}}">
                                                        {{$picTelkom->nama}}
                                                        ({{$picTelkom->unit}})
                                                        [{{$jmlSurat[$index]}}]
                                                    </option>
                                                @endif
                                                <?php $ketemu = false?>
                                            @endforeach
                                        @else
                                            @foreach($picTelkoms as $index => $picTelkom)
                                                @foreach($surat->waspang as $pic)
                                                    @if($pic->idPicTelkom == $picTelkom->id)
                                                        <option value="{{$picTelkom->id}}" selected>
                                                            {{$picTelkom->nama}}
                                                            ({{$picTelkom->unit}})
                                                            [{{$jmlSurat[$index]}}]
                                                        </option>
                                                        <?php $ketemu = true?>
                                                        @break
                                                    @endif
                                                @endforeach
                                                @if(!$ketemu)
                                                    <option value="{{$picTelkom->id}}">
                                                        {{$picTelkom->nama}}
                                                        ({{$picTelkom->unit}})
                                                        [{{$jmlSurat[$index]}}]
                                                    </option>
                                                @endif
                                                <?php $ketemu = false?>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">Forward PIC TELKOM</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Nama PIC Telkom</label>
                                    <select class="form-control chosen-select-forward"
                                            data-placeholder="Nama" name="forward[]" multiple>
                                        <?php $ketemu = false?>
                                        @if(old('forward'))
                                            @foreach($picTelkoms as $picTelkom)
                                                @foreach(old('forward') as $pic)
                                                    @if($pic == $picTelkom->id)
                                                        <option value="{{$picTelkom->id}}" selected>
                                                            {{$picTelkom->nama}}
                                                            ({{$picTelkom->unit}})
                                                        </option>
                                                        <?php $ketemu = true?>
                                                        @break
                                                    @endif
                                                @endforeach
                                                @if(!$ketemu)
                                                    <option value="{{$picTelkom->id}}">
                                                        {{$picTelkom->nama}}
                                                        ({{$picTelkom->unit}})
                                                    </option>
                                                @endif
                                                <?php $ketemu = false?>
                                            @endforeach
                                        @else
                                            @foreach($picTelkoms as $picTelkom)
                                                @foreach($surat->forward as $pic)
                                                    @if($pic->idPicTelkom == $picTelkom->id)
                                                        <option value="{{$picTelkom->id}}" selected>
                                                            {{$picTelkom->nama}}
                                                            ({{$picTelkom->unit}})
                                                        </option>
                                                        <?php $ketemu = true?>
                                                        @break
                                                    @endif
                                                @endforeach
                                                @if(!$ketemu)
                                                    <option value="{{$picTelkom->id}}">
                                                        {{$picTelkom->nama}}
                                                        ({{$picTelkom->unit}})
                                                    </option>
                                                @endif
                                                <?php $ketemu = false?>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-12">
                <a href="{{route('get-indexLihatSurat')}}">
                    <button type="button" class="btn btn-block btn-warning" id="kembali">Kembali
                    </button>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-block btn-success" id="submit">Edit SIMARU
                </button>
            </div>
        </div>
    </form>




@endsection

@section('extraJavaScript')

    <script src="{{url('js/chosen.jquery.min.js')}}"></script>
    <script src="{{url('bower_components/moment/min/moment.min.js')}}"></script>
    <script src="{{url('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

    <script>
        $(function () {
            $('#lamp').hide();

            $("#lampiranSelect").prop("selectedIndex", 0);

            $("#lampiranSelect").on('change', function () {
                $('#lamp').hide('slow');
                var selected = $(this).val();
                if (selected == 'lama') {
                    $('#lamp').hide('slow');
                } else if (selected == 'baru') {
                    $('#lamp').show('slow');
                }
            });

            $(".chosen-select-picTelkom").chosen({
                no_results_text: "Tidak Ditemukan!",
                width: "100%",
            });

            $(".chosen-select-forward").chosen({
                no_results_text: "Tidak Ditemukan!",
                width: "100%"
            });

            if ($('#kategori').val() == "umum") {
                $('#formTelkomAkses').remove();
                $('#formSigma').remove();
                $('#formTkmNetra').remove();
            } else if ($('#kategori').val() == "telkomAkses") {
                $('#formUmum').remove();
                $('#formSigma').remove();
                $('#formTkmNetra').remove();
            } else if ($('#kategori').val() == "sigma") {
                $('#formTelkomAkses').remove();
                $('#formUmum').remove();
                $('#formTkmNetra').remove();
            } else if ($('#kategori').val() == "tkmNetra") {
                $('#formTelkomAkses').remove();
                $('#formUmum').remove();
                $('#formSigma').remove();
            } else {
                $('#formTelkomAkses').remove();
                $('#formSigma').remove();
                $('#formUmum').remove();
                $('#formTkmNetra').remove();
            }
            ;


            $(".chosen-select").chosen({
                no_results_text: "Tidak Ditemukan!",
                width: "100%"
            });

            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 1,
                locale: {
                    format: 'YYYY-MM-DD HH:mm'
                }
            });
            $(".chosen-select-tkmNetra").chosen({
                no_results_text: "Tidak Ditemukan!",
                width: "100%"
            });

            $('#submit').on('click', function () {
                if ($('#jumlahLampiran').val() < 0) {
                    console.log('asd');
                    alert('Jumlah lampiran harus berangka Positif');
                    return false;
                }
                console.log($('#jumlahLampiran').val());

                return confirm('Simpan perubahan?')
            });

            $('#kembali').on('click', function () {
                var jumlah = $('#jumlahLampiran').val();
                if (/^[0-9]*$/.test(jumlah) == false || jumlah == '') {
                    alert('Jumlah lampiran tidak boleh kosong harus berupa angka positif!');
                    return false;
                }
                return confirm('Kembali ke halaman lihat surat?')
            });
        });
    </script>
@endsection