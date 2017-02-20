<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tunjangan_pegawaiModel extends Model
{
	protected $table='tunjangan_pegawai';
	protected $fillable=array('kode_tunjangan_id','pegawai_id');
	protected $visible=array('kode_tunjangan_id','pegawai_id');

	public function pegawaiModel()
	{
		return $this->belongsTo('App\pegawaiModel','pegawai_id');
	}

	public function tunjanganModel()
	{
		return $this->belongsTo('App\tunjanganModel','kode_tunjangan_id');
	}

	public function penggajianModel()
	{
		return $this->hasMany('App\penggajianModel','tunjangan_pegawai_id');
	}

    //
}
