
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
	Western ID Number(WIN):<input type="text" name="win" class="email"> &nbsp;
	<br>
	<br>
	Match Number:<input type="text" name="match_number" class="age"> &nbsp;
	Attended? Yes<input type="radio" name="attendedY" class="age" value=1>
	 					No<input type="radio" name="attendedN" class="age" value=0>
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
$dbname = "roundnet";

$conn = mysqli_connect($servername, $username, $password, $dbname); //Connect to mySQL db

if($conn->connect_error){
	die("Connection Failed: " . mysqli_connect_error()); //If connection fails, output the error
}
if(isset($_POST['submit'])){
	/*Use mysqli_real_escape_string function to avoid SQL Injection security issues.*/
	$win = mysqli_real_escape_string($conn,$_POST['win']);
	$match_number = mysqli_real_escape_string($conn,$_POST['match_number']);
	if(isset($_POST['radio'])){
		$radio = 1;
	}
	else {
		$radio = 0;
	}
	/*Insert data into table*/
				$sql = "INSERT INTO attendance (win,match_number,attended)
							VALUES('$win','$match_number','$radio');";

	if($conn->query($sql) === True){
		echo "Data has been written successfully";
	}
	else{
		echo "Error writing data to table: " . $conn->error;
	}
}
	$sql = "SELECT * FROM attendance";
	$result = $conn->query($sql);
	if (mysqli_num_rows($result) > 0) {
    // output data of each row
		echo "<table>
					 <tr>
							<th>WIN ID</th>
							<th>Match Number</th>
							<th>Attended</th>
				   </tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
								<td>" . $row["win"]. "</td>
								<td>" . $row["match_number"]. "</td>
								<td>" . $row["attended"]. "</td>
						 </tr>";
    }
		echo "</table>";
} else {
    echo "0 results";
}

?>
<h2>Table needs formatting and modification/deletion ability</h2>
	<h3>For deletion and modification, create a form where user types in primary key, which gets turned into a prepared statement which in turn gets queried to the server</h3>
</center>
</body>
</div>
</html>
