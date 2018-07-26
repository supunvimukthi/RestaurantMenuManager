<?php
$servername = "sql12.freemysqlhosting.net";
$user = "sql12249221";
$password = "jal2nkFLWa";
$dbname = "sql12249221";

// Create connection
$conn = new mysqli($servername, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

