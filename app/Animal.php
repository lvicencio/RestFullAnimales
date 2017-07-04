<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'nombre', 'habitad', 'caracteristicas','reproduccion','extremidades','tipo_id',
  ];

  public function tipo()
  {
    return $this->belongsTo('App\Tipo');
  }
}
