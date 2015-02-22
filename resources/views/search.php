<?php 
	require_once 'vendor/autoload.php';
	use App\Models\Dvd;
	// use \Symfony\Component\HTTPFoundation\Session\Session;
	// $session = new Session();
	// $session->start();
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>DVD Search</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body style="margin: 20px;">

<?php

	$dvd_query = new Dvd();
	$genres = $dvd_query->getGenres();
	$ratings = $dvd_query->getRatings();

?>

<h1>Search</h1>

<p>Search for a DVD. <a href="/dvds">Or show them all!</a></p>

<br>

<form action="/dvds" method="GET">
	Title:
	<input type="text" name="title">
	<br><br>
	Genre:
	<select name="genre">
	<div><option value="">All</option></div>
	<?php foreach($genres as $genre): ?>
	<div><?php echo '<option value="' . $genre->id . '">' . $genre->genre_name . '</option>' ?></div>
	<?php endforeach; ?>
	</select>
	<br>
	Rating:
	<select name="rating">
	<div><option value="">All</option></div>
	<?php foreach($ratings as $rating): ?>
	<div><?php echo '<option value="' . $rating->id . '">' . $rating->rating_name . '</option>' ?></div>
	<?php endforeach; ?>
	</select>
	<br><br>
	<button type="submit">search it!</button>
	</form>

</body>
</html>