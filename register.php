<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookshop CRUD - Register</title>
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
        <h4 class="text-center">Register account</h4>
        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" class="form-control" name="login" id="login">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <?php
            session_start();
            require_once('server.php');
            $login = $password = "";
            $login_err =  $password_err = "";
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                // validate login
                if (empty(trim($_POST['login']))) {
                    $login_err = "Please enter a login. <br/>";
                    echo $login_err;
                } else if (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["login"]))) {
                    $login_err = "Login can only contain letter, numbers, ... <br/>";
                    echo $login_err;
                } else {
                    // prepare sql select stmnt
                    $sql = "SELECT id_user FROM user WHERE login = ?";
                    if ($stmt = mysqli_prepare($conn, $sql)) {
                        // bind variables to the prepared statement
                        mysqli_stmt_bind_param($stmt, "s", $param_login);
                        $param_login = trim($_POST['login']);
                        if (mysqli_stmt_execute($stmt)) {
                            /* store result */
                            mysqli_stmt_store_result($stmt);
                            if (mysqli_stmt_num_rows($stmt) == 1) {
                                $login_err = "This login is already taken! <br/>";
                                echo $login_err;
                            } else {
                                $login = trim($_POST['login']);
                            }
                        } else {
                            echo "Oops! something went wrong. Please try later! <br/>";
                        }
                        mysqli_stmt_close($stmt);
                    }
                }
                // validate password
                if (empty(trim($_POST['password']))) {
                    $password_err = "Please enter password! <br/>";
                    echo $password_err;
                } else if (strlen(trim($_POST['password'] < 6))) {
                    echo "Password must be at least 6 characters! <br/>";
                } else {
                    $password = trim($_POST['password']);
                }
                // check input errors
                if (empty($login_err) && empty($password_err)) {
                    $sql = "INSERT INTO user (login, password) VALUES (?, ?)";
                    if ($stmt = mysqli_prepare($conn, $sql)) {
                        mysqli_stmt_bind_param($stmt, "ss", $param_login, $param_password);
                        $param_login = $login;
                        $param_password = $password;
                        // create a password hash ???
                        // attempt to execute stmt
                        if (mysqli_stmt_execute($stmt)) {
                            header('location: home.php');
                        } else {
                            echo "Ooops! Something went wrong pleas try again! <br/>";
                        }
                        mysqli_stmt_close($stmt);
                    }
                }
                mysqli_close($conn);
            }
            ?>
            <input class="btn btn-primary" type="submit" name="submit" value="Register" style="display: block; margin: auto;">
        </form>
        <br>
        <a href="login.php"><button type="button" class="btn btn-secondary" style="display: block; margin: auto;">Login to account</button></a> <br>
        <a href="index.php" style="display: block; text-align: center">Go back to main page</a>
    </div>
</body>

</html>