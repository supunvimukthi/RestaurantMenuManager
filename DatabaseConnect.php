<?php
$servername = "localhost";
$user = "root";
$password = "";
$dbname = "restaurant";

// Create connection
$conn = new mysqli($servername, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

