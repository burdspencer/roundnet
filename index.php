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
	<a href="index.php" class="button">Home</a> &nbsp; &nbsp;
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
			<div class="column">
				Need widgets here, maybe repurpose for Membership table page?
			</div>
			<div class="column">
				Need widgets here, maybe repurpose for Membership table page?
			</div>
			<div class="column">
				Need widgets here, maybe repurpose for Membership table page?
			</div>
		</div>

</body>
</div>
</html>
