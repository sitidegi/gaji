@extends('layouts.app')
@section('content')

<div class="col-md-offset-1">
        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Create Tunjangan Pegawai</div>
                    
                <div class="panel-body">
                     <form class="form-horizontal" role="form" method="POST" action="{{ url('/tunjangan_pegawai') }}">
                        {{ csrf_field() }}

                        <div class="col-md-12">
                                <label>Nama Pegawai</label>
                                <select name="pegawai_id" class="form-control">
                                @foreach($pegawai as $pegawais)
                                    <option value="{{$pegawais->id}}">
                                        {{$pegawais->User->name}}
                                    </option>
                                @endforeach
                                </select>
                                <span class="help-block">
                                        <strong>{{ $errors->first('pegawai_id') }}</strong>
                                    </span>
                                    <div class="col-md-6">
                                        @if(isset($error))
                                            Tunjangan Sudah Ada 
                                        @endif
                                    </div>
                            </div>

                            <div class="col-md-6">
                                <label>Jumlah Anak</label>
                                <input type="text" class="form-control" name="jumlah_anak" autofocus>

                                    <span class="help-block">
                                        <strong>{{ $errors->first('jumlah_anak') }}</strong>
                                    </span>
                            </div>
                            <div class="col-md-6">
                                <label>Kode Tunjangan</label>
                                <input type="text" class="form-control" name="kode_tunjangan" autofocus>

                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_tunjangan') }}</strong>
                                    </span>
                            </div>

                            <div class="col-md-6">
                                <label for="Jabatan">Status</label>
                                    <select class="col-md-6 form-control" name="status">
                                            <option name="status">Parent</option>
                                            <option name="status">Menikah</option>
                                    </select>
                            </div>


                            <div class="col-md-6">
                                <label>Besaran Uang</label>
                                <input type="text" class="form-control" name="besaran_uang" autofocus>

                                    <span class="help-block">
                                        <strong>{{ $errors->first('besaran_uang') }}</strong>
                                    </span>
                            </div>
                        
                           <div class="col-md-12">
                            <button type="submit" class="btn btn-primary form-control">Tambah</button>
                          </div>
                        </div>
                    </form>
                </div>
            </div>

@endsection
