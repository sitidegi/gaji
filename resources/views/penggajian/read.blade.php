@extends('layouts.app')

@section('content')
<style type="text/css">
    td,th{
        text-align: center ;
    }
    img{
        border-image-repeat: 3px ;
        border-style: circle ;
    }
</style>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Table Penggajian</div>
                    
                <div class="">
                    <div class="col-md-12">
                        <a href="{{url('penggajian/create')}}" class="btn btn-primary form-control">Tambah Data</a>
                        
                    </div>
                    <table class="table table-striped table-hover table-bordered">
                        
                        <div class="col-md-12">
                        <center>
                            <p><img width="120px" height="100px" src="<?php echo url('asset/image/') ?>/<?php echo $penggajians->tunjangan_pegawaiModel->pegawaiModel->foto; ?>" class="img-circle" alt="Cinque Terre" ></p>

                        <h3>{{$penggajians->tunjangan_pegawaiModel->pegawaiModel->User->name}}</h3>
                        <h4>{{$penggajians->tunjangan_pegawaiModel->pegawaiModel->nip}}</h4>
                        <b>@if($penggajians->tanggal_pengambilan == ""&&$penggajians->status_pengambilan == "0")
                            Gaji Belum Diambil
                        @elseif($penggajians->tanggal_pengambilan == ""||$penggajians->status_pengambilan == "0")
                            Gaji Belum Diambil
                        @else
                            Gaji Sudah Diambil Pada {{$penggajians->tanggal_pengambilan}}
                        @endif</b>
                        <h5>Gaji Lembur Sebesar Rp.{{$penggajians->jumlah_uang_lembur}} ,Gaji Pokok Sebesar Rp.{{$penggajians->gaji_pokok}} ,Mendapat Tunjangan Sebesar Rp.{{$penggajians->tunjangan_pegawaiModel->tunjanganModel->besaran_uang}} ,Jadi Total Gaji Rp.{{$penggajians->total_gaji}}



                        </h5>
                        
                                <a class="btn btn-primary col-md-12" href="{{url('penggajian')}}">Kembali</a>
                                
                        </center>
                        </div> 
                        
                    </table>
                </div>

            </div>
        </div>
        
@endsection

