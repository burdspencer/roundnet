<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<title> Players - Spikeball Information System</title>
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
<body id="wrapper">
	<br><br><br>
	<center>
		<div class="darkPanel">
	<form action="#" method ="post">
	Name:<input type="text" name="name" class="name"> &nbsp;	Age:<input type="text" name="age" class="age"> <br><br>
	Email:<input type="text" name="email" class="email"> &nbsp;<br>
	<br>
	Playstyle:<br>
	<input type="radio" name="radio" value="Casual">Casual
	<input type="radio" name="radio" value="Hardcore">Hardcore
	<br><br>
	Forms Submitted:<br>
	<input type="radio" name="forms" value="Not Submitted">Not Submitted
	<input type="radio" name="forms" value="Submitted">Submitted
	<br><br>
	<input type="submit" name="submit" value="Add Player" class="submitButton">
	&nbsp;
	<input type="submit" value="Clear Data" name="clear" class="submitButton">
	<br>
	<br>
	</form>
</div>
<br>

<?php
/*Login to mySQL db*/
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "roundnet";

$conn = mysqli_connect($servername, $username, $password, $dbname); //Connect to mySQL db

if($conn->connect_error){
	die("You made it to line 53: " . mysqli_connect_error()); //If connection fails, output the error
}
else{
echo "Connected Successfully";
}
//Write each user form entry to database
//Output Players table in proper HTML form
?>
</center>
</body>
</div>
</html>
