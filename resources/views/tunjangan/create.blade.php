@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">tunjangan</div>
                <div class="panel-body">

                     {!! Form::open(['url' => 'tunjangan']) !!}
                    <div class="col-md-6">
                        {!! Form::label('jabatan', 'jabatan') !!}
        
                         <select name="jabatan_id" class="form-control">
                                @foreach($jabatan as $jabatans)
                                    <option value="{{$jabatans->id}}">
                                        {{$jabatans->nama_jabatan}}
                                    </option>
                                @endforeach
                                </select>
                    </div>
                    <div class="col-md-6">
                        {!! Form::label('golongan', 'golongan') !!}
                        
                        <select name="golongan_id" class="form-control">
                                @foreach($golongan as $golongans)
                                    <option value="{{$golongans->id}}">
                                        {{$golongans->nama_golongan}}
                                    </option>
                                @endforeach
                                </select>
                    </div>

                    <div class="col-md-6">

                                <label>Kode Tunjangan</label>
                                <input type="text" class="form-control" name="kode_tunjangan" autofocus>

                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_tunjangan') }}</strong>
                                    </span>
                            </div>

                    <div class="col-md-6">
                        <label>ststus</label>

                        <select class="col-md-8" form="form-control" name="status">
                        <option name="status">menikah</option>
                        <option name="status">belum menikah</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        {!! Form::label('jumlah anak', 'jumlah anak') !!}
                        {!! Form::text('jumlah_anak',null,['class'=>'form-control','required']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::label('besaran uang', 'besaran uang') !!}
                        {!! Form::text('besaran_uang',null,['class'=>'form-control','required']) !!}
                    </div>
                    <div class="col-md-12">
                        {!! Form::submit('SAVE', ['class' => 'btn btn-primary form-control']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
