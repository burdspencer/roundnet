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
<a href="index.php"><img src="roundnet.jpg" alt="roundnet logo" height="200" width="200"></a><h1>Roundnet @ WMU</h1>
</header>
<nav>
	<a href="index.php" class="button">Dashboard</a> &nbsp; &nbsp;
	<a href="players.php" class="button">Players</a> &nbsp; &nbsp;
	<a href="attendance.php" class="button">Attendance</a> &nbsp; &nbsp;
	<a href="forms.php" class="button">Form Lookup</a> &nbsp; &nbsp;
</nav>
<body>
	<center>
		<br><br><br>
		<div class="form">
			<form action="#" method="post" enctype="multipart/form-data">
		  Select file to upload:<br>
		  <input type="file" name="fileToUpload" id="fileToUpload" class="submitButton">
			<br><br>
		  <input type="submit" value="Upload Form" name="submit" class="submitButton">
			<br><br>
			Click File Name to view or click Path to download
			<br><br>
			<?php
				if(isset($_POST['submit'])){
				  $target_dir = "uploads";
				  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				  $uploadOk = 1;
				  $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				  // Check if file already exists
				  if (file_exists($target_file)) {
				      echo "Sorry, file already exists.";
				      $uploadOk = 0;
				  }
				  // Check file size
				  if ($_FILES["fileToUpload"]["size"] > 50000000) {
				      echo "Sorry, your file is too large.";
				      $uploadOk = 0;
				  }
				  // Check if $uploadOk is set to 0 by an error
				  if ($uploadOk == 0) {
				      echo "Sorry, your file was not uploaded.";}
				  // if everything is ok, try to upload file
				  else {
				      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				          echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";}
				       else {
				          echo "Sorry, there was an error uploading your file.";
				      }
				  }
				}

				opendir('uploads');//Open directory handle

				$fileArray = scandir('uploads');//Returns array containing filenames and paths
				echo "<table class='fileTable'><tr><th class='fileTable'>File Name\t</th><th class='fileTable'>Path\t</th></tr>";
				foreach($fileArray as $file) {
					  echo "<tr class='fileTable'>\n";
				    echo "<td class='fileTable'><a href='/cis/roundnet/uploads/{$file}'>{$file}</td>\n";
				    echo "<td class='fileTable'><a href='path/to/file'>/uploads/$file</td>\n";
				    echo "</tr>\n";
  			}
				echo"</table>";
				closedir(); //Close directory handle. If no resource is specified, the last opendir is assumed.
			?>

		</div>
	</center>
</body>
</div>
</html>
