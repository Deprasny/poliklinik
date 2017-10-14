<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
  protected $table = 'pasien';
  protected $primarykey = 'id';
  protected $fillable =['nama','alamat','gender','umur','telepon'];
  public $timestamps = false;

  public function pembayaran()
  {
    return $this->hasOne('App\Pembayaran');
  }

  public function pendaftaran()
  {
    return $this->hasOne('App\Pendaftaran');
  }

  public function resep()
  {
    return $this->hasOne('App\Resep');
  }

}
