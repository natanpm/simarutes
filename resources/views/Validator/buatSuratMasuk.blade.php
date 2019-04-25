@extends('Validator.Layouts.rootPage')

@section('extraStyleSheet')
    <link rel="stylesheet" href="{{url('css/chosen.min.css')}}">
    <link rel="stylesheet" href="{{url('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
@endsection

@section('content-header')
    <h1>Buat SIMARU
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
    <form action="{{route('post-validatorBuatSuratMasuk')}}" role="form" method="POST"
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
                            <input type="text"
                                   class="form-control"
                                   name="kepada"
                                   placeholder="Instansi PIC MITRA" required autocomplete="off"
                                   value="{{old('kepada')}}"
                            >
                        </div>
                        <div class="form-group">
                            <label>Jumlah Lampiran</label>
                            <input type="number"
                                   class="form-control"
                                   name="jumlahLampiran"
                                   id="jumlahLampiran"
                                   placeholder="Minimal 1 lembar | Maksimal 20 lembar" required autocomplete="off"
                                   value="{{old('jumlahLampiran')}}"
                            >
                        </div>
                        <div class="form-group">
                            <label>Nama Lampiran</label>
                            <input type="text"
                                   class="form-control"
                                   name="namaLampiran"
                                   placeholder="Nama Lampiran" required autocomplete="off"
                                   value="{{old('namaLampiran')}}"
                            >
                        </div>
                        <div class="form-group">
                            <label>Perihal</label>
                            <input type="text"
                                   class="form-control"
                                   name="perihal"
                                   placeholder="Surat Izin Masuk Dan Ijin Kerja Untuk ..." required autocomplete="off"
                                   value="{{old('perihal')}}"
                            >
                        </div>
                        <div class="form-group">
                            <label>Surat Dinas</label>
                            <input type="text" class="form-control" name="suratDinas"
                                   placeholder="NDE MGR HR AND CDC SURABAYA SELATAN NOMOR" required autocomplete="off"
                                   value="{{old('suratDinas')}}"
                            >
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
                                        <option value="{{$lokasi->id}}">{{$lokasi->lokasi}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kegiatan</label>
                            <input type="text"
                                   class="form-control"
                                   name="kegiatan"
                                   placeholder="Preventive Maintenance / Troubleshoot Gangguan" required autocomplete="off"
                                   value="{{old('kegiatan')}}"
                            >
                        </div>
                        <div class="form-group">
                            <label>Keterangan Tambahan</label>
                            <input type="text"
                                   class="form-control"
                                   name="keterangan"
                                   placeholder="Keterangan Khusus Untuk SIMARU" autocomplete="off"
                                   value="{{old('keterangan')}}"
                            >
                        </div>
                        <div class="form-group">
                            <label>Waktu dan Tanggal</label>
                            <input type="text" class="form-control" name="waktuDanTanggal" id="reservationtime"
                                   required
                                   value="{{old('waktuDanTanggal')}}"
                            >
                        </div>
                        <div class="form-group">
                            <label>Lampiran</label>
                            <input type="file"
                                   name="lampiran"
                                   required
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
                                    <select class="form-control" id="kategori" name="kategori" required>
                                        <option value="umum">Umum</option>
                                        <option value="telkomAkses">Telkom Akses</option>
                                        <option value="sigma">SIGMA</option>
                                        <option value="tkmNetra">TKM NETRA</option>
                                    </select>
                                </div>
                                <div id="formUmum">
                                    <div class="form-group">
                                        <label>Jumlah Nama</label>
                                        <div class="row" id="formTambah">
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <input type="number" class="form-control"
                                                           placeholder="0" id="jumlah" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <button type="button" class="btn btn-block btn-success" id="addButton">Tambah
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="tambah">

                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-block btn-danger" id="removeButton">Hapus
                                            semua
                                            Form nama
                                        </button>
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
                                                    <option title="" value="{{$unitTa->id}}">{{$unitTa->namaUnit}}</option>
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
                                                    <option title=""
                                                            value="{{$unitSigma->id}}">{{$unitSigma->namaUnit}}</option>
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
                                                @foreach($picTkmNetras as $picTkmNetra)
                                                    @foreach(old('unitTkmNetra') as $pic)
                                                        @if($pic == $picTkmNetra->id)
                                                            <option value="{{$picTkmNetra->id}}" selected>
                                                                {{$picTkmNetra->nama}}
                                                            </option>
                                                            <?php $ketemu = true?>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                    @if(!$ketemu)
                                                        <option value="{{$picTkmNetra->id}}">
                                                            {{$picTkmNetra->nama}}
                                                        </option>
                                                    @endif
                                                    <?php $ketemu = false?>
                                                @endforeach
                                            @else
                                                @foreach($picTkmNetras as $picTkmNetra)
                                                    <option title="" value="{{$picTkmNetra->id}}">{{$picTkmNetra->nama}}
                                                    </option>
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
                                            data-placeholder="Masukkan Nama-Nama PIC Telkom" name="picTelkom[]" multiple required>
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
                                                <option title="" value="{{$picTelkom->id}}">{{$picTelkom->nama}}
                                                    ({{$picTelkom->unit}}) [{{$jmlSurat[$index]}}]
                                                </option>
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
                                <h3 class="box-title">Forward PIC Telkom</h3>

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
                                            data-placeholder="Masukan Nama" name="forward[]" multiple>
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
                                            @foreach($picTelkoms as $index => $picTelkom)
                                                <option title="" value="{{$picTelkom->id}}">{{$picTelkom->nama}}
                                                    ({{$picTelkom->unit}})
                                                </option>
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
                <a href="{{route('validator-home')}}">
                    <button type="button" class="btn btn-block btn-warning" id="kembali">Kembali
                    </button>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-block btn-success" id="submit">Buat Form
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

            var temp = 0;

            $('#formUmum').hide();
            $('#formTelkomAkses').hide();
            $('#formSigma').hide();
            $('#formTkmNetra').hide();

            $("#kategori").prop("selectedIndex", -1);
            $("#picMitra").prop("selectedIndex", -1);

            $("#kategori").on('change', function () {
                $('#formUmum').hide('slow');
                $('#formTelkomAkses').hide('slow');
                $('#formSigma').hide('slow');
                $('#formTkmNetra').hide('slow');
                var selected = $(this).val();
                if (selected == 'umum') {
                    $('#formUmum').show('slow');
                } else if (selected == 'telkomAkses') {
                    $('#formTelkomAkses').show('slow');
                } else if (selected == 'sigma') {
                    $('#formSigma').show('show');
                } else if(selected == 'tkmNetra'){
                    $('#formTkmNetra').show('show');
                }
            });

            $('#removeButton').click('slow', function () {
                if (confirm('Hapus form nama ?')) {
                    $('.formInput').hide('slow', function () {
                        $(this).remove();
                    });
                    $('.labelFormInput').hide('slow', function () {
                        $(this).remove();
                    });
                    temp = 0;
                }
            });

            $('#addButton').on('click', function () {
                    var jumlah = $('#jumlah').val();
                    if (/^[0-9]*$/.test(jumlah) == false || jumlah == '') {
                        alert('Masukan hanya Angka dan Angka Positif');
                    } else {
                        var jumlah = $('#jumlah').val()
                        for (i = 0; i < jumlah; i++) {
                            $('#tambah')
                                .append('<div class="form-group">\n' +
                                    '<label class="labelFormInput">No Identitas ' + ( (temp + i) + 1) + '</label>\n' +
                                    '<input type="text" class="form-control formInput " name="inputId[]" placeholder="No KTP/Identitas" autocomplete="off" required id="input' + (temp + i) + '">\n' +
                                    '</div>' +
                                    '<div class="form-group">\n' +
                                    '<label class="labelFormInput">Nama ' + ( (temp + i) + 1) + '</label>\n' +
                                    '<input type="text" class="form-control formInput " name="inputNama[]" placeholder="Nama" autocomplete="off" required id="input' + (temp + i) + '">\n' +
                                    '</div>' +
                                    '<div class="form-group">\n' +
                                    '<label class="labelFormInput">Kontak ' + ( (temp + i) + 1) + '</label>\n' +
                                    '<input type="text" class="form-control formInput " name="inputKontak[] " placeholder="08XX-XXXX-XXXX" autocomplete="off" id="input' + (temp + i) + '">\n' +
                                    '</div>'
                                )
                        }
                        temp += parseInt(jumlah);
                    }
                }
            );

            $(".chosen-select").chosen({
                no_results_text: "Tidak Ditemukan!",
                width: "100%"
            });

            $(".chosen-select-picTelkom").chosen({
                no_results_text: "Tidak Ditemukan!",
                width: "100%",
            });

            $(".chosen-select-tkmNetra").chosen({
                no_results_text: "Tidak Ditemukan!",
                width: "100%"
            });

            $(".chosen-select-forward").chosen({
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

            $('#kembali').on('click', function () {
                return confirm('Kembali ke halaman utama?')
            });

            $('#submit').on('click', function () {
                var jumlah = $('#jumlahLampiran').val();
                if (/^[0-9]*$/.test(jumlah) == false || jumlah == '') {
                    alert('Jumlah lampiran tidak boleh kosong dan harus berupa angka positif!');
                    return false;
                }
                return confirm('Apa form SIMARU sudah terisi dengan benar?')
            });

        });
    </script>
@endsection