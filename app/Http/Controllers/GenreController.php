<?php namespace App\Http\Controllers;

use App\Models\Dvd;
use App\Models\Genre;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use DB;

class GenreController extends Controller {

  public function results($genre_name)
  {
    $genre = Genre::where('genre_name', '=', $genre_name)->first();
    $dvds = $genre->dvds()
          ->join('formats', 'dvds.format_id', '=', 'formats.id')
          ->join('labels', 'dvds.label_id', '=', 'labels.id')
          ->join('ratings', 'dvds.rating_id', '=', 'ratings.id')
          ->join('sounds', 'dvds.sound_id', '=', 'sounds.id')
          ->select('dvds.title', 'dvds.id', 'formats.format_name',
            'labels.label_name', 'ratings.rating_name', 'sounds.sound_name')
          ->get();

    foreach ($dvds as $dvd) {
      $dvd->release_date = date('d M Y', strtotime($dvd->release_date));
    }

    return view('genres', [
      'genre_name' => $genre_name,
      'dvds' => $dvds
    ]);
  }

} 