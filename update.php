<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookshop CRUD - Update</title>
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
    <div class="container col-md-4 text-white text-center">
        <h3 class="text-center">Update a book</h1>
            <form action="update.php" method="POST">
                <div class="form-group">
                    <label for="id">Book ID</label>
                    <input type="number" name="id" id="id" class="form-control" name="bookname" min=1 placeholder="Enter your book id">
                </div>
                <div class="form-group">
                    <label for="name">Book name</label>
                    <input type="text" class="form-control" id="name" name="bookname" placeholder="Enter your book name">
                </div>
                <div class="form-group">
                    <label for="author">Book author</label>
                    <input type="text" class="form-control" id="author" name="bookauthor" placeholder="Enter your book author">
                </div>
                <div class="form-group">
                    <label for="year">Book year</label>
                    <input type="number" class="form-control" id="year" name="bookyear" min=1 max=2021 placeholder="Enter your book year">
                </div>
                <div class="form-group">
                    <label for="desc">Book description</label>
                    <textarea class="form-control" id="desc" name="bookdesc" rows="3" placeholder="Enter your book description"></textarea>
                </div>
                <div class="form-group">
                    <label for="desc">Book price</label>
                    <input type="number" class="form-control" id="priec" name="bookprice" min=1 placeholder="Enter your book price">
                </div>
                <div class="form-group">
                    <label for="image">Book image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="img/*" placeholder="Enter your image" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary" style="display: block; margin: auto;">Update book</button>
                <br>
                <a href="index.php" style="display: block; text-align: center;">Go back to main page</a>
            </form>
    </div>
    <?php
    include_once('server.php');
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $bookname = $_POST['bookname'];
        $bookauthor = $_POST['bookauthor'];
        $bookyear = $_POST['bookyear'];
        $bookdesc = $_POST['bookdesc'];
        $bookimage = $_POST['image'];
        $bookprice = $_POST['bookprice'];

        if (empty($_POST['bookname']) || empty($_POST['bookauthor']) || empty($_POST['bookyear']) || empty($_POST['bookdesc']) || empty($_POST['bookprice']) || empty($_POST['image'])) {
            echo "<br /> <div class='alert alert-danger col-md-4 text-center' style='display: block; margin: auto' role='alert'>Please fill the all input fields</div>";
        } else {
            $filename = $_FILES["image"]["name"];
            $file = $_FILES["image"]["tmp_name"];
            $size = $_FILES["image"]["size"];
            if ($filename) {
                $folder = "img/" . $filename;
                $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
                $userpic = rand(1000, 100000) . "." . $ext;
            }
            if (in_array($ext, $valid_extensions)) {
                if ($size < 5000000) {
                    unlink($folder);
                    move_uploaded_file($file, $folder);
                } else {
                    echo "You file extension must be .jpg and .png";
                }
            }
            // else {
            //     if (move_uploaded_file($file, $folder)) {
            //         $sql = "UPDATE Books SET id_book = '$id', book_name = '$bookname', book_author = '$bookauthor', book_year = '$bookyear', book_desc ='$bookdesc', book_price = '$bookprice', book_image = '$bookimage";
            //         if (mysqli_query($conn, $sql)) {
            //             echo "File uploaded sucessfully!";
            //             header('location: index.php');
            //         } else {
            //             echo "Error" . mysqli_error($conn);
            //         }
            //     } else {
            //         echo 'Failed to upload a file!';
            //     }
            // }
        }
    }
    ?>
</body>

</html>