<?php
session_start();
if (isset($_SESSION['login'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Account</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            body {
                background-image: url('img/background.jpg');
                background-size: 200%;
                background-repeat: no-repeat;
            }

            span {
                font-size: 22px;
            }

            div {
                padding-top: 100px;
            }
        </style>
    </head>

    <body>
        <div class="text-center text-white">
            <h1>Logged in</h2>
                <span>Welcome to your account <b><?php echo $_SESSION['login'] ?> </b></span> <br />
                <button class="btn btn-primary"><a href="logout.php" style="display: block; text-align: center;">Logout account</button></a>
        </div>
    </body>

    </html>
<?php } else {
    header('location: index.php');
} ?>