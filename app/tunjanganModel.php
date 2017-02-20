<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tunjanganModel extends Model
{
    protected $table='tunjangan';
	protected $fillable=array('kode_tunjangan','jabatan_id','golongan_id','status','jumlah_anak','besaran_uang');
	protected $visible=array('kode_tunjangan','jabatan_id','golongan_id','status','jumlah_anak','besaran_uang');

	public function jabatanModel()
	{
		return $this->belongsTo('App\jabatanModel','jabatan_id');
	}

	public function golonganModel()
	{
		return $this->belongsTo('App\golonganModel','golongan_id');
	}

	public function kategori_lemburModel()
	{
		return $this->hasMany('App\kategori_lemburModel','kode_lembur_id');
	}

	public function tunjangan_pegawaiModel()
	{
		return $this->hasMany('App\tunjangan_pegawaiModel','kode_tunjangan_id');
	}

}
