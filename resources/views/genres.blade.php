@extends('layout')

@section('content')

<h1>{{ $genre_name }}</h1>
<p>
@if (sizeof($dvds) > 0)
  Showing <strong>{{ sizeof($dvds) }}</strong> results
@else
  No results
@endif
in <strong>{{ $genre_name }}</strong> <a href="/">or go home</a>

@if (sizeof($dvds) > 0)
<table class="table table-striped">
  <thead>
    <tr>
      <th>Title</th>
      <th>Rating</th>
      <th>Genre</th>
      <th>Label</th>
      <th>Sound</th>
      <th>Format</th>
      <th>Release Date</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($dvds as $dvd)
    <tr>
      <td>{{ $dvd->title }} &nbsp; <a href="/dvds/{{ $dvd->id }}">Details</a></td>
      <td>{{ $dvd->rating_name }}</td>
      <td>{{ $genre_name }}</td>
      <td>{{ $dvd->label_name }}</td>
      <td>{{ $dvd->sound_name }}</td>
      <td>{{ $dvd->format_name }}</td>
      <td>{{ $dvd->release_date }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endif

<br><br>

@stop