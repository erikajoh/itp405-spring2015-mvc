@extends('layout')

@section('content')

  <h1>Results</h1>

 <p>
  @if (sizeof($dvds) > 0)
    Showing <strong>{{ sizeof($dvds) }}</strong> results
  @else
    No results
  @endif
  @if ($searchTitle != '')
    for <strong>{{ $searchTitle }}</strong> 
  @else
    for <strong>all titles</strong>
  @endif
  @if ($searchGenre != '')
    in <strong>{{ $searchGenre->genre_name }}</strong> 
  @else
    in <strong>all genres</strong> 
  @endif
  @if ($searchRating != '')
    with <strong>{{ $searchRating->rating_name }}</strong>
  @else
    with <strong>all ratings</strong>
  @endif
  <a href="/">or go home</a>

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