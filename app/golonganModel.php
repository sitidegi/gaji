<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class golonganModel extends Model
{
	protected $table='golongan';
	protected $fillable=array('kode_golongan','nama_golongan','besaran_uang');
	protected $visible=array('kode_golongan','nama_golongan','besaran_uang');

	public function tunjanganModel()
	{
		return $this->hasMany('App\tunjanganModel','golongan_id');
	}
	public function kategori_lemburModel()
	{
		return $this->hasMany('App\kategori_lemburModel','golongan_id');
	}

    public function pegawaiModel()
	{
		return $this->hasMany('App\pegawaiModel','golongan_id');
	}

	
    //
}
