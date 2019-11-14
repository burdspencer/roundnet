<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<title>Spikeball Information System</title>
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
	<?php
		$directory = "uploads";
		$fileArray = scandir($directory);
		$num_files = count($fileArray) - 2;

		$lines = count(file("players.txt"));
 ?>
 <br><br><br>
		<div class="row">
			<div class="column"><br>
				&nbsp;&nbsp;<a href="index.php" class="button">Initialize</a><br><br>
				&nbsp; Do not press unless Database has not been created.
			</div>
			<div class="column">
				Possible box for data insertion into Membership table?
			</div>
			<div class="column">
				Maybe use this one for the display table?
			</div>
		</div>

</body>
</div>
</html>
