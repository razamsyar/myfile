<?php 
	session_start();
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="Kuki Godam">
		<script src="https://code.jquery.com/jquery-3.4.1.slim.js" integrity="sha256-BTlTdQO9/fascB1drekrDVkaKd9PkwBymMlHOiG+qLI=" crossorigin="anonymous"></script>
		<title>Login</title>

		<!-- Bootstrap core CSS -->
		<link href="./bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="./style.css" rel="stylesheet">
	</head>
	<body class="text-center">
		<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<h2 class="text-center">Admin login</h2>
					</div>
					<div class="card-body">
						<form id="login-form" action="admin.php">
							<div class="mb-3">
								<label for="username" class="form-label">Username:</label>
								<input type="text" id="username" name="username" class="form-control" required>
							</div>
							<div class="mb-3">
								<label for="password" class="form-label">Password:</label>
								<input type="password" id="password" name="password" class="form-control" required>
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-primary">Login</button>
							</div>
						</form>
					</div>
		<?php 
			if(isset($_GET['username']) && isset($_GET['password'])){
				if($_GET['username'] === "admin" && $_GET['password'] === "REDACTED"){
					$_SESSION["admin"] = true;
					echo '<meta http-equiv="refresh" content="0;url=dashboard.php">';
				}
				else{
					echo "<h5 class='text-danger'>Wrong username or password!</h5>";
				}
			}
		?>
				</div>
<p class="mt-5 mb-3 text-muted">© Kuki.Godam, 2024</p>
			</div>
		</div>
	</div>
</body>
</html>
