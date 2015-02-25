@extends('layout')

@section('content')

<?php 
	require_once 'vendor/autoload.php';
	use App\Models\Dvd;

	$dvd_query = new Dvd();
	$genres = $dvd_query->getGenres();
	$ratings = $dvd_query->getRatings();
?>

<h1>Search</h1>

<p>Search for a DVD <a href="/dvds">or show them all</a></p>

<br>

<form action="/dvds" method="GET">
	<div class="form-group">
		Title:
		<input type="text" name="title" class="form-control">
	</div>
	<div class="form-group">
		Genre:
		<select name="genre" class="form-control">
		<div><option value="">All</option></div>
		@foreach($genres as $genre)
		<div>{{ '<option value="' . $genre->id . '">' . $genre->genre_name . '</option>' }}</div>
		@endforeach
		</select>
	</div>
	<div class="form-group">
		Rating:
		<select name="rating" class="form-control">
		<div><option value="">All</option></div>
		@foreach ($ratings as $rating)
		<div>{{ '<option value="' . $rating->id . '">' . $rating->rating_name . '</option>' }}</div>
		@endforeach
		</select>
	</div>
	<br>
	<button type="submit" class="btn btn-default">search it!</button>
</form>

@stop