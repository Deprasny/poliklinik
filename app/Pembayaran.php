<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
  protected $table = 'pembayaran';
  protected $primarykey = 'id';
  protected $fillable =['pasien_id','tanggal','jumlah'];
  public $timestamps = false;

  public function pasien()
  {
    return $this->belongsTo('App\Pasien');
  }

}
