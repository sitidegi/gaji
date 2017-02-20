@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">buat lembur pegawai </div>
                <div class="panel-body">


                     {!! Form::open(['url' => 'lembur_pegawai']) !!}
                    <div class="form-group">
                        <div class="col-md-6">
                        {!! Form::label('Nip Dan Nama Pegawai ', 'Nip Dan Nama Pegawai ') !!}
                                    <select class="col-md-12 form-control" name="pegawai_id">
                                        @foreach($pegawai as $pegawais)
                                            <option  value="{{$pegawais->id}}" >
                                            {{$pegawais->nip}} {{$pegawais->User->name}}
                                                </option>
                                        @endforeach
                                    </select>

                                    
                                
                    <div class="form-group">
                        {!! Form::label('jumlah jam', 'jumlah jam') !!}
                        {!! Form::text('jumlah_jam',null,['class'=>'form-control','required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('SAVE', ['class' => 'btn btn-primary form-control']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
