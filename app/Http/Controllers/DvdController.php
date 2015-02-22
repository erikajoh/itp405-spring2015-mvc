<?php namespace App\Http\Controllers;

use App\Models\Dvd;
use Illuminate\Http\Request;

use DB;

class DvdController extends Controller {

  public function search()
  {
    return view('search', [
    ]);
  }


  public function results(Request $request)
  {
    $title = $request->input('title');
    $genre = $request->input('genre');
    $rating = $request->input('rating');

    if ($genre) {
      $genre_query = \DB::table('genres')
        ->select('genre_name')
        ->where('id', '=', $genre);
      $genre_name = $genre_query->get()[0];
    } else $genre_name = '';

    if ($rating) {
      $rating_query = \DB::table('ratings')
        ->select('rating_name')
        ->where('id', '=', $rating);
      $rating_name = $rating_query->get()[0];
    } else $rating_name = '';

    return view('results', [
        'dvds' => (new Dvd())->search([ 'title' => $title , 'genre' => $genre , 'rating' => $rating ]),
        'searchTitle' => $title,
        'searchGenre' => $genre_name,
        'searchRating' => $rating_name,
        'dvdCount' => Dvd::create()->count()
    ]);
  }

} 