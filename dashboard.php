<?php
	session_start();
	if (!isset($_SESSION["admin"])){
		echo '<meta http-equiv="refresh" content="0;url=admin.php">';
		die();
	}
	
	function humanFileSize($size,$unit="") {
		if( (!$unit && $size >= 1<<30) || $unit == "GB")
		return number_format($size/(1<<30),2)."GB";
		if( (!$unit && $size >= 1<<20) || $unit == "MB")
		return number_format($size/(1<<20),2)."MB";
		if( (!$unit && $size >= 1<<10) || $unit == "KB")
		return number_format($size/(1<<10),2)."KB";
		return number_format($size)." bytes";
	}
?>
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
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="dashboard.php">Dashboard</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="logout.php">Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	 <div class="container mt-5">

		<table class="table">
			<thead>
				<tr>
					<th>File Name</th>
					<th>Size</th>
					<th>Date</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$basepath = "/files/";
					$conn = new mysqli("localhost","admin","admin","myfile_db");
			        if ($conn->connect_error) {
			            die("Connection failed: " . $conn->connect_error);
			        }
					$sql = "SELECT fileid, filename FROM files";
			        $result = $conn->query($sql);
			        
			      	while ($row = $result->fetch_row()) {
					    echo "<tr>";
						echo "<td><a href='view.php?name=".urlencode($row[1])."&id=".urlencode($row[0])."'>".htmlentities($row[1])."</a></td>";
						echo "<td>".htmlentities(humanFileSize(filesize('/files/'.$row[1])))."</td>";
						echo "<td>".htmlentities(date("F d Y H:i:s.",filemtime('/files/'.$row[1])))."</td>";
						echo "<td><a href=\"javascript:alert('Coming Soon!!')\">🗑️</a></td>";
						echo "</tr>";
					}
					
				?>
			</tbody>
		</table>
	</div>


</body>

</html>
