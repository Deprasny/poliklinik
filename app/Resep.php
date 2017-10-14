<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
  protected $table = 'resep';
  protected $primarykey = 'id';
  protected $fillable =['nama'];
  public $timestamps = false;

  public function detail()
  {
    return $this->hasOne('App\Detail');
  }

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
