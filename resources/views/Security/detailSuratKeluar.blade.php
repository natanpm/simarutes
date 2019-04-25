@extends('Security.Layouts.rootPage')

@section('extraStyleSheet')
    <style>
        .identintasSurat {
            width: 80px;
        }

        .badanSuratNumber {
            display: inline-block;
            width: 15px;
        }

        .listDetailPekerjaan {
            padding: 0% 0% 0% 6%;
            width: 180px;
        }

        .listDetailPeraturan {
            padding: 0% 0% 0% 10%;
            margin: 0px;
        }

        .tabListDetail {
            display: inline-block;
            width: 150px;
        }

        .tabListPetugas {
            padding-left: 24%;
        }
    </style>
@endsection


@section('content-header')
    <h1>
        Surat
        <small><b>Tel. {{$angka}}/SIMARU/SBS/{{$tahun}}</b></small>
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
    <section class="invoice">
        <div class="row">
            <div class="col-md-12 table-responsive">
                <h4>
                    <div class="pull-right">
                        <img src="{{url('img/TelkomAsset/logoSurat.png')}}" alt="TelkomLogo">
                    </div>
 
          <h1 style="text-align: center;">
                    SURAT KELUAR BARANG
                    </h1>
                   
                 </h4>
                <hr style="margin: 4% 0px 0% 0px;border: 1px solid #000;">
                  <p style="text-align:center; padding-top: 0px;padding-right: 120px">
        Surat
        <b>Tel. {{$angka}}/SIMARU/SBS/{{$tahun}}<br><br></b>
    </p>
            </div>
        </div>
        <div class="row invoice-info">
            <div class="col-md-12 table-responsive">
                
        
                    <tbody>
                     <tr>
                        <td style="vertical-align: top;" class="identintasSurat"> Kepada Yth.</td>
                     
                    
                    </tr>
                      <tr>
                        
                          <td><strong><br>Bagian Keamanan
                            
                                        @foreach($arrayL1 as $loc)
                                            {{$loc}}
                                        @endforeach
                                        @foreach($arrayL2 as $loc)
                                           {{$loc}}
                                        @endforeach
                                        @foreach($arrayL3 as $loc)
                                         {{$loc}}                                        
                                         @endforeach
                             </strong>   
                          </td>
              
                    
                   

                    <tr>
                        <td style="vertical-align: top;" class="identintasSurat"> <br><br>Surat ini adalah bukti resmi yang diberikan kepada</td>
                        <td style="vertical-align: top"> :</td>
                    
                    </tr>

                    <table>
                    <tr>
                        <td style="vertical-align: top;" class="identintasSurat"> Nama</td>
                        <td style="vertical-align: top"> :</td>
                        <td style="padding-left: 5px"> Sdr. {{strtoupper($surat->kepada)}}</td>
                    </tr>
                   
                    <tr>
                        <td style="vertical-align: top;" class="identintasSurat"> Jabatan</td>
                        <td style="vertical-align: top"> :</td>
                        <td style="padding-left: 5px"> {{$surat->jabatan}}</td>
                    </tr>
                    </table>

                     <tr>
                        <td style="vertical-align: top;" class="identintasSurat"> <br>Yang akan membawa <strong>KELUAR</strong> barang berupa</td>
                        <td style="vertical-align: top"> :</td>
                    
                    </tr>
                        <table id="table1" class="table table-bordered table-striped">
                            <thead>
                            <tr><br><br>
                                <th style="width: 5%; vertical-align: middle">No</th>

                                <th style="vertical-align: middle">Nama Barang</th>
                                <th style="vertical-align: middle">Merek Barang</th>
                                <th style="vertical-align: middle">Serial Number</th>

                            </tr>
                            </thead>
                       
                            <?php
                            $i = 0;
                            ?>
                            @foreach($surat->barangKeluar as $brg)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$brg->namaBarang}}</td>
                                    <td>{{$brg->merek}}</td>
                                    <td>{{$brg->serialNumber}}</td>
        
                                </tr>
                            @endforeach
                    
                        </table>

            <table>
            
              <tr>
                <td style="vertical-align: top;" class="identintasSurat">Tanggal</td>
                <td style="vertical-align: top"> :</td>
                <td style="padding-left: 5px"> <strong>{{$tanggal}}</strong></td>
             </tr>  
            </table>
        </div>
    </tbody>

</div>

                   <table>
                    <tbody>
                    <tr>
                        
                        <td style="text-align: justify"> <br>Barang-barang tersebut dikeluarkan dari <strong>
                            
                                        @foreach($arrayL1 as $loc)
                                            {{$loc}}
                                        @endforeach
                           
     
                                        @foreach($arrayL2 as $loc)
                                           {{$loc}}
                                        @endforeach
                  
                                        @foreach($arrayL3 as $loc)
                                         {{$loc}}                                        
                                         @endforeach
                          </strong>  untuk keperluan dinas. Demikian disampaikan, mohon yang bersangkutan dapat diberikan izinnya. Terimakasih atas perhatian dan kerjasamanya <br><br><br><br>
                        </td>
                    </tr>
                    </tbody>
                </table>





        <div class="row">
            <div class="col-md-12 table-responsive">
                    <div class="pull-right">
                           <table>
                    <tbody>
                 
                    <tr>
                        <td style="vertical-align: top"><span class="badanSuratNumber"></span></td>
                        <td style="text-align: left; padding-right: 20px;"><br><br>Mengetahui & Yang Menyerahkan</td>
                    </tr>

                     <tr>
                        <td style="vertical-align: top"><span class="badanSuratNumber"></span></td>
                        <td style="text-align: left"><u>UNIT @foreach($arrayZ1 as $pic)
                                            {{$pic}}
                                        @endforeach
                           
     
                                        @foreach($arrayZ2 as $pic)
                                           {{$pic}}
                                        @endforeach
                  
                                        @foreach($arrayZ3 as $pic)
                                         {{$pic}}                                        
                                         @endforeach</u><br><br><br><br><br></td>
                    </tr>
                   
                    <tr>
                        <td style="vertical-align: top"><span class="badanSuratNumber"></span></td>
                        <td style="text-align: left"><u>  @foreach($arrayN1 as $pic)
                                            {{$pic}}
                                        @endforeach
                           
     
                                        @foreach($arrayN2 as $pic)
                                           {{$pic}}
                                        @endforeach
                  
                                        @foreach($arrayN3 as $pic)
                                         {{$pic}}                                        
                                         @endforeach</u></td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top"><span class="badanSuratNumber"></span></td>
                        <td style="text-align: left">NIK : @foreach($arrayP1 as $pic)
                                            {{$pic}}
                                        @endforeach
                           
     
                                        @foreach($arrayP2 as $pic)
                                           {{$pic}}
                                        @endforeach
                  
                                        @foreach($arrayP3 as $pic)
                                         {{$pic}}                                        
                                         @endforeach</td>
                    </tr>
                    </tbody>
                </table>
             </div>
 
                <table>
                    <tbody>
                    <tr>
                        <td style="vertical-align: top"><span class="badanSuratNumber"></span></td>
                        <td style="text-align: left"><br><br>Yang Membawa<br><br><br><br><br><br></td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top"><span class="badanSuratNumber"></span></td>
                        <td style="text-align: left"><u> {{strtoupper($surat->kepada)}}</u></td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top"><span class="badanSuratNumber"></span></td>
                        <td style="text-align: left"> NIK : {{strtoupper($surat->nik)}}</td>
                    </tr>
                    </tbody>
                </table>
             
            
            </div>
        </div>



<br><br><br><br>

             
               
           
       
           
        <div class="row no-print">
            <div class="col-xs-12">
                 <a target="_blank" href="{{route('get-securityCetakSuratKeluar',['id' => $surat->id])}}">
                    <button type="button" class="btn btn-primary pull-right" style="margin:3px 5px 3px 0px;">
                        <i class="fa fa-print"></i> Cetak Surat
                    </button>
                </a>
                <a href="{{url()->previous()}}">
                    <button type="button" class="btn btn-success pull-right" style="margin:3px 5px 3px 0px;">
                      <i class="fa fa-back"></i> Kembali
                    </button>
                </a>
            </div>
        </div>
    </section>
@endsection