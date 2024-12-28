<?php
	if(isset($_FILES["fileToUpload"])){
		
		$target_file = '/files/'. basename($_FILES["fileToUpload"]["name"]);

		$pathinfo = pathinfo($target_file);
		// Prevent unrestricted file upload
		switch (strtolower($pathinfo["extension"])) {
			case("php"):
			case("php2"):
			case("php3"):
			case("php4"):
			case("php5"):
			case("php6"):
			case("php7"):
			case("phps"):
			case("pht"):
			case("phtm"):
			case("phtml"):
			case("pgif"):
			case("shtml"):
			case("htaccess"):
			case("phar"):
			case("inc"):
			case("hphp"):
			case("ctp"):
			case("module"):
			case("html"):
				echo "<h5 class='text-danger'>HACKER ALERT!!!</h5>";
				die();
			default:
				break;
		}

		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			$conn = new mysqli("localhost","admin","admin","myfile_db");
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			$sql = "INSERT INTO files (filename) VALUES (?)";
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("s", basename($_FILES["fileToUpload"]["name"]));
			$result = $stmt->execute();
			if($result){
				$sql = "SELECT * FROM files WHERE id=?";
				$stmt = $conn->prepare($sql);
				$id = $conn->insert_id;
				$stmt->bind_param("i", $id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				if($row){
					echo "<h5 class='text-success'>The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.</h5>";
					echo "<p>Here is the <a href='/view.php?name=".htmlentities($row["filename"])."&id=".$row["fileid"]."'>download link</a></p>";
				}
			}else{
				echo "<h5 class='text-danger'>Database error</h5>";
			}
		} else {
			echo "<h5 class='text-danger'>Sorry, there was an error uploading your file.</h5>";
		}
	}
?>
