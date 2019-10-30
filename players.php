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
	<a href="index.php" class="button">Home</a> &nbsp; &nbsp;
	<a href="players.php" class="button">Players</a> &nbsp; &nbsp;
	<a href="forms.php" class="button">Form Lookup</a> &nbsp; &nbsp;
</nav>
<body id="wrapper">
	<br><br><br>
	<center>
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
	<input type="submit" name="submit" value="Add Player">
	&nbsp;
	<input type="submit" name="clear" value="Clear Data">
	<br><br><br>
	</form>
	<?php
		if(isset($_POST['clear'])) //When user hits clear data
			{
				$file = fopen("players.txt", "a"); //Open file to write
				ftruncate($file, 0); // Clear content to 0 bits
				fclose($file); //Close file
			}

		if(isset($_POST['submit'])) //When user hits submit
			{
				$name = $_POST['name']; //Declare vars
				$age = $_POST['age'];
				$email = $_POST['email'];
				$radio = $_POST['radio'];
				$forms = $_POST['forms'];

				$file = fopen("players.txt","a") or die("File non-existent or corrupted"); //Open text file
				$s = $name.",".$age.",".$email.",".$radio.",".$forms."\n"; //Declare value to be written to file
				fputs($file,$s) or die("Data could not be written to file"); //Write single line to file
				fclose($file); //Close file
			}

		/* THIS CREATES THE TABLE */

		 $myFile = "players.txt"; //File declared

		 $openFile = fopen($myFile, "r"); //Open file for read
		 echo "<table><tr><th>Name\t</th><th>Age\t</th><th>Email\t</th><th>Playstyle\t</th><th>Forms?\t</th>";
			if (file_exists($myFile)) //if file exists
		  {
		     while (!feof($openFile)) //while file pointer is not at end of file
		     {
		       $player = fgets($openFile); //get file contents, put them in $player
		       $element = explode(",", $player); //Explode on comma, store in $fileName
					 echo "<tr><td>$element[0]\t</td><td>$element[1]\t</td><td>$element[2]\t</td><td>$element[3]\t</td><td>$element[4]\t</td></tr>"; //Display the table
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
