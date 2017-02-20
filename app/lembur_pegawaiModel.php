<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lembur_pegawaiModel extends Model
{
	protected $table='lembur_pegawai';
	protected $fillable=array('kode_lembur_id','lembur_pegawai','jumlah_jam','pegawai_id');
	protected $visible=array('kode_lembur_id','lembur_pegawai','jumlah_jam','pegawai_id');

	public function pegawaiModel()
	{
		return $this->belongsTo('App\pegawaiModel','pegawai_id');
	}

	public function kategori_lemburModel()
	{
		return $this->belongsTo('App\kategori_lemburModel','kode_lembur_id');
	}
    //
}
