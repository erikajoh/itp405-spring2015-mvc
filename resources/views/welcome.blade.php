@extends('layout')

@section('content')

<link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'>

<style>
	body {
		background: #C01A36;
		color: #fff;
	}

	.welcome {
		text-align: center;
		display: table;
		vertical-align: middle;
		margin: 30vh auto;
	}

	.quote {
		margin-bottom: 80px;
		color: #fff;
	}

	a, a:link, a:hover, a:visited, a:active {
		color: #fff;
	}

	.nav {
		background: #fff;
		color: #008195;
	}

	.nav a {
		color: #008195;
	}

	.title {
		font-size: 68px;
		margin-bottom: 20px;
		font-family: 'Shadows Into Light';
		color: white;
	}

</style>

<div class="welcome">
	<div class="title">
		THE DVD APP
	</div>

	<div class="quote">DVDs por favor :)</div>

	<br><br>

	<p><a href="dvds/search">search</a> &nbsp; // &nbsp; <a href="dvds/create">create</a> &nbsp; // &nbsp; <a href="dvds">view all</a></p>

	</div>
</div>

@stop
