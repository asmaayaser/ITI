<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'jumia';
$conn = mysqli_connect($server, $user, $pass, $db);
if (!$conn) {
     echo mysqli_connect_error();
     exit;
}
// Do the operation ( SELECT , INSERT , ....
$query = " SELECT * FROM `user` ";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {
     echo " Id : " . $row['userId'] . " <br /> ";
     echo " Name : " . $row['userName'] . " <br /> ";
     echo " Email : " . $row['userEmail'] . " <br /> ";
     echo str_repeat(" - ", 50) . " <br /> ";
}
// Close the connection
mysqli_free_result($result);
mysqli_close($conn);
