<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['tanggal_pengambilan','tanggal_pengembalian'];
    public $timestamps = true;
}
