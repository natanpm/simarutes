@extends('SuperValidator.Layouts.rootPage')

@section('content-header')
    <h1>Keterangan Extends
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('supervalidator-home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
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
                    <h3 class="box-title">Keterangan Extends</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box-body">
                                <div class="form-group">
                                    <textarea class="form-control" name="pesan" rows="1" placeholder="Keterangan"
                                              style="margin: 0px -12px 0px 0px; height: 160px;"
                                              disabled>{{$log->pesan}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{url()->previous()}}">
                        <button type="button" class="btn btn-success pull-right" style="margin-right: 5px;">
                            Kembali
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection