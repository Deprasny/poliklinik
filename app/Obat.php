<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
  protected $table = 'obat';
  protected $primarykey = 'id';
  protected $fillable =['nama','jenis','kategori','harga','jumlah'];
  public $timestamps = false;

  public function detail()
  {
    return $this->hasOne('App\Detail');
  }

}
