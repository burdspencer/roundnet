<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "roundnet_test";
//Create connection
$conn = new mysqli($servername, $username, $password, $dbname); //Something happening here with the password
//Check connection for error
if($conn->connect_error){
  die("Connection failed: " . $conn->connect_error);
}

/*Create tables in SQL db*/
$sql ="CREATE TABLE `membership` (
 `date` date NOT NULL,
 `win` varchar(9) NOT NULL,
 `transaction_id` varchar(5) NOT NULL,
 PRIMARY KEY (`transaction_id`),
 UNIQUE KEY `transaction_id` (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

if ($conn->query($sql) === TRUE) {
    echo "\nTable membership created successfully";
} else {
    echo "\nError creating table: " . $conn->error;
}
$sql = "CREATE TABLE `players` (
 `first_name` varchar(25) NOT NULL,
 `middle_initial` varchar(1) NOT NULL,
 `last_name` varchar(25) NOT NULL,
 `win` varchar(9) NOT NULL,
 `age` int(2) NOT NULL,
 `email` varchar(35) NOT NULL,
 `playstyle` varchar(8) NOT NULL,
 `phone` varchar(10) NOT NULL,
 PRIMARY KEY (`win`),
 UNIQUE KEY `win` (`win`),ENGINE=InnoDB DEFAULT CHARSET=utf8";
if($conn->query($sql) === TRUE){
  echo "\nTable Players created successfully";
} else {
  echo "\nError creating table: " . $conn->error;
}
$sql ="CREATE TABLE `attendance` (
 `win` varchar(9) NOT NULL,
 `match_number` varchar(3) NOT NULL,
 `first_name` varchar(20) NOT NULL,
 `middle_initial` varchar(1) NOT NULL,
 `last_name` varchar(20) NOT NULL,
 PRIMARY KEY (`win`),
 CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`win`) REFERENCES `players` (`win`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

if ($conn->query($sql) === TRUE) {
    echo "\nTable attendance created successfully";
} else {
    echo "\nError creating table: " . $conn->error;
}

$sql ="CREATE TABLE `games` (
 `match_num` varchar(3) NOT NULL,
 `date` date NOT NULL,
 `location` varchar(40) NOT NULL,
 `match_result` varchar(4) NOT NULL,
 PRIMARY KEY (`match_num`),
 UNIQUE KEY `match_num` (`match_num`),
 CONSTRAINT `games_ibfk_1` FOREIGN KEY (`match_num`) REFERENCES `attendance` (`win`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

if ($conn->query($sql) === TRUE) {
    echo "\nTable games created successfully";
} else {
    echo "\nError creating table: " . $conn->error;
}
 ?>
