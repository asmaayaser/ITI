<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="process.php">
        <label for="name"> Name </label>
        <input type="text" name="name" id="name" /><br />
        <label for="email"> Email </label>
        <input type="email" name="email" id="email" /> <br />
        <label for="password"> Password </label>
        <input type="password" name="password" id="password" /> <br />
        <label for="gender"> Gender </label> <br />
        <input type="radio" name="gender" value="male" /> Male
        <input type="radio" name="gender" value="female" /> Female
        <input type="submit" name="submit" value="Register" />
    </form>
</body>

</html>