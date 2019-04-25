@extends('Security.Layouts.rootPage')

@section('content-header')
    <h1>Pencarian Berdasarkan Nama
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('security-home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
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
                            @if(old('nama'))
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama"
                                           placeholder="Nama Depan PIC Mitra" required autocomplete="off" value="{{old('nama')}}">
                                </div>
                            @else
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama"
                                           placeholder="Nama Depan PIC Mitra" required autocomplete="off">
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-right">Cari</button>
                        <a href="{{route('security-home')}}">
                            <button type="button" class="btn btn-success pull-right" style="margin-right: 5px;">
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