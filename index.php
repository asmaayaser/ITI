<?php

// We will use it for storing the signed in user data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //connect to DB
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'jumia';
    $conn = mysqli_connect($server, $user, $pass, $db);
    if (!$conn) {
        echo mysqli_connect_error();
        exit;
    }

    //Escape any sepcial characters to avoid SQL Injection

    $email = mysqli_escape_string($conn, $_POST['email']);
    $password = sha1($_POST['password']);
    //select

    $query = "SELECT * FROM `user` WHERE `userEmail` ='" . $email . "' and `userPass` = '" . $password . "' LIMIT 1";
    $result = mysqli_query($conn, $query);
    session_start();
    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['id'] = $row['userId'];
        $_SESSION['email'] = $row['userEmail'];
        $_SESSION['name'] = $row['userName'];
        if ($row['Admin'] == 1) {
            header("Location: admin/users/list.php");
        } else {
            header("Location: user/books/home.php");
        }
        exit;
    } else {
        $error = 'Invalid email or password';
    }

    // Close the connection
    mysqli_free_result($result);
    mysqli_close($conn);
}

?>
<html>

<head>
    <title> login</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
    <?php if (isset($error)) echo $error; ?>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Login </h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <h3 class="mb-4 text-center">Have an account?</h3>
                        <form method="post" class="signin-form">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="UserEmail" required name="email" id="email" value="<?= (isset($_POST['email'])) ? $_POST['email'] : '' ?>">
                            </div>
                            <div class="form-group">
                                <input id="password-field" type="password" class="form-control" placeholder="Password" name="password" required>
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <label class="checkbox-wrap checkbox-primary">Remember Me
                                        <input type="checkbox" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right"> </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="js/jquery-3.6.1.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>





</html>