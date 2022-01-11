<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookshop CRUD - Delete</title>
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
    <div class="container col-md-4 text-center text-white">
        <h3 class="text-center">Delete a book</h1>
            <form action="delete.php" method="POST">
                <div class="form-group">
                    <label for="id">Book ID</label>
                    <input type="number" name="id" id="id" class="form-control" name="bookname" min=1 placeholder="Enter your book id">
                </div>
                <button type="submit" name="submit" class="btn btn-primary" style="display: block; margin: auto;">Delete book</button>
            </form>
            <br>
            <a href="index.php" style="text-align: center; display: block;">Go back to main page</a>
    </div>
    <?php
    require_once('server.php');
    if (isset($_POST['submit'])) {
        $id = ((int)$_POST['id']);
        if (mysqli_query($conn, "DELETE FROM Books WHERE id_book='$id'")) {
            echo "Success";
            header('location: index.php');
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    ?>
</body>

</html>