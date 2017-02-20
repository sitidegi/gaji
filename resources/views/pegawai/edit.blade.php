@extends('layouts.app')

@section('content')
        <div class="col-md-5 ">
                <div class="panel-heading"><h2>Registrasi</div>
                {!! Form
                ::model($pegawais,['method' => 'PATCH' , 'route'=> ['pegawai.update',$pegawais->id], 'enctype'=>'multipart/form-data'] ) !!}
                <div class="panel-body">
                            <div class="col-md-6">
                                <label for="name" >Nama Pegawai</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{$pegawais->user->name}}" autofocus>

                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            </div>

                            <div class="col-md-6">
                                <label for="email" >E-MAIL</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{$pegawais->user->email}}" autofocus>

                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            </div>

                             <div class="col-md-12">
                                <label >Type User</label>
                                   <select name="permision" class="col-md-12 form-control">
                                       <option>Admin</option>
                                       <option>HRD</option>
                                       <option>Bagian Administrasi</option>
                                       <option>Pegawai</option>
                                   </select>
                            </div>
                        
                </div>
                </div>

            
            <div class="col-md-4 ">
                <div class="panel-heading"><h2>Create Pegawai</div>
                    
                <div class="panel-body">

                            <div class="col-md-12">
                                <label for="nip" >NIP Pegawai</label>
                                <input id="nip" type="text" class="form-control" name="nip" value="{{$pegawais->nip}}" autofocus>

                                    <span class="help-block">
                                        <strong>{{ $errors->first('nip') }}</strong>
                                    </span>
                            </div>

                        

                            <div class="col-md-6">
                                <label >Jabatan</label>
                                    <select class="col-md-6 form-control" name="jabatan_id">
                                        @foreach($jabatans as $jabatans)
                                            <option  value="{{$jabatans->id}}" >{{$jabatans->nama_jabatan}}</option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="col-md-6">
                                <label >Golongan</label>
                                    <select class="col-md-6 form-control" name="golongan_id">
                                        @foreach($golongans as $golongans)
                                            <option  value="{{$golongans->id}}" >{{$golongans->nama_golongan}}</option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="col-md-12">
                                <label >Foto Pegawai</label>
                                    <input type="file" class="form-control" name="foto" autofocus>

                                    @if ($errors->has('foto'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('foto') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary form-control">Update</button>
                            </div>
                            <div class="col-md-12" >
                        </div>
                </div>  
                </div>

</form>

@endsection
