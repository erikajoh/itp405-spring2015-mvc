@extends('layout')

@section('content')

  <h1>Results</h1>

  @if ($searchTitle != '')
  <p>
    @if (sizeof($dvds) > 0)
      Showing <strong>{{ sizeof($dvds) }}</strong> results
    @else
      No results
    @endif
    for <strong>{{ $searchTitle }}</strong> in 
    @if ($searchGenre != '')
      <strong>{{ $searchGenre->genre_name }}</strong> and 
    @else
      <strong>all genres</strong> and 
    @endif
    @if ($searchRating != '')
      <strong>{{ $searchRating->rating_name }}</strong>.
    @else
      <strong>all ratings</strong>
    @endif
    <a href="/dvds/search"> or back to search</a></p>
  @else
  <p>Showing all <strong>{{ sizeof($dvds) }}</strong> DVDs <a href="/">or go home</a></p>
  @endif

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
          <td>{{ $dvd->rating }}</td>
          <td>{{ $dvd->genre }}</td>
          <td>{{ $dvd->label }}</td>
          <td>{{ $dvd->sound }}</td>
          <td>{{ $dvd->format }}</td>
          <td>{{ $dvd->date }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  @endif

  <br><br>

@stop