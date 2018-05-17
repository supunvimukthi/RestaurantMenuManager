<?php

include ('DatabaseConnect.php');


$searchTxt = $_GET['search'];
echo $searchTxt;
$sql = "SELECT * FROM restaurants WHERE Name LIKE ' % {$searchTxt}% '";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);
echo $row['Name'];
while($row) {
    echo $row['Name'];  //This sends data back to the page
}


?>
