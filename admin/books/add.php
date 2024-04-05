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
    if (!(isset($_POST['Title']) && !empty($_POST['Title']))) {
        $error_fields[] = "Title";
    }
    if (!(isset($_POST['Info']) && !empty($_POST['Info']))) {
        $error_fields[] = "Info";
    }
    if (!(isset($_POST['Author']) && !empty($_POST['Author']))) {
        $error_fields[] = "Author";
    }
    // if (!(isset($_POST['Submission_Date']) && !empty($_POST['Submission_Date']))) {
    //     $error_fields[] = "Submission_Date";
    // }
    // if (!(isset($_POST['Img']) && !empty($_POST['Img']))) {
    //     $error_fields[] = "Img";
    // }

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
        $Title = mysqli_escape_string($conn, $_POST['Title']);
        $Info = mysqli_escape_string($conn, $_POST['Info']);
        $Author = mysqli_escape_string($conn, $_POST['Author']);
        $Submission_Date = mysqli_escape_string($conn, $_POST['Submission_Date']);
        $Img = $_FILES['Img'];
        $Img_temp = $_FILES['Img']['tmp_name'];
        $Img_name = $_FILES['Img']['name'];
        move_uploaded_file($Img_temp, 'C:\xampp\htdocs\ITI\uploads\\' . $Img_name);
        // Insert the data
        $query = "INSERT INTO `books` ( `bookTitle` ,`bookInfo` , `Author` , `submissionDate`,`bookImg` ) VALUES (  '" . $Title . "','" . $Info . "' , '" . $Author . "' ,'" . $Submission_Date . "','" . $Img_name . "' ) ";
        if (mysqli_query($conn, $query)) {
            header("Location: booklist.php ");
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
    <title> Add Book </title>
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
    </style>

</head>

<body>

    <form method="POST" enctype="multipart/form-data">
        <label for="Title">Title</label>
        <input type="text" class="form-control put" name="Title" id="Title" value="<?= (isset($_POST['Title'])) ? $_POST['Title'] : '' ?>" />
        <?php if (in_array("Title", $error_fields)) echo "* Please enter Title"; ?>
        <br />
        <label for="Info">Info</label>
        <textarea type="text" class="form-control put" rows="3" name="Info" id="Info" value="<?= (isset($_POST['Info'])) ? $_POST['Info'] : '' ?>"></textarea>
        <?php if (in_array("Info", $error_fields)) echo "* Please enter Info"; ?>
        <br />
        <label for="Author">Author</label>
        <input type="text" class="form-control put" name="Author" id="Author" value="<?= (isset($_POST['Author'])) ? $_POST['Author'] : '' ?>" />
        <?php if (in_array("Author", $error_fields)) echo "* Please enter Author"; ?>
        <br />
        <label for="Submission_Date">Submission Date</label>
        <input type="text" class="form-control put " id="Submission_Date" name="Submission_Date">
        <br />
        <label for="Img">Img</label>
        <input type="file" class="form-control put" id="Img" name="Img">
        <br />
        <input type="submit" class="form-control  btn btn-outline-primary" name="submit" value="Add Book" />
    </form>
    <script src="../../js/jquery-3.6.1.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
</body>

</html>