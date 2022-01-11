<?php
if (isset($_SESSION['login']) && $_SESSION['loggedin'] === true) {
    header('location: home.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookshop CRUD - Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            background-image: url('img/background.jpg');
            background-repeat: no-repeat;
            background-size: 200%;
        }

        .container {
            margin-top: 20px;
            background: rgba(114, 114, 114, 0.45);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
    </style>
</head>

<body>
    <div class="container col-md-2 text-white text-center">
        <br>
        <h4 class="text-center">Login to account</h4>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="login">User</label>
                <input type="text" class="form-control" name="login" id="login">
            </div>
            <div class="form-group">
                <label for="pwd">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <input class="btn btn-primary" type="submit" name="submit" value="Login" style="margin: auto; display: block;">
            <?php
            session_start();
            $login = $password = "";
            $login_err = $password_err = "";
            require_once('server.php');
            if (isset($_POST['submit'])) {
                $login = $_POST['login'] ?? "";
                $password = $_POST['password'] ?? "";
                $sql = "SELECT * FROM user WHERE login = '$login' AND password = '$password'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    if ($row['login'] === $login && $row['password'] === $password) {
                        $_SESSION['login'] = $row['login'];
                        $_SESSION['password'] = $row['password'];
                        $_SESSION['loggedin'] = true;
                        header('location: home.php');
                    }
                }
            }
            ?>
        </form>
        <br>
        <a href="register.php"><button type="button" class="btn btn-secondary" style="margin: auto; display: block;">Register to account</button></a> <br>
        <a href="index.php" style="text-align: center; display: block;">Go back to main page</a>
    </div>
</body>

</html>