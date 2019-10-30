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
<a href="index.html"><img src="roundnet.jpg" alt="roundnet logo" height="200" width="200"></a><h1>Roundnet @ WMU</h1>
</header>
<nav>
	<a href="index.html" class="button">Home</a> &nbsp; &nbsp;
	<a href="players.php" class="button">Players</a> &nbsp; &nbsp;
	<a href="forms.html" class="button">Form Lookup</a> &nbsp; &nbsp;
</nav>
<body>
	<br>
	<br>
	<br>
	<center>
	<form action="#" method ="post">
	Name:<input type="text" name="name"> &nbsp;	Age:<input type="text" name="age"> <br><br>
	Email:<input type="text" name="email"> &nbsp;<br>
	<br>
	Playstyle:<br>
	<input type="radio" name="radio" value="Casual">Casual
	<input type="radio" name="radio" value="Hardcore">Hardcore
	<br>
	<br>
	<input type="submit" name="submit" value="Add Player"><br>
	<br>
	<input type="submit" name="clear" value="Clear Data">
	<br>
	<br>
	<br>
	</form>
	<?php
		if(isset($_POST['submit'])) //When user hits clear data || THIS IS NOT WORKING AT THIS TIME
		{
			$file = fopen("players.txt", "a"); //Open file to write || Possible issue with file open argument?
			ftruncate($file, 0); // Clear content to 0 bits
			fclose($file); //Close file
		}
		if(isset($_POST['submit'])) //When user hits submit
		{
			$name = $_POST['name']; //Declare vars
			$age = $_POST['age'];
			$email = $_POST['email'];
			$radio = $_POST['radio'];

			$file = fopen("players.txt","a") or die("File non-existent or corrupted"); //Open text file
			$s = $name.",".$age.",".$email.",".$radio."\n"; //Declare value to be written to file
			fputs($file,$s) or die("Data could not be written to file"); //Write single line to file

			fclose($file); //Close file
		}

		/*VV THIS CREATES THE TABLE VV*/

		 $myFile = "players.txt"; //File declared

		 $openFile = fopen($myFile, "r"); //Open file for read
		 echo "<table>";
		 echo "<tr>";
		 echo "<th>";
		 	echo "Name\t";
		 echo "</th>";
		 echo "<th>";
		 	echo "Age\t";
		 echo "</th>";
		 echo "<th>";
		 	echo "Email\t";
		 echo "</th>";
		 echo "<th>";
		 	echo "Playstyle\t";
		 echo "</th>";
			if (file_exists($myFile)) //if file exists
		  {
		     while (!feof($openFile)) //while file pointer is not at end of file
		     {
		       $player = fgets($openFile); //get file contents, put them in $player
		       $fileName = explode(",", $player); //Explode on comma, store in $fileName
					 echo "<tr>";
					 echo "<td>";
					 echo "$fileName[0]\t";
					 echo"</td>";
					 echo "<td>";
					 echo "$fileName[1]\t";
					 echo"</td>";
					 echo "<td>";
					 echo "$fileName[2]\t";
					 echo"</td>";
					 echo "<td>";
					 echo "$fileName[3]\t";
					 echo"</td>";
					 echo "</tr>";
		     }
		      fclose($openFile);
		  }
		  else
		  {
		    echo "File doesn't exists!";
		  }
			echo "</table>";
	?>
</center>
</body>
</div>
</html>
