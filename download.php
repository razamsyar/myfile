<?php
	if(isset($_POST['name']) && isset($_POST['id'])){
		$conn = new mysqli("localhost","admin","admin","myfile_db");
		if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT * FROM files WHERE fileid=?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $_POST['id']);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();

		if($row){
			// Prevent directory traversal
			$filepath = realpath("/files/".$row["filename"]);
			if(strpos($filepath, "/files") !== 0){
				die("<h5 class='text-danger'>HACKER ALERT!!</h5>");
			}
			if (file_exists($filepath)) {
				header('Content-Description: File Download');
				header('Content-Type: text/html');
				header('Content-Disposition: attachment; filename="' . $_POST["name"] . '"');
				header('Expires: 0');
				header('Cache-Control: must-revalidate');
				header('Pragma: public');
				header('Content-Length: ' . filesize($filepath));
				flush(); // Flush system output buffer
				readfile($filepath);
				die();
			} else {
			  http_response_code(404);
			  die();
			}
		}else{
			http_response_code(404);
			die();
		}
	}
?>