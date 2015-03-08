<?php namespace App\Models;

use DB;

use Illuminate\Database\Eloquent\Model;

class Label extends Model {

  public function dvds()
  {
    return $this->hasMany('App\Models\Dvd');
  }

} 