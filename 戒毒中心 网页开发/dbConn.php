<?php
 $host = "localhost";
 $dbUsername = "root";
 $dbPassword = "";
 $dbname = "ee5";
 //create connection
 $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
 if(!$conn)
 {
    die("Connection failed: " . mysqli_connect_error());
 }
?>