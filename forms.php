<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<title>Forms - Spikeball Information System</title>
<meta charset="utf-8">
<link rel="stylesheet" href="roundnet.css">
</head>
<div id="wrapper">
<header id="center">
<a href="index.html"><img src="roundnet.jpg" alt="roundnet logo" height="200" width="200"></a><h1>Roundnet @ WMU</h1>
</header>
<nav>
	<a href="index.php" class="button">Home</a> &nbsp; &nbsp;
	<a href="players.php" class="button">Players</a> &nbsp; &nbsp;
	<a href="forms.php" class="button">Form Lookup</a> &nbsp; &nbsp;
</nav>
<body>
	<center>
		<br>
		<br>
		<br>
		<div class="form">
			<form action="#" method="post" enctype="multipart/form-data">
		  Select file to upload:
		  <input type="file" name="fileToUpload" id="fileToUpload">
		  <input type="submit" value="Upload File" name="submit">

			<?php
				$target_dir = "uploads/";
				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				echo "<br>";
				echo "<br>";
				echo "target file = $target_file"; //Debug
				$uploadOk = 1; //Default state
				$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); // Check file type || Might remove this?
				if (file_exists($target_file)) { //Check if file already exists
				    echo "Sorry, file already exists.";
				    $uploadOk = 0;
				}
				if ($_FILES["fileToUpload"]["size"] > 50000000) { //Limit the file size to 50KB to protect webserver
				    echo "Sorry, your file is too large.";
				    $uploadOk = 0;
				}
				if ($uploadOk == 0) { //If any errors occur, stop upload.
    				echo "Sorry, your file was not uploaded.";}
				else{
					if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
						echo "The file". basename($_FILES["fileToUpload"]["name"])." has been uploaded.";}
						echo "Sorry, there was an error uploading your file.";
				}
			?>

		</div>
	</center>
</body>
</div>
</html>
