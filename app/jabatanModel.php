<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jabatanModel extends Model
{
	protected $table='jabatan';
	protected $fillable=array('kode_jabatan','nama_jabatan','besaran_uang');
	protected $visible=array('kode_jabatan','nama_jabatan','besaran_uang');

	public function tunjanganModel()
	{
		return $this->hasMany('App\tunjanganModel','jabatan_id');
	}

	public function kategori_lemburModel()
	{
		return $this->hasMany('App\kategori_lemburModel','jabatan_id');
	}

	public function pegawaiModel()
	{
		return $this->hasMany('App\pegawaiModel','jabatan_id');
	}

	
    //
}
