@extends('layout')

@section('content')

<div class="col-md-1">
</div>

<div class="col-md-6">
	<h1>Create</h1>
	<p>Create a DVD <a href="/">or go home</a></p>
	<br>

	@foreach ($errors->all() as $errorMessage)
		<p style="color:red;">{{ $errorMessage }}</p>
	@endforeach
	@if(Session::has('success'))
		<p style="background:green;color:white;">{{ Session::get('success') }}</p>
	@endif

	<form action="/dvds" method="POST">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group">
			<h3>Title:</h3>
			<input type="text" name="title" class="form-control">
		</div>
		<div class="form-group">
			<h3>Format:</h3>
			<select name="format_id" class="form-control">
			@foreach($formats as $format)
			<div><option value="{{ $format->id }}"> {{ $format->format_name }} </option></div>
			@endforeach
			</select>
		</div>
		<div class="form-group">
			<h3>Genre:</h3>
			<select name="genre_id" class="form-control">
			@foreach($genres as $genre)
			<div><option value="{{ $genre->id }}"> {{ $genre->genre_name }} </option></div>
			@endforeach
			</select>
		</div>
		<div class="form-group">
			<h3>Label:</h3>
			<select name="label_id" class="form-control">
			@foreach($labels as $label)
			<div><option value=" {{ $label->id }} "> {{ $label->label_name }} </option></div>
			@endforeach
			</select>
		</div>
		<div class="form-group">
			<h3>Rating:</h3>
			<select name="rating_id" class="form-control">
			@foreach ($ratings as $rating)
			<div><option value="{{ $rating->id }}"> {{ $rating->rating_name }} </option></div>
			@endforeach
			</select>
		</div>
		<div class="form-group">
			<h3>Sound:</h3>
			<select name="sound_id" class="form-control">
			@foreach($sounds as $sound)
			<div><option value="{{ $sound->id }}"> {{ $sound->sound_name }} </option></div>
			@endforeach
			</select>
		</div>
		<br><br>
		<button type="submit" class="btn btn-default"><h5>create it!</h5></button>
	</form>

	<br><br>
	
</div>

@stop