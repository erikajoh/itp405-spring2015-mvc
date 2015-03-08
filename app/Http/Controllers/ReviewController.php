<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class ReviewController extends Controller {

  public function create(Request $request, $id)
  {
    $dvd_query = DB::table('dvds')
      ->select([
        DB::raw('title as title'),
        DB::raw('format_name as format'),
        DB::raw('genre_name as genre'),
        DB::raw('label_name as label'),
        DB::raw('rating_name as rating'),
        DB::raw('sound_name as sound'),
        DB::raw('DATE_FORMAT(release_date, "%d %M %Y") as date')
      ])
      ->join('formats', 'dvds.format_id', '=', 'formats.id')
      ->join('genres', 'dvds.genre_id', '=', 'genres.id')
      ->join('labels', 'dvds.label_id', '=', 'labels.id')
      ->join('ratings', 'dvds.rating_id', '=', 'ratings.id')
      ->join('sounds', 'dvds.sound_id', '=', 'sounds.id')
      ->where('dvds.id', '=', $id);
    $dvd_array = $dvd_query->get();
    if (sizeof($dvd_array) > 0) {
      $dvd = $dvd_array[0];
    } else {
      return redirect('/dvds/');
    }
    $reviews_query = DB::table('reviews')
      ->select('title', 'description', 'rating')
      ->where('dvd_id', '=', $id);
    $reviews = $reviews_query->get();
    return view('reviews', [
        'dvd' => $dvd,
        'dvd_id' => $id,
        'reviews' => $reviews
    ]);
  }

  public function store(Request $request)
  {
    $id = $request->input('dvd_id');
    $validation = \Validator::make($request->all(), [
      'dvd_id' => 'required|integer',
      'title' => 'required|min:5',
      'rating' => 'required|integer|min:1|max:10',
      'description' => 'required|min:20'
      ]);
    if ($validation->passes()) {
      DB::table('reviews')->insert([
        'dvd_id' => $request->input('dvd_id'),
        'title' => $request->input('title'),
        'rating' => $request->input('rating'),
        'description' => $request->input('description')
        ]);
      return redirect('/dvds/' . $id)->with('success', 'Review successfully saved!');
    } else {
      return redirect('/dvds/' . $id)
      ->withInput()
      ->withErrors($validation);
    }
  }

} 