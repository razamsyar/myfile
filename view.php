<html>

<head>
	<title>myFile</title>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.js" integrity="sha256-BTlTdQO9/fascB1drekrDVkaKd9PkwBymMlHOiG+qLI=" crossorigin="anonymous"></script>
	<!-- Bootstrap core CSS -->
	<link href="./bootstrap.min.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="container">
		<img src="myfile.png" height="50px" width="50px">
	    <a class="navbar-brand" href="#">myFile sharing</a>
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	    </button>
	    
	</div>
    </nav>

    <main role="main" class="container">
	<h1 class="mt-5">Download file</h1>
	<p class="lead">File name: <?=htmlentities($_GET['name'])?></p>
	<div class="col-xl-6 mt-2">
		<form action="download.php" method="POST">
		<input type="hidden" name="name" value="<?=htmlentities($_GET['name'])?>">
		<input type="hidden" name="id" value="<?=htmlentities($_GET['id'])?>">
		
		<button class="btn btn-outline-primary" type="submit">Download</button>
		</form>

	</div>
</main>


</body>

</html>
