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

//connect to database
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'jumia';
$conn = mysqli_connect($server, $user, $pass, $db);
if (!$conn) {
    echo mysqli_connect_error();
    exit;
}

//selectt all users
$query = "SELECT * FROM `books`";

//search by the name or the emil
if (isset($_GET['search'])) {
    $search = mysqli_escape_string($conn, $_GET['search']);
    $query .= " WHERE `books`.`bookTitle` LIKE '%" . $search . "%' OR `books`.`Author` LIKE '%" . $search . "%'";
}
$result = mysqli_query($conn, $query);

?>
<html>

<head>
    <title> List Users </title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style1.css">

    <style>
        body {
            background-color: #2c3034;
        }
    </style>
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php">library</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../users/list.php">Users List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="booklist.php">Books List</a>
                    </li>
                    </li>
                </ul>
                <form method="GET" class="d-flex d-flex1" role="search">
                    <input class="form-control form-control1" type="text" name="search" placeholder=" Enter { BookTitle } or { Author } to Search " />
                    <input class="btn btn-outline-success" type="submit" value="Search">
                </form>
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <?php echo $welcome; ?>
                    </li>
                    <li class="nav-item">
                        <?php echo $log; ?>
                    </li>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Display a table containg all users-->
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th> Id </th>
                <th> Title </th>
                <th> Info </th>
                <th>Img</th>
                <th> Author </th>
                <th> Submission Date </th>
                <th> Actions </th>
            <tr>
                <thead>
                    <?php
                    // Loop on the rowset
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td> <?= $row['bookID'] ?> </td>
                            <td> <?= $row['bookTitle'] ?> </td>
                            <!-- <td> <?= substr($row['bookInfo'], 0, 150); ?> </td> -->
                            <td> <?= $row['bookInfo'] ?> </td>
                            <td><?php if ($row['bookImg']) { ?><img src="../../uploads/<?= $row['bookImg'] ?>" style="width: 100px; " /> <?php } else { ?> <img src="../../uploads/noimage.png?>" style="width: 100px; height: 100px; border-radius:50px" /> <?php } ?></td>
                            <td> <?= $row['Author']  ?> </td>

                            <td> <?= $row['submissionDate']  ?> </td>
                            <td> <a href="edit.php?id=<?= $row['bookID'] ?> "><button type='button' class='btn btn-warning btn1'>Edit</button> </a> <a href="delete.php?id=<?= $row['bookID'] ?>"> <button type='button' class='btn btn-danger btn1'>Delete</button></a> </td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                <tfoot>
                    <tr>
                        <td colspan=" 3 " style=" text-align : center "> <?= mysqli_num_rows($result) ?> Books</td>
                        <td colspan=" 4 " style=" text-align : center "> <a href="add.php"> <button type='button' class='btn btn-secondary add'>Add Book</button> </a> </td>
                    </tr>
                </tfoot>
    </table>
    <script src="../../js/jquery-3.6.1.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

</body>

</html>