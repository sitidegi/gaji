<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class penggajianModel extends Model
{
	protected $table='penggajian';
	protected $fillable=array('tunjangan_pegawai_id','jumlah_jam_lembur','jumlah_uang_lembur','gaji_pokok','total_gaji','tanggal_pengambilan','status_pengambilan','petugas_penerima');

	protected $visible=array('tunjangan_pegawai_id','jumlah_jam_lembur','jumlah_uang_lembur','gaji_pokok','total_gaji','tanggal_pengambilan','status_pengambilan','petugas_penerima');
    //



    public function tunjangan_pegawaiModel()
	{
		return $this->belongsTo('App\tunjangan_pegawaiModel','tunjangan_pegawai_id');
	}

}
