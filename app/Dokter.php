<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
      protected $table = 'dokter';
      protected $primarykey = 'id';
      protected $fillable =['nama','spesialis','alamat','telepon','poliklinik_id','tarif'];
      public $timestamps = false;

      public function pendaftaran()
      {
        return $this->hasMany('App\Pendaftaran');
      }

      public function poliklinik()
      {
        return $this->hasOne('App\Poliklinik');
      }

      public function resep()
      {
        return $this->hasMany('App\Resep');
      }
}
