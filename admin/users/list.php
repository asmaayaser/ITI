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
$query = " SELECT * FROM `user` ";

//search by the name or the emil
if (isset($_GET['search'])) {
    $search = mysqli_escape_string($conn, $_GET['search']);
    $query .= " WHERE `user`.`userName` LIKE '%" . $search . "%' OR `user`.`userEmail` LIKE '%" . $search . "%'";
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
            <a class="navbar-brand" href="../books/home.php">library</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="list.php">Users List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../books/booklist.php">Books List</a>
                    </li>
                    </li>
                </ul>
                <form method="GET" class="d-flex d-flex1" role="search">
                    <input class="form-control form-control1" type="text" name="search" placeholder=" Enter { Name } or { Email } to Search " />
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
                <th> Name </th>
                <th> Email </th>
                <th>Avatar</th>
                <th> Admin </th>
                <th> Actions </th>
            <tr>
                <thead>
                    <?php
                    // Loop on the rowset
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td> <?= $row['userId'] ?> </td>
                            <td> <?= $row['userName'] ?> </td>
                            <td> <?= $row['userEmail'] ?> </td>
                            <td><?php if ($row['Avatar']) { ?><img src="../../uploads/<?= $row['Avatar'] ?>" style="width: 100px; height: 100px; border-radius:50px" /> <?php } else { ?> <img src="../../uploads/noimage.png?>" style="width: 100px; height: 100px; border-radius:50px" /> <?php } ?></td>
                            <td> <?= ($row['Admin']) ? ' Yes ' : ' No ' ?> </td>
                            <td> <a href="edit.php?id=<?= $row['userId'] ?> "><button type='button' class='btn btn-warning btn1'>Edit</button> </a> <a href="delete.php?id=<?= $row['userId'] ?>"> <button type='button' class='btn btn-danger btn1'>Delete</button></a> </td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                <tfoot>
                    <tr>
                        <td colspan=" 3 " style=" text-align : center "> <?= mysqli_num_rows($result) ?> users</td>
                        <td colspan=" 4 " style=" text-align : center "> <a href="add.php"> <button type='button' class='btn btn-secondary add'>Add User</button> </a> </td>
                    </tr>
                </tfoot>
    </table>
    <script src="../../js/jquery-3.6.1.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

</body>

</html>