<?php
$servername = "db4free.net:3306";
$user = "swimming";
$password = "SwimmingR";
$dbname = "swimming";

// Create connection
$conn = new mysqli($servername, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

