<?php
$welcome = '';
$log = '';
session_start();
if ($_SESSION['id']) {

    $welcome .= ' <p class="logy"> Welcome ' . $_SESSION['name'] . '</p>';
    $log .= ' <button class="btn btn-outline-success"><a href="../../logout.php">Logout </a></button>';
} else {

    header("Location:../../index.php");


    exit;
}
//Connect to DB
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'jumia';
$conn = mysqli_connect($server, $user, $pass, $db);
if (!$conn) {
    echo mysqli_connect_error();
    exit;
}
//Select the user $_GET['id']
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$query = "DELETE FROM `books` WHERE `books`.`bookId`=" . $id . " LIMIT 1";
if (mysqli_query($conn, $query)) {
    header("Location: booklist.php");
    exit;
} else {
    //echo $query;
    echo mysqli_error($conn);
}
//Close the connection
mysqli_close($conn);
