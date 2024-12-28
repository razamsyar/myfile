<html>

<head>
	<title>myFile</title>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.js" integrity="sha256-BTlTdQO9/fascB1drekrDVkaKd9PkwBymMlHOiG+qLI=" crossorigin="anonymous"></script>
	<script src="./dropzone.js"></script>
	<!-- Bootstrap core CSS -->
	<link href="./bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
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

    <div class="container mt-5">
	<div class="row">
	    <div class="col-md-12">
		<form action="upload.php" class="dropzone" id="dropzone"></form>
		<div id="result" style="margin-top:24px;"></div>
	    </div>
	</div>
	<a href="report.php">Report Abuse</a>
    </div>

</body>

</html>
