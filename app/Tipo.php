<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'nombre', 'caracteristicas',
  ];

  protected $hidden = ['created_at', 'updated_at'];

  public function animales()
  {
    return $this->hasMany('App\Animal');
  }
}
