<?php
$servername = "sql12.freemysqlhosting.net";
$user = "sql12238020";
$password = "5mKjj9L3rV";
$dbname = "sql12238020";

// Create connection
$conn = new mysqli($servername, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

