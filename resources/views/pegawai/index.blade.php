@extends('layouts/app')
@section('content')

<center><h1>Pegawai</h1></center>
<hr>
<div class="col-md-9 ">
<table class="table table-striped table-bordered table-hover">
<!-- <table class="table table-default"> -->
<tr class="danger">
<a href="{{url('/pegawai/create')}}"class="btn btn-primary form-control">Tambah Data</a>
<br><br>
	<thead>
		<tr class="bg-info">
		<th>No</th>
		<th><center>Nip</center></th>
		<th><center>Nama</center></th>
		<th><center>Email</center></th>
		<th><center>permision</center></th>
		<th colspan="2">Jabatan dan golongan</th>
		<th>Foto</th>
		<th colspan="3">Action</th>
			
		</tr>
	</thead>
	<tbody>
		@php
		$no=1;
		@endphp
		@foreach($pegawai as $pegawais)
		<tr>
			<td>{{$no++}}</td>
			<td>{{$pegawais->nip}}</td>
			<td>{{$pegawais->User->name}}</td>
			<td>{{$pegawais->User->email}}</td>
			<td>{{$pegawais->User->permision}}</td>
			<td>{{$pegawais->jabatanModel->nama_jabatan}}</td>
			<td>{{$pegawais->golonganModel->nama_golongan}}</td>
			
	<td><img src="asset/image/{{$pegawais->foto}}" height="80" width="80"></td>

		<td><a href="{{route('pegawai.edit',$pegawais->id)}}"class="btn btn-warning">edit</a></td>	
		</td>

		<td>
		{!!Form::open(['method'=>'DELETE','route'=>['pegawai.destroy',$pegawais->id]])!!}
		
		<input type="submit" class="btn btn-danger" onclick="return confirm('anda yakin akan menghapus data?');"value="Delete"> 
		{!!Form::close()!!}
		</td>
		</tr>
		</div>
		@endforeach

	</tbody>
</table>




@endsection