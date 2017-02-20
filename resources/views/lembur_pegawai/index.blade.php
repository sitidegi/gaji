@extends('layouts/app')
@section('content')
<center><h1>Data lembur pegawai</h1></center>
<hr>
<div class="col-md-9">
<table class="table table-striped table-bordered table-hover">
<!-- <table class="table table-default"> -->

<tr class="danger">

<a href="{{url('/lembur_pegawai/create')}}"class="btn btn-primary form-control">Tambah Data</a>
<br><br>
	<thead>
		<tr class="bg-info">
		<th>No</th>
		<th><center>kode lembur </center></th>
		<th colspan="2">Nip Dan Nama Pegawai</th>
		<th colspan="2">jabatan dan golongan</th>
		<th><center>jumlah jam</center></th>
		
		<th colspan="3">Action</th>
			
		</tr>
	</thead>
	<tbody>
		@php
		$no=1;
		@endphp
		@foreach($lembur_pegawai as $lembur_pegawais)
		<tr>
			<td>{{$no++}}</td>
			<td>{{$lembur_pegawais->kode_lembur_id}}</td>
			<td>{{$lembur_pegawais->pegawaiModel->nip}}
			<td>{{$lembur_pegawais->pegawaiModel->user->name}}</td>
			<td>{{$lembur_pegawais->pegawaiModel->jabatanModel->nama_jabatan}}</td>
			<td>{{$lembur_pegawais->pegawaiModel->golonganModel->nama_golongan}}</td>
			<td>{{$lembur_pegawais->jumlah_jam}}</td>
			
		
		</td>
		<td>
		{!!Form::open(['method'=>'DELETE','route'=>['lembur_pegawai.destroy',$lembur_pegawais->id]])!!}
		
		<input type="submit" class="btn btn-danger" onclick="return confirm('anda yakin akan menghapus data?');"value="Delete"> 
		{!!Form::close()!!}
		</td>
		</tr>
		
		@endforeach

	</tbody>
</table>




@endsection