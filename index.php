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
				<strong><center>Number of Registered Members</center></strong>
				<br>
				<strong><center><?php echo $lines ?></center></strong>
				<br>
			</div>
			<div class="column">
				<strong><center>Number of Forms Uploaded</center></strong>
				<br>
				<strong><center><?php echo $num_files ?></center></strong>
				<br>
			</div>
			<div class="column">
				<strong><center>System Status</center></strong>
				<strong><center>&#9989;Power<br>&#9989;File System<br>&#9989;Player Database</center></strong>
				<br><br>
			</div>
		</div>

</body>
</div>
</html>
