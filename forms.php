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
			<form action="upload.php" method="post" enctype="multipart/form-data">
		  Select file to upload:
		  <input type="file" name="fileToUpload" id="fileToUpload">
		  <input type="submit" value="Upload File" name="submit">
		</div>
	</center>
</body>
</div>
</html>