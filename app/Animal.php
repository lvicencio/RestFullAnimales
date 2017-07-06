<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{


  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'nombre', 'habitad', 'caracteristicas','reproduccion','extremidades','tipo_id',
  ];
  protected $hidden = ['created_at', 'updated_at'];
  public function tipo()
  {
    return $this->belongsTo('App\Tipo');
  }
}
