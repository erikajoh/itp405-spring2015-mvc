<?php namespace App\Services;

use Illuminate\Http\Request;
use Cache;

class RottenTomatoes {

	public static function search($dvd_title)
	{
		if (Cache::has($dvd_title))
	    {
	      $rt_data = Cache::get($dvd_title);
	    } else {
	      // trim dvd title
	      $trimmed_dvd_title = strtolower($dvd_title);
	      $trimmed_dvd_title = preg_replace('/[[:punct:]]/', '', $trimmed_dvd_title);
	      preg_match_all('/[0-9]{4}/', $trimmed_dvd_title, $trimmed_dvd_date);
	      $trimmed_dvd_title = preg_replace('/[0-9]{4}/', '', $trimmed_dvd_title);
	      $trimmed_dvd_title = str_replace('and', '', $trimmed_dvd_title);
	      $trimmed_dvd_title = trim($trimmed_dvd_title, ' ');
	      // make api request
	      $apikey = 'mp65ttjyrxwgz7k8qs38ctq2';
	      $q = urlencode($trimmed_dvd_title);
	      $endpoint = 'http://api.rottentomatoes.com/api/public/v1.0/movies.json?apikey=' . $apikey . '&q=' . $q;
	      $session = curl_init($endpoint);
	      curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
	      $data = curl_exec($session);
	      curl_close($session);
	      $search_results = json_decode($data);
	      // find result match
	      $movie_results = $search_results->movies;
	      $movie = NULL;
	      foreach ($movie_results as $movie_result) {
	        $trimmed_movie_result = strtolower($movie_result->title);
	        $trimmed_movie_result = preg_replace('/[[:punct:]]/', '', $trimmed_movie_result);
	        $trimmed_movie_result = str_replace('and', '', $trimmed_movie_result);
	        $trimmed_movie_result = trim($trimmed_movie_result, ' ');
	        if ($trimmed_dvd_title == $trimmed_movie_result) {
	          if ($trimmed_dvd_date[0] != NULL) {
	            if ($trimmed_dvd_date[0][0] == $movie_result->year) {
	              $movie = $movie_result;
	              break;
	            }
	          }
	          else {
	            $movie = $movie_result;
	            break;
	          }
	        }
	      }
	      // fill in data fields
	      if ($movie != NULL) {
	        $critics_score = $movie->ratings->critics_score;
	        $audience_score = $movie->ratings->audience_score;
	        $runtime = $movie->runtime;
	        $abridged_cast = $movie->abridged_cast;
	        $image_href = $movie->posters->profile;
	      } else {
	        $critics_score = -1;
	        $audience_score = -1;
	        $runtime = -1;
	        $abridged_cast = NULL;
	        $image_href = NULL;
	      }
	      // create object with data fields
	      $rt_data = (object) [
	        'critics_score' => $critics_score,
	        'audience_score' => $audience_score,
	        'runtime' => $runtime,
	        'abridged_cast' => $abridged_cast,
	        'image_href' => $image_href
	      ];
	      // cache the data
	      Cache::put($dvd_title, $rt_data, 60);
    	}
		return $rt_data;
	}

}
