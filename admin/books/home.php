<?php
session_start();
$welcome = '';
$log = '';
if ($_SESSION['id']) {

    $welcome .= ' <p class="logy"> Welcome ' . $_SESSION['name'] . '</p>';
    $log .= ' <button class="btn btn-outline-success"><a href="../../logout.php">Logout </a></button>';
} else {

    header("Location:../../index.php");


    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style1.css">

    <style>
        .card img {
            height: 370px;

        }

        .card {
            float: left;
            margin: 22px !important;
            width: 17% !important;
            height: 600px !important;
        }


        /* body {
            background-color: #2c3034;
        } */
    </style>

    <title>Home</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../books/home.php">library</a>
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


    <?php
    // Connect to DB
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'jumia';
    $conn = mysqli_connect($server, $user, $pass, $db);


    //selectt all users
    $query = "SELECT * FROM `books`";

    //search by the name or the emil
    if (isset($_GET['search'])) {
        $search = mysqli_escape_string($conn, $_GET['search']);
        $query .= " WHERE `books`.`bookTitle` LIKE '%" . $search . "%' OR `books`.`Author` LIKE '%" . $search . "%'";
    }
    $results = $conn->query($query);
    $data = '';

    while ($row = $results->fetch_assoc()) {
        $data .= '<div class="card" style="width: 18rem;">
        <img class="imgs101" src="../../uploads/' . $row['bookImg'] . '" class="card-img-top" >
        <div class="card-body">
        <h5 class="card-title">' . $row['bookTitle'] . '</h5>
        <p class="card-text">' . substr($row['bookInfo'], 0, 130) . '...</p>

        <a  href="details.php?id=' . $row['bookID'] . '" class="btn btn-primary">Read More</a>

        </div>
        </div>';
    }
    echo $data;
    ?>



    <script src="../../js/jquery-3.6.1.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

</body>

</html>