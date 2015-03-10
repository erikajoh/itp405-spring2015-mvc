@extends('layout')

@section('content')

<div class="col-md-1">
</div>

<div class="col-md-6">
	<h1>Search</h1>
	<p>Search for a DVD <a href="/">or go home</a></p>
	<br>
	<form action="/dvds" method="GET">
		<div class="form-group">
			<h3>Title:</h3>
			<input type="text" name="title" class="form-control">
		</div>
		<br>
		<div class="form-group">
			<h3>Genre:</h3>
			<select name="genre_id" class="form-control">
			<div><option value="">All</option></div>
			@foreach($genres as $genre)
			<div><option value="{{ $genre->id }}"> {{ $genre->genre_name }} </option></div>
			@endforeach
			</select>
		</div>
		<br>
		<div class="form-group">
			<h3>Rating:</h3>
			<select name="rating_id" class="form-control">
			<div><option value="">All</option></div>
			@foreach ($ratings as $rating)
			<div><option value="{{ $rating->id }}"> {{ $rating->rating_name }} </option></div>
			@endforeach
			</select>
		</div>
		<br><br><br>
		<button type="submit" class="btn btn-default"><h5>search it!</h5></button>
	</form>
</div>

<div class="col-md-1">
</div>

<div class="col-md-3">
    <h1>Genres</h1>
	<p>Click a genre to see more</a></p>
	<br>
	@foreach($genres as $genre)
		<p><a href="/genres/{{ $genre->genre_name }}/dvds">{{ $genre->genre_name }}</a></p>
	@endforeach
</div>

<div class="col-md-1">
</div>

<br><br>

@stop