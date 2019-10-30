<?php
if(isset)($_POST['submit'])
{
	$name = $_POST['name'];
	$age = $_POST['age'];
	
	$file = fopen("players.txt","w+") or die("File invalid"); //Create and open text file
	
	$s = $name.",".$age."\n";
	fputs($file,$s) or die("Data could not be written to file"); //Write single line to file
	
	fclose($file); //Close file
}
?>
<center>
<form action="#" method ="post">
Name:<input type="text" name="name"> <br>
Age:<input type="text" name="age"> <br>
<input type="submit" name="submit" value="Add Player"><br>
</form>
</center>