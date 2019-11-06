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
$sql ="CREATE TABLE `attendance` (
 `win` varchar(9) NOT NULL,
 `date_attended` int(1) NOT NULL,
 PRIMARY KEY (`win`),
 CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`win`) REFERENCES `players` (`win`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8";
if ($conn->query($sql) === TRUE) {
    echo "Table attendance created successfully";
} else {
    echo "Error creating table: " . $conn->error;
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
    echo "Table games created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
$sql ="CREATE TABLE `membership` (
 `date` date NOT NULL,
 `win` varchar(9) NOT NULL,
 `transaction_id` varchar(5) NOT NULL,
 PRIMARY KEY (`transaction_id`),
 UNIQUE KEY `transaction_id` (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8";
if ($conn->query($sql) === TRUE) {
    echo "Table membership created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql ="CREATE TABLE `players` (
 `first_name` varchar(25) NOT NULL,
 `middle_initial` varchar(1) NOT NULL,
 `last_name` varchar(25) NOT NULL,
 `win` varchar(9) NOT NULL,
 `age` int(2) NOT NULL,
 `email` varchar(35) DEFAULT NULL,
 `street_address` varchar(50) NOT NULL,
 `city` varchar(25) NOT NULL,
 `state` varchar(20) NOT NULL,
 `zip` varchar(5) NOT NULL,
 `playstyle` varchar(8) NOT NULL,
 PRIMARY KEY (`win`),
 UNIQUE KEY `win` (`win`),
 CONSTRAINT `players_ibfk_1` FOREIGN KEY (`win`) REFERENCES `membership` (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8";
if ($conn->query($sql) === TRUE) {
    echo "Table players created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
 ?>
