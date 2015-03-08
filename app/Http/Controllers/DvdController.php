<?php namespace App\Http\Controllers;

use App\Models\Dvd;
use App\Models\Format;
use App\Models\Genre;
use App\Models\Label;
use App\Models\Query;
use App\Models\Rating;
use App\Models\Sound;

use Illuminate\Http\Request;

use DB;

class DvdController extends Controller {

  public function search()
  {
    $genres = Genre::all();
    $ratings = Rating::all();

    return view('search', [
      'genres' => $genres,
      'ratings' => $ratings
    ]);
  }

  public function results(Request $request)
  {
    $title = $request->input('title');
    $genre_id = $request->input('genre_id');
    $rating_id = $request->input('rating_id');

    if ($genre_id) {
      $genre_query = DB::table('genres')
        ->select('genre_name')
        ->where('id', '=', $genre_id);
      $genre_name = $genre_query->get()[0];
    } else $genre_name = '';

    if ($rating_id) {
      $rating_query = DB::table('ratings')
        ->select('rating_name')
        ->where('id', '=', $rating_id);
      $rating_name = $rating_query->get()[0];
    } else $rating_name = '';

    return view('results', [
        'dvds' => (new Query())->search([ 'title' => $title , 'genre' => $genre_id , 'rating' => $rating_id ]),
        'searchTitle' => $title,
        'searchGenre' => $genre_name,
        'searchRating' => $rating_name
    ]);
  }

  public function create(Request $request)
  {
    $formats = Format::all();
    $genres = Genre::all();
    $labels = Label::all();
    $ratings = Rating::all();
    $sounds = Sound::all();

    return view('create', [
      'formats' => $formats,
      'genres' => $genres,
      'labels' => $labels,
      'ratings' => $ratings,
      'sounds' => $sounds
    ]);
  }

  public function store(Request $request)
  {
    $title = $request->input('title');
    $format_id = $request->input('format_id');
    $genre_id = $request->input('genre_id');
    $label_id = $request->input('label_id');
    $rating_id = $request->input('rating_id');
    $sound_id = $request->input('sound_id');

    $validation = \Validator::make($request->all(), [
      'title' => 'required',
      'format_id' => 'required',
      'genre_id' => 'required',
      'label_id' => 'required',
      'rating_id' => 'required',
      'sound_id' => 'required'
    ]);

    if ($validation->passes()) {
      $dvd = new Dvd();
      $dvd->title = $title;
      $dvd->format_id = $format_id;
      $dvd->genre_id = $genre_id;
      $dvd->label_id = $label_id;
      $dvd->rating_id = $rating_id;
      $dvd->sound_id = $sound_id;
      $dvd->save();
      return redirect('/dvds/create')->with('success', 'DVD successfully saved!');
    } else {
      return redirect('/dvds/create')
      ->withInput()
      ->withErrors($validation);
    }
  }

} 