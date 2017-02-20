@extends('layouts/app')
@section('content')

<center><h1>Data kategori lembur</h1></center>
<hr>
<div class="col-md-9"> 
<table class="table table-striped table-bordered table-hover">
<!-- <table class="table table-default"> -->
<tr class="danger">_

<a href="{{url('/kategori_lembur/create')}}"class="btn btn-primary form-control">Tambah Data</a>
<br><br>
	<thead>
		<tr class="bg-info">
		<th>No</th>
		<th><center>kode lembur</center></th>
		<th><center>jabatan </center></th>
		<th><center>golongan </center></th>
		<th><center>besaran_uang </center></th>
		<th colspan="2">Action</th>
			
		</tr>
	</thead>
	<tbody>
		@php
		$no=1;
		@endphp
		@foreach($kategori_lembur as $kategori_lemburs)
		<tr>
			<td>{{$no++}}</td>
			<td>{{$kategori_lemburs->kode_lembur}}</td>
			<td>{{$kategori_lemburs->jabatanModel->nama_jabatan}}</td>
			<td>{{$kategori_lemburs->golonganModel->nama_golongan}}</td>
			<td>{{$kategori_lemburs->besaran_uang}}</td>
			
		<td><a href="{{route('kategori_lembur.edit',$kategori_lemburs->id)}}" class="btn btn-warning">Update</a></td>	
		</td>
		<td>
		{!!Form::open(['method'=>'DELETE','route'=>['kategori_lembur.destroy',$kategori_lemburs->id]])!!}
		
		<input type="submit" class="btn btn-danger" onclick="return confirm('anda yakin akan menghapus data?');"value="Delete"> 
		{!!Form::close()!!}
		</td>
		</tr>
		</div>
		@endforeach

	</tbody>
</table>




@endsection