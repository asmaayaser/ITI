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
$error_fields = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validation
    if (!(isset($_POST['name']) && !empty($_POST['name']))) {
        $error_fields[] = "name";
    }
    if (!(isset($_POST['email']) && filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL))) {
        $error_fields[] = "email";
    }
    if (!(isset($_POST['password']) && strlen($_POST['password']) > 5)) {
        $error_fields[] = "password";
    }

    if (!$error_fields) {
        // Connect to DB
        $server = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'jumia';
        $conn = mysqli_connect($server, $user, $pass, $db);
        if (!$conn) {
            echo mysqli_connect_error();
            exit;
        }

        // Escape any sepcial characters to avoid SQL Injection
        $name = mysqli_escape_string($conn, $_POST['name']);
        $email = mysqli_escape_string($conn, $_POST['email']);
        $password = Sha1($_POST['password']);
        $admin = (isset($_POST['admin'])) ? 1 : 0;
        $Avatar = $_FILES['Avatar'];
        $Avatar_temp = $_FILES['Avatar']['tmp_name'];
        $Avatar_name = $_FILES['Avatar']['name'];
        move_uploaded_file($Avatar_temp, 'C:\xampp\htdocs\ITI\uploads\\' . $Avatar_name);
        // Insert the data
        $query = " INSERT INTO `user` ( `userName` ,`userEmail` , `userPass` , `Avatar`,`Admin` ) VALUES (  '" . $name . "','" . $email . "' , '" . $password . "' ,'" . $Avatar_name . "','" . $admin . "' ) ";
        if (mysqli_query($conn, $query)) {
            header("Location: list.php ");
            exit;
        } else {
            // echo $ query ;
            echo mysqli_error($conn);
        }
        // Close the connection
        mysqli_close($conn);
    }
}
?>

<html>

<head>
    <title> Add User </title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style1.css">
    <style>
        body {
            background-image: url(../../images/bg.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            color: white;
        }

        label {
            color: white;
            font-size: 20px;
        }

        form {
            width: 40%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 1px solid transparent;
            padding: 50px 30px;
            border-radius: 30px;
        }

        .put {
            color: white !important;
            background: transparent !important;
        }

        .btn.btn-outline-primary {
            background: #fbceb5 !important;
            border: 1px solid #fbceb5 !important;
            color: #000 !important;
        }

        .form-check-input {
            background-color: #fbceb5;
        }
    </style>

</head>

<body>

    <form method="POST" enctype="multipart/form-data">
        <label for="name">Name</label>
        <input type="text" class="form-control put" name="name" id="name" value="<?= (isset($_POST['name'])) ? $_POST['name'] : '' ?>" />
        <?php if (in_array("name", $error_fields)) echo "*Please enter your name"; ?>
        <br />
        <label for="email">Email</label>
        <input type="email" class="form-control put" name="email" id="email" value="<?= (isset($_POST['email'])) ? $_POST['email'] : '' ?>" />
        <?php if (in_array("email", $error_fields)) echo "*Please enter avalid email"; ?>
        <br />
        <label for="password">Password</label>
        <input type="password" class="form-control put" name="password" id="password" /><?php if (in_array("password", $error_fields)) echo "*Please enter password not less than 6 characters"; ?>
        <br />
        <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault" name="admin" <?= (isset($_POST['admin'])) ? 'checked' : '' ?> />&nbsp &nbsp &nbsp Admin
        <br />
        <label for="avatar">Avatar</label>
        <input type="file" class="form-control put" id="Avatar" name="Avatar">
        <br />
        <input type="submit" class="form-control  btn btn-outline-primary" name="submit" value="Add User" />
    </form>
    <script src="../../js/jquery-3.6.1.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
</body>

</html>