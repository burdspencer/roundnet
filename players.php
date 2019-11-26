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
	Age:<input type="text" name="age" class="age"> <br><br>
	Email:<input type="text" name="email" class="email"> &nbsp;
	Western ID Number(WIN):<input type="text" name="win" class="email"> &nbsp;
	<br>
	<br>
	Playstyle:<br>
	<input type="radio" name="playstyle" value="Casual">Casual
	<input type="radio" name="playstyle" value="Hardcore">Hardcore
	<br><br>
	Phone Number:<input type="text" name="phone" class="email"> &nbsp;
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
	<input type="submit" value="Show Ascending" name="ascend" class="submitButton">
	<input type="submit" value="Show Descending" name="descend" class="submitButton">
	<br>
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
$tabledisplayed = false;
$conn = mysqli_connect($servername, $username, $password, $dbname); //Connect to mySQL db

if($conn->connect_error){
	die("Connection Failed: " . mysqli_connect_error()); //If connection fails, output the error
	}
if(isset($_POST['submit'])){
	/*Use mysqli_real_escape_string function to avoid SQL Injection security issues.*/
	$first_name = mysqli_real_escape_string($conn,$_POST['first_name']);
	$middle_initial = mysqli_real_escape_string($conn,$_POST['middle_initial']);
	$last_name = mysqli_real_escape_string($conn,$_POST['last_name']);
	$age = mysqli_real_escape_string($conn,$_POST['age']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$win = mysqli_real_escape_string($conn,$_POST['win']);
	$playstyle = mysqli_real_escape_string($conn,$_POST['playstyle']);
	$phone = mysqli_real_escape_string($conn,$_POST['phone']);
	$forms = mysqli_real_escape_string($conn,$_POST['forms']);
	/*Insert data into table*/
	$sql = "INSERT INTO players (first_name,middle_initial,last_name,age,email,win,playstyle,phone,forms)
						VALUES('$first_name','$middle_initial','$last_name','$age','$email','$win','$playstyle','$phone','$forms');";
	if($conn->query($sql) === True){
		echo "Data has been written successfully";
	}
	else{
		echo "<script>alert(Error: $conn->error);</script>";
	}
}

if (isset($_POST['ascend'])){ //Sorts table in ascending order by WIN
$tabledisplayed = true;
$sql = "SELECT * FROM players ORDER BY win asc";
$result = $conn->query($sql);
if (mysqli_num_rows($result) > 0) {
	// output data of each row
	echo "<table>
				 <tr>
						<th>First Name</th>
						<th>Middle Initial</th>
						<th>Last Name</th>
						<th>WIN</th>
						<th>Age</th>
						<th>Email</th>
						<th>Playstyle</th>
						<th>Phone</th>
						<th>Forms</th>
				 </tr>";
	while($row = mysqli_fetch_assoc($result)) {
			echo "<tr>
							<td>" . $row["first_name"]. "</td>
							<td>" . $row["middle_initial"]. "</td>
							<td>" . $row["last_name"]. "</td>
							<td>" . $row["win"]. "</td>
							<td>" . $row["age"]. "</td>
							<td>" . $row["email"]. "</td>
							<td>" . $row["playstyle"]. "</td>
							<td>" . $row["phone"]. "</td>
							<td>" . $row["forms"]. "</td>
							</tr>";
	}
	echo "</table>";
} else {
	echo "0 results";
}
}
if (isset($_POST['descend'])){ //Sorts table in descending order by WIN
$tabledisplayed = true;
$sql = "SELECT * FROM players ORDER BY win desc";
$result = $conn->query($sql);
if (mysqli_num_rows($result) > 0) {
	// output data of each row
	echo "<table>
				 <tr>
						<th>First Name</th>
						<th>Middle Initial</th>
						<th>Last Name</th>
						<th>WIN</th>
						<th>Age</th>
						<th>Email</th>
						<th>Playstyle</th>
						<th>Phone</th>
						<th>Forms</th>
				 </tr>";
	while($row = mysqli_fetch_assoc($result)) {
			echo "<tr>
							<td>" . $row["first_name"]. "</td>
							<td>" . $row["middle_initial"]. "</td>
							<td>" . $row["last_name"]. "</td>
							<td>" . $row["win"]. "</td>
							<td>" . $row["age"]. "</td>
							<td>" . $row["email"]. "</td>
							<td>" . $row["playstyle"]. "</td>
							<td>" . $row["phone"]. "</td>
							<td>" . $row["forms"]. "</td>
							</tr>";
	}
	echo "</table>";
} else {
	echo "0 results";
}
}
/*Selectively delete data from table*/
if (isset($_POST['clear'])){
	$win = mysqli_real_escape_string($conn,$_POST['win']);
	$sql = "DELETE FROM players WHERE win='$win'";
	if($conn->query($sql) === True){
		echo "Data deleted successfully.";
	}
	else{
		echo "Error deleting data from table: " . $conn->error;
	}}
/*Selectively edit data from table*/
if (isset($_POST['edit'])){
	$win = mysqli_real_escape_string($conn,$_POST['win']);
	$sql = "SELECT FROM players WHERE win='$win'";
	if (!$_POST['first_name'] == $row["first_name"])
		{$row["first_name"] = $_POST['first_name'];}
	if (!$_POST['middle_initial'] == $row["middle_initial"])
		{$row["middle_initial"] = $_POST['middle_initial'];}
	if (!$_POST['last_name'] == $row["last_name"])
		{$row["last_name"] = $_POST['last_name'];}
	if (!$_POST['win'] == $row["win"])
		{$row["win"] = $_POST['win'];}
	if (!$_POST['age'] == $row["age"])
		{$row["age"] = $_POST['age'];}
	if (!$_POST['email'] == $row["email"])
		{$row["email"] = $_POST['email'];}
	if (!$_POST['playstyle'] == $row["playstyle"])
		{$row["playstyle"] = $_POST['playstyle'];}
	if (!$_POST['phone'] == $row["phone"])
		{$row["phone"] = $_POST['phone'];}
	if (!$_POST['forms'] == $row["forms"])
	{$row["forms"] = $_POST['forms'];}

	if($conn->query($sql) === True){
		echo "Data altered successfully.";
	}
	else{
		echo "Error altering data in table: " . $conn->error;
	}}
?>
</center>
</body>
</div>
</html>
