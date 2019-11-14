
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
	<a href="index.php" class="button">Dashboard</a> &nbsp; &nbsp;
	<a href="players.php" class="button">Players</a> &nbsp; &nbsp;
	<a href="attendance.php" class="button">Attendance</a> &nbsp; &nbsp;
	<a href="forms.php" class="button">Form Lookup</a> &nbsp; &nbsp;
</nav>
<body id="wrapper">
	<br><br><br>
	<center>
		<div class="darkPanel">
	<form action="#" method ="post">
	First Name:<input type="text" name="first_name" class="name"> &nbsp;
	Middle Initial:<input type="text" name="middle_initial" class="middleinit"> &nbsp;
	Last Name:<input type="text" name="last_name" class="name"> &nbsp;
	<br>
	Western ID Number(WIN):<input type="text" name="win" class="email"> &nbsp;
	<br>
	<br>
	Match Number:<input type="text" name="match_number" class="age"> &nbsp;
	Attended? Enter 1 for yes or 0 for no:<input type="text" name="attended" class="age"> &nbsp;
	<input type="submit" name="submit" value="Add Record" class="submitButton">
	&nbsp;
	<input type="submit" value="Clear Data" name="clear" class="submitButton">
	<br>
	<br>
	</form>
</div>
<br>

<?php
/*This file uses MySQL and PHP to track player attendance.*/
/*Login to mySQL db*/
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "roundnet_test";

$conn = mysqli_connect($servername, $username, $password, $dbname); //Connect to mySQL db

if($conn->connect_error){
	die("Connection Failed: " . mysqli_connect_error()); //If connection fails, output the error
}
if(isset($_POST['submit'])){
	/*Use mysqli_real_escape_string function to avoid SQL Injection security issues.*/
	$first_name = mysqli_real_escape_string($conn,$_POST['first_name']);
	$middle_initial = mysqli_real_escape_string($conn,$_POST['middle_initial']);
	$last_name = mysqli_real_escape_string($conn,$_POST['last_name']);
	$win = mysqli_real_escape_string($conn,$_POST['win']);
	$match_number = mysqli_real_escape_string($conn,$_POST['match_number']);
	$attended = mysqli_real_escape_string($conn, $_POST['attended']);
	/*Insert data into table*/
	$sql = "INSERT INTO attendance (win,match_number,attended, first_name,middle_initial,last_name)
						VALUES('$win','$match_number','$attended','$first_name','$middle_initial','$last_name');";
	if($conn->query($sql) === True){
		echo "Data has been written successfully";
	}
	else{
		echo "Error writing data to table: " . $conn->error;
	}
}
//What would the primary key be in this table?
//Need to write table code here
?>
</center>
</body>
</div>
</html>
