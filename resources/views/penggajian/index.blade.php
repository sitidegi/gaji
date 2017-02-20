@extends('layouts.app')

@section('content')
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Table Penggajian</div>
                    
                <div class="">
                    <div class="col-md-12">
                        <a href="{{url('penggajian/create')}}" class="btn btn-primary form-control">Tambah Data</a>
                        <center>{{$penggajians->links()}}</center>
                    </div>
                    <table class="table table-striped table-hover table-bordered">

                        <thead>
                        <tr class="bg-info">
                        <th>no</th>
                        <td>foto</td>
                        <th>nama pegawai</th>
                        <th>nip pegawai</th> 
                        <th>status pengambilan</th>
                        <th colspan="3">Opsi</th>
                        </tr>

                        @php
                            $no=1 ;
                        @endphp
                        @foreach($penggajians as $penggajians)
                <td>{{$no++}}</td>                        
                            <td><img height="120px" alt="Smiley face" width="120px" class="img-circle" src="asset/image/{{$penggajians->tunjangan_pegawaiModel->pegawaiModel->foto}}"></td>
                        <td>{{$penggajians->tunjangan_pegawaiModel->pegawaiModel->User->name}}</td>
                        
                        <td>{{$penggajians->tunjangan_pegawaiModel->pegawaiModel->nip}}</td>
                        <td><b>@if($penggajians->tanggal_pengambilan == ""&&$penggajians->status_pengambilan == "0")
                            Gaji Belum Diambil
                        @elseif($penggajians->tanggal_pengambilan == ""||$penggajians->status_pengambilan == "0")
                            Gaji Belum Diambil
                        @else
                            Gaji Sudah Diambil Pada {{$penggajians->tanggal_pengambilan}}
                        @endif</b></td>


                        </h5>
                        
                                <td><a class="btn btn-primary form-control" href="{{route('penggajian.show',$penggajians->id)}}">Detail</a></td>
                                <td><a class="btn btn-success form-control" href="{{route('penggajian.show',$penggajians->id)}}">Edit </a></td>
                                     <td>{!!Form::open(['method'=>'DELETE','route'=>['penggajian.destroy',$penggajians->id]])!!}
                                    {!!Form::submit('Delete',['class'=>'btn btn-danger col-md-12'])!!}</td>
                                    {!!Form::close()!!}
                                
                        </center>
                        </div> 
                        @endforeach
                        
                    </table>
                </div>

            </div>
        </div>
        
@endsection

