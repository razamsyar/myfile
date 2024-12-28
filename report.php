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
	<h1 class="mt-5">Report abuse</h1>
	<p class="lead">Submit the URL here, admin will review the link shortly</p>
	<div class="col-xl-6 mt-5">
		<form class="form-add-note" action="report.php" method="POST">
		<label for="link" class="sr-only">Link</label>
		<input type="text" name="url" class="form-control" placeholder="http://example.com" required="true" autofocus="true">
		
		<button class="btn btn-primary btn-block mt-2" type="submit">Report</button>
		</form>
		<?php
            if(isset($_POST['url'])){
                if (filter_var($_POST['url'], FILTER_VALIDATE_URL) && preg_match("^http(s)?^",parse_url($_POST['url'], PHP_URL_SCHEME))) {
                    system("/phantomjs-2.1.1-linux-x86_64/bin/phantomjs --ignore-ssl-errors=true --local-to-remote-url-access=true --web-security=false --ssl-protocol=any /bot.js ".urlencode($_POST['url'])." REDACTED");
                    echo("<p class='text-success'>Admin will view the URL shortly!</p>");
                } else {
                    echo("<p class='text-danger'>Invalid URL!</p>");
                }
        	}
        ?>
	</div>
</main>

</body>

</html>
