@extends('PicTelkom.Layouts.rootPage')

@section('extraStyleSheet')
    <link rel="stylesheet" href="{{url('css/chosen.min.css')}}">
    <link rel="stylesheet" href="{{url('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
@endsection

@section('content-header')
    <h1>Edit Surat Keluar Barang
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('picTelkom-home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
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

      <form action="{{route('post-picTelkomeditSuratKeluar', ['id' => $surat->id])}}" role="form" method="POST"
          enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Surat Keluar Barang</h3>

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
                                       placeholder="Penerima / Pembawa Barang" required autocomplete="off"
                                       value="{{old('kepada')}}"
                                >
                            @else
                                <input type="text"
                                       class="form-control"
                                       name="kepada"
                                       placeholder="Penerima / Pembawa Barang" required autocomplete="off"
                                       value="{{$surat->kepada}}"
                                >
                            @endif
                        </div>
                        <div class="form-group">
                            <label>NIK</label>
                             @if(old('nik'))
                            <input type="text"
                                   class="form-control"
                                   name="nik"
                                   placeholder="NIK" required autocomplete="off"
                                   value="{{old('nik')}}"
                            >
                             @else

                              <input type="text"
                                   class="form-control"
                                   name="nik"
                                   placeholder="NIK" required autocomplete="off"
                                   value="{{$surat->nik}}"
                            >
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Perusahaan</label>
                            @if(old('perusahaan'))
                            <input type="text"
                                   class="form-control"
                                   name="perusahaan"
                                   placeholder="Divisi / Nama Perusahaan" required autocomplete="off"
                                   value="{{old('perusahaan')}}"
                            >
                             @else
                             <input type="text"
                                   class="form-control"
                                   name="perusahaan"
                                   placeholder="Divisi / Nama Perusahaan" required autocomplete="off"
                                   value="{{$surat->perusahaan}}">
                                @endif
                        </div>
                        <div class="form-group">

                            <label>Jabatan</label>
                              @if(old('jabatan'))
                            <input type="text"
                                   class="form-control"
                                   name="jabatan"
                                   placeholder="Engineer / Asman OM IP Network " required autocomplete="off"
                                   value="{{old('jabatan')}}"
                            >
                            @else
                             <input type="text"
                                   class="form-control"
                                   name="jabatan"
                                   placeholder="Engineer / Asman OM IP Network " required autocomplete="off"
                                   value="{{$surat->jabatan}}"
                            >
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Perihal</label>
                            @if(old('perihal'))
                            <input type="text"
                                   class="form-control"
                                   name="perihal"
                                   placeholder="Surat Izin Membawa Keluar Barang Untuk ..." required autocomplete="off"
                                   value="{{old('perihal')}}"
                            >
                            @else
                            <input type="text"
                                   class="form-control"
                                   name="perihal"
                                   placeholder="Surat Izin Membawa Keluar Barang Untuk ..." required autocomplete="off"
                                   value="{{$surat->perihal}}"
                            >
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Lokasi</label>
                            <select class="form-control" name="lokasi[]"
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
                                        @foreach($surat->lokasiSuratKeluar as $loc)
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
                            <label>Pic Telkom / Yang Menyerahkan</label>
                            <select class="form-control chosen-select" name="picTelkom[]"
                                    style="border-radius: 10px" required>
                                <option value="">-Pilih Pic Telkom-</option> 
                                <?php $ketemu = false?>
                                @if(old('picTelkom'))
                                    @foreach($picTelkoms as $picTelkom)
                                        @foreach(old('nama') as $pic)
                                            @if($pic == $picTelkom->id)
                                                <option value="{{$picTelkom->id}}" selected>{{$picTelkom->nama}}</option>
                                                <?php $ketemu = true?>
                                                @break
                                            @endif
                                        @endforeach
                                        @if(!$ketemu)
                                            <option value="{{$picTelkom->id}}">{{$picTelkom->nama}}</option>
                                        @endif
                                        <?php $ketemu = false?>
                                    @endforeach
                                @else
                                     @foreach($picTelkoms as $picTelkom)
                                       @foreach($surat->waspangSuratKeluar as $pic)
                                            @if($pic->idPicTelkom == $picTelkom->id)
                                                <option value="{{$picTelkom->id}}" selected>{{$picTelkom->nama}}</option>
                                                <?php $ketemu = true?>
                                                @break
                                            @endif
                                        @endforeach
                                        @if(!$ketemu)
                                            <option value="{{$picTelkom->id}}">{{$picTelkom->nama}}</option>
                                        @endif
                                        <?php $ketemu = false?>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                         <div class="form-group">

                            <label>Tanggal</label>
                             @if(old('tanggal'))
                            <input type="date" class="form-control" name="tanggal" 
                                   required
                                   value="{{old('tanggal')}}"


                            >
                            @else <input type="date" class="form-control" name="tanggal" 
                                   required 
                                   value="{{$surat->tanggal}}">
                            @endif
                        </div>




                        <div class="form-group">
                            <label>Keterangan Tambahan</label>
                             @if(old('keterangan'))
                            <input type="text"
                                   class="form-control"
                                   name="keterangan"
                                   placeholder="Keterangan Khusus Untuk Surat Keluar Barang" autocomplete="off"
                                   value="{{old('keterangan')}}">
                            @else
                             <input type="text"
                                   class="form-control"
                                   name="keterangan"
                                   placeholder="Keterangan Khusus Untuk Surat Keluar Barang" autocomplete="off"
                                    value="{{$surat->keterangan}}">
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
                                       value="{{($surat->lampiransuratkeluar ? $surat->lampiransuratkeluar->namaFile : "Lampiran Telah Dihapus!")}}"
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
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Rincian Barang Keluar</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Jumlah Barang Keluar</label>
                                <div class="row" id="formTambah">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            @if(old('jumlahBarang'))
                                            <input type="number" 
                                                   class="form-control"
                                                   name="jumlahBarang"
                                                   placeholder="0" 
                                                   id="jumlah" 
                                                   value="{{old('jumlahBarang')}}"
                                                   autocomplete="off">

                                            @else

                                             <input type="number" 
                                                   class="form-control"
                                                   name="jumlahBarang"
                                                   placeholder="0" 
                                                   id="jumlah" 
                                                   
                                                   autocomplete="off"

                                                value="{{$surat->jumlahBarang}}">
                                                @endif

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                            <button type="button" class="btn btn-block btn-success" id="addButton">
                                                    Tambah
                                            </button>
                                    </div>
                            
                               
                                <div class="form-group" id="tambah">
                                
                                </div>
                                <div class="form-group col-md-12">
                                    <button type="button" class="btn btn-danger center-block" id="removeButton">Hapus
                                        Semua List Barang
                                    </button>
                                </div>
                    </div>
                </div>
            </div>
       

    </form>

            
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-12">
                <a href="{{route('picTelkom-home')}}">
                    <button type="button" class="btn btn-block btn-warning" id="kembali">Kembali
                    </button>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-block btn-success" id="submit">Update Form
                </button>
            </div>
        </div>
    

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

            var temp = 0;


            $('#removeButton').click('slow', function () {
                if (confirm('Hapus form barang ?')) {
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
                        alert('Jumlah Barang harus berupa angka positif!');
                    } else {
                        var jumlah = $('#jumlah').val()
                        for (i = 0; i < jumlah; i++) {
                            $('#tambah')
                                .append(
                                    '<div class="form-row">\n' +
                                    '<div class="form-group col-md-4">\n' +
                                    '<label class="labelFormInput">Nama Barang ' + ( (temp + i) + 1) + '</label>\n' +
                                    '<input type="text" class="form-control formInput " name="inputNamaBarang[]" placeholder="Modul LPUF 240" autocomplete="off" required id="inputNamaBarang' + (temp + i) + '">\n' +
                                    '</div>' +
                                    '<div class="form-group col-md-4">\n' +
                                    '<label class="labelFormInput">Merek ' + ( (temp + i) + 1) + '</label>\n' +
                                    '<input type="text" class="form-control formInput " name="inputMerek[]" placeholder="Huawei / Juniper / ZTE" autocomplete="off" required id="inputMerek' + (temp + i) + '">\n' +
                                    '</div>' +
                                    '<div class="form-group col-md-4">\n' +
                                    '<label class="labelFormInput">Serial Number ' + ( (temp + i) + 1) + '</label>\n' +
                                    '<input type="text" class="form-control formInput " name="inputSerialNumber[] " placeholder="21060xxxxxxxxxxx" autocomplete="off" id="inputSerialNumber' + (temp + i) + '">\n' +
                                    '</div>' +
                                    '</div>' 
                                    
                                )
                        }
                        temp += parseInt(jumlah);
                    }
                }
            );


            $('#kembali').on('click', function () {
                return confirm('Kembali ke halaman utama?')
            });

            $('#submit').on('click', function () {
                var jumlah = $('#jumlah').val();
                if (/^[0-9]*$/.test(jumlah) == false || jumlah == '') {
                    alert('Jumlah Barang tidak boleh kosong dan harus berupa angka positif!');
                    return false;
                }
                return confirm('Apa form Surat Keluar Barang sudah terisi dengan benar?')
            });

        });
    </script>
@endsection