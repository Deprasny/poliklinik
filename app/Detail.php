<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
  protected $table = 'detail';
  protected $primarykey = 'id';
  protected $fillable =['resep_id','obat_id','harga','dosis','sub_total'];
  public $timestamps = false;

  public function resep()
  {
    return $this->belongsTo('App\Resep');
  }

  public function obat()
  {
    return $this->BelongsTo('App\Obat');
  }

}
