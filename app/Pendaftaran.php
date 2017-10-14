<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
  protected $table = 'pendaftaran';
  protected $primarykey = 'id';
  protected $fillable =['tanggal','dokter_id','pasien_id','poliklinik_id','biaya','keterangan'];
  public $timestamps = false;

  public function dokter()
  {
    return $this->belongsTo('App\Dokter');
  }

  public function pasien()
  {
    return $this->belongsTo('App\Pasien');
  }

  public function poliklinik()
  {
    return $this->belongsTo('App\Poliklinik');
  }
}
