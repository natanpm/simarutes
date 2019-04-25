@extends('Validator.Layouts.rootPage')

@section('content-header')
    <h1>Edit Unit Mitratel
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
    <div class="row">
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Form Edit Unit Mitratel</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <form action="{{route('post-validatorEditUnitTelkomAkses',['id' => $unit->id])}}" class="form-horizontal"
                      method="POST">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama Unit</label>

                            <div class="col-sm-10">
                                @if(old('namaUnit'))
                                    <input type="text" class="form-control" name="namaUnit" placeholder="Nama Perusahaan"
                                           required
                                           value="{{old('namaUnit')}}" autocomplete="off">
                                @else
                                    <input type="text" class="form-control" name="namaUnit" placeholder="Nama Perusahaan"
                                           required
                                           value="{{$unit->namaUnit}}" autocomplete="off">
                                @endif
                                    <small>Karaktek Minimal 1 dan Maksimal 30</small>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-right" id="submit">Edit</button>
                        <a href="{{route('get-validatorLihatUnitTelkomAkses')}}">
                            <button type="button" class="btn btn-warning pull-right" id="kembali" style="margin-right: 10px">Batal
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

            $(".taDropDown").chosen({
                no_results_text: "Tidak Ditemukan!",
                width: "100%"
            });

            $('#kembali').on('click', function () {
                return confirm('Kembali ke halaman sebelumnya? Data yang diinputkan akan dibuang')
            });

            $('#submit').on('click', function () {
                return confirm('Simpan perubahan?')
            });
        });
    </script>
@endsection