<html>
	<head>
		<link href='//fonts.googleapis.com/css?family=Lato:100,200,300' rel='stylesheet' type='text/css'>
    	<meta charset="UTF-8">
    	<title>The DVD App</title>
		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				display: table;
				font-weight: 200;
				font-family: 'Avenir';
				background-color: #FBFBF8;
				color: #008195;
			}

			p {
				font-family: 'Avenir';
				font-size: 14px;
				color: #008195;
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				font-size: 96px;
				margin-bottom: 20px;
			}

			.quote {
				font-size: 24px;
				margin-bottom: 80px;
				color: #008195;
				font-family: 'Avenir Next';
			}

			a, a:link, a:visited, a:active {
				color: #C01A36;
				text-decoration: none;
			}

			a:hover {
				color: #C01A36;
				text-decoration: underline;
			}

			.flowers-right {
				height:100vh;
				right:0;
				float:right;
				position:fixed;
			}

			.flowers-left {
				height:100vh;
				left:0;
				float:left;
				position:fixed;
				-moz-transform: scaleX(-1);
		        -o-transform: scaleX(-1);
		        -webkit-transform: scaleX(-1);
		        transform: scaleX(-1);
		        filter: FlipH;
		        -ms-filter: 'FlipH';
			}

		</style>
	</head>
	<body>
		<img src="{{asset('assets/flowers.png')}}" class="flowers-left">
		<div class="container">

			<div class="title">
				<!-- <img src="{{asset('assets/dvd.png')}}" width="10%"> -->
				<!-- <br> -->
				THE DVD APP
			</div>
			<div class="quote">DVDs por favor :)</div>
			<img src="{{asset('assets/dvd.png')}}" width="10%">
			<br><br>
			<p><a href="dvds/search">search</a> &nbsp; // &nbsp; <a href="dvds/create">create</a> &nbsp; // &nbsp; <a href="dvds">view all</a></p>

		</div>
		<img src="{{asset('assets/flowers.png')}}" class="flowers-right">
	</body>
</html>
