<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
	{
    protected $fillable = ['tanggal_pengambilan','tanggal_pengembalian','jumlah_hari','denda','customer_id','mobil_id','supir_id','total_harga'];
    public $timestamps = true;


public function Customer() 
{
	return $this->belongsTo('App\Customer','customer_id');
} 
public function Mobil() 
{
	return $this->belongsTo('App\Mobil','mobil_id');
}

public function Supir() 
{
	return $this->belongsTo('App\Supir','supir_id');
}

	}

