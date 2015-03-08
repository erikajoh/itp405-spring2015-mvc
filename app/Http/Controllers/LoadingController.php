<?php namespace App\Http\Controllers;

use App\Models\Dvd;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use DB;

class LoadingController extends Controller {

  public function eagerLoading()
  {
    $dvds = Dvd::with('format', 'genre', 'label', 'rating', 'sound')->get();
    var_dump($dvds->toArray());
  }

} 