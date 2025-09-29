<?php
//Create connection
include 'connect.php';

// sql to create table
$sql = "CREATE TABLE users(
id INT(11) NOT NULL AUTO_INCREMENT,
username VARCHAR(50) NOT NULL,
password VARCHAR(255) NOT NULL,
fullname VARCHAR(50) NOT NULL,
reg_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (id), 
UNIQUE (username)
)";


if ($conn->query($sql) === TRUE) {
  echo "Table products users successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>