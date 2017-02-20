@extends('layouts/app')
@section('content')
<center><h1>Data tunjangan pegawai</h1></center>
<hr>
<div class="col-md-11"></div>
<table class="table table-striped table bordered table-hover">
<table class="table table-default">
<tr class="danger">

<a href="{{url('/tunjangan_pegawai/create')}}"class="btn btn-primary form-control">Tambah Data</a><br><br>s

	<thead>
		<tr class="bg-info">
		<th>No</th>
		<th><center>Nip</center></th>
		<th><center>Nama pegawai</center></th>
		<th colspan="2">Jabatan dan Golongan</th>
		<th><center>Status</center></th>
		<th><center>Jumalah anak</center></th>
		<th><center>Besaran uang</center></th>
		<th colspan="2">Action</th>
			
		</tr>
	</thead>
	<tbody>
		@php
		$no=1;
		@endphp
		@foreach($tunjangan_pegawai as $tunjangan_pegawais)
		<tr>
			<td>{{$no++}}</td>
			<td>{{$tunjangan_pegawais->tunjanganModel->kode_tunjangan}}</td>
			<td>{{$tunjangan_pegawais->pegawaiModel->nip}}</td>
			<td>{{$tunjangan_pegawais->pegawaiModel->User->name}}</td>
			<td>{{$tunjangan_pegawais->pegawaiModel->jabatanModel->nama_jabatan}}</td>
			<td>{{$tunjangan_pegawais->pegawaiModel->golonganModel->nama_golongan}}</td>
			<td>{{$tunjangan_pegawais->tunjanganModel->status}}</td>
			<td>{{$tunjangan_pegawais->tunjanganModel->jumlah_anak}}</td>
			<td>{{$tunjangan_pegawais->tunjanganModel->besaran_uang}}</td>
		<td><a href="{{route('tunjangan_pegawai.edit',$tunjangan_pegawais->id)}}" class="btn btn-warning">Update</a></td>	
		</td>
		<td>
		{!!Form::open(['method'=>'DELETE','route'=>['tunjangan_pegawai.destroy',$tunjangan_pegawais->id]])!!}
		
		<input type="submit" class="btn btn-danger" onclick="return confirm('anda yakin akan menghapus data?');"value="Delete"> 
		{!!Form::close()!!}
		</td>
		</tr>
		
		@endforeach

	</tbody>
</table>




@endsection