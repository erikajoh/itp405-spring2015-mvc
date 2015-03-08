@extends('layout')

@section('content')

	<h1>{{ $dvd->title }}</h1>
	<table class="table table-striped">
      <thead>
        <tr>
          <th>Rating</th>
          <th>Genre</th>
          <th>Label</th>
          <th>Sound</th>
          <th>Format</th>
          <th>Release Date</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{ $dvd->rating }}</td>
          <td>{{ $dvd->genre }}</td>
          <td>{{ $dvd->label }}</td>
          <td>{{ $dvd->sound }}</td>
          <td>{{ $dvd->format }}</td>
          <td>{{ $dvd->date }}</td>
        </tr>
      </tbody>
    </table>

    <br>

	<h1>Reviews</h1>

	<p>Review <strong>{{ $dvd->title }}</strong> <a href="/">or go home</a></p>

	@foreach ($errors->all() as $errorMessage)
		<p style="color:red;">{{ $errorMessage }}</p>
	@endforeach
	@if(Session::has('success'))
		<p style="background:green;color:white;">{{ Session::get('success') }}</p>
	@endif

	<br>

	<form method="post" action="/dvds/reviews">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="dvd_id" value="{{ $dvd_id }}">
		<div class="form-group">
			<label>Title</label>
			<input name="title" class="form-control" value="{{ Request::old('title') }}">
		</div>
		<div class="form-group">
			<label>Rating</label>
			<select name="rating" class="form-control">
				@for ($x = 1; $x <= 10; $x++)
					@if ($x == Request::old('rating'))
						<option value="{{ $x }}" selected="selected">
							{{ $x }}
						</option>
					@else
						<option value="{{ $x }}">
							{{ $x }}
						</option>
					@endif
				@endfor
			</select>
		</div>
		<div class="form-group">
			<label>Description</label>
			<textarea name="description" class="form-control">{{ Request::old('description') }}</textarea>
		</div>
		<br>
		<button type="submit" class="btn btn-default">review it!</button>
	</form>

	<br><hr><br>

	<p>
		@if (sizeof($reviews) > 0)
			Showing <strong>{{ sizeof($reviews) }}</strong> reviews
		@else
			No reviews
		@endif
		for <strong>{{ $dvd->title }}</strong>
	</p>
	
	@if (sizeof($reviews) > 0)
		<table class="table table-striped">
	      <thead>
	        <tr>
	          <th>Title</th>
	          <th>Rating</th>
	          <th>Description</th>
	        </tr>
	      </thead>
	      <tbody>
	        @foreach ($reviews as $review)
	        <tr>
	          <td>{{ $review->title }}</td>
	          <td>{{ $review->rating }}</td>
	          <td>{!! $review->description !!}</td>
	        </tr>
	        @endforeach
	      </tbody>
    	</table>
	@endif

	<br><br>

@stop