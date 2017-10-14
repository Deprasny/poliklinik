<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poliklinik extends Model
{
  protected $table = 'poliklinik';
  protected $primarykey = 'id';
  protected $fillable =['nama'];
  public $timestamps = false;

  public function pendaftaran()
  {
    return $this->hasMany('App\Pendaftaran');
  }

  public function dokter()
  {
    return $this->hasMany('App\Dokter');
  }

  public function resep()
  {
    return $this->hasMany('App\Resep');
  }
}
