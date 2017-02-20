<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori_lemburModel extends Model
{
	protected $table='kategori_lembur';
	protected $fillable=array('kode_lembur','jabatan_id','golongan_id','besaran_uang');
	protected $visible=array('kode_lembur','jabatan_id','golongan_id','besaran_uang');

        public function jabatanModel()
			{
				return $this->belongsTo('App\jabatanModel','jabatan_id');
			}

		public function golonganModel()
			{
				return $this->belongsTo('App\golonganModel','golongan_id');
			}

		public function lembur_pegawaiModel()
			{
				return $this->hasMany('App\lembur_pegawaiModel','kode_lembur_id');
			}
    
}
