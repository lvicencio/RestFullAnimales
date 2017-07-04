<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'nombre', 'caracteristicas',
  ];

  public function animales()
  {
    return $this->hasMany('App\Animal');
  }
}
