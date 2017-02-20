@extends('layouts/app')
@section('content')
<center><h1>Data golongan</h1></center>
<hr>
	<div class="col-md-9">
		<table class="table table-striped table-bordered table-hover">
			<!-- <table class="table table-default"> -->
				<tr class="danger">

			<a href="{{url('/golongan/create')}}"class="btn btn-primary form-control">Tambah Data</a><br><br>
			{{$golongan->links()}}
			
	<thead>
		<tr class="bg-info">
		<th>No</th>
		<th><center>kode golongan</center></th>
		<th><center>nama golongan</center></th>
		<th><center>besaran uang</center></th>
		
		<th colspan="3">Action</th>
			
		</tr>
	</thead>
	<tbody>
		@php
		$no=1;
		@endphp
		@foreach($golongan as $golongans)
		<tr>
			<td>{{$no++}}</td>
			<td>{{$golongans->kode_golongan}}</td>
			<td>{{$golongans->nama_golongan}}</td>
			<td>{{$golongans->besaran_uang}}</td>
			
		<td><a href="{{route('golongan.edit',$golongans->id)}}" class="btn btn-warning">Update</a></td>	
		</td>
		<th>
        <td>
        {!!Form::open(['method'=>'DELETE','route'=>['golongan.destroy',$golongans->id]])!!}
        
        <input type="submit" class="btn btn-danger" onclick="return confirm('anda yakin akan menghapus data?');"value="Delete"> 
        {!!Form::close()!!}
        </td>
		</tr>
		
		@endforeach

	</tbody>
</table>




@endsection