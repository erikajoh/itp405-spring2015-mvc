<?php namespace App\Models;

use DB;

class Query {

  public function search(array $searchParams)
  {
    $query = \DB::table('dvds')
      ->select([
        DB::raw('dvds.id as id'),
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
      ->where('title', 'LIKE', "%" . $searchParams['title'] . "%");

      if($searchParams['genre'])
        $query->where('genre_id', '=', $searchParams['genre']);

      if($searchParams['rating'])
        $query->where('rating_id', '=', $searchParams['rating']);

      $query->orderBy('title', 'asc');

    return $query->get();
  }

    public function getGenres()
  {
    $query = \DB::table('genres')
      ->select('genre_name', 'id')
      ->orderBy('genre_name', 'asc');

    return $query->get();
  }

  public function getRatings()
  {
    $query = \DB::table('ratings')
      ->select('rating_name', 'id')
      ->orderBy('rating_name', 'asc');

    return $query->get();
  }

} 