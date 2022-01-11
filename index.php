<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookshop CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        a {
            color: white;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <h1 class="navbar-brand mx-auto">Welcome to bookshop</h1>
            <a href="index.php" class="navbar-brand mx-auto">Home Page</a>
            <?php include('search.php'); ?>
            <a href="login.php"><button type="button" class="btn btn-secondary mx-auto text-center">Login to account</button></a>
        </div>
    </nav>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" style="height: 350px" src="img/background.jpg" alt="First slide">
            </div>
        </div>
    </div>
    <br />
    <?php
    if (isset($_GET['search'])) {
        $value = $_GET['search'];
        $sql = "SELECT * FROM Books WHERE CONCAT(`book_name`, `book_author`, `book_year`, `book_desc`, `book_image`) LIKE '%$value%'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) { ?>
            <table class="table table-striped">
                <tr>
                    <th>L.P</th>
                    <th>Book name</th>
                    <th>Book author</th>
                    <th>Book year</th>
                    <th>Book description</th>
                    <th>Book price</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>$row[0] </td>";
                    echo "<td>$row[1] </td>";
                    echo "<td>$row[2] </td>";
                    echo "<td>$row[3] </td>";
                    echo "<td>$row[5]</td>";
                    echo "<td width='600px'><img src='img/$row[6]' width='15%'></td>";
                    echo "<td>
                        <a href='update.php'><button type='button' class='btn btn-primary'>Update book</button></a>
                        <a href='delete.php'><button type='button' class='btn btn-danger'>Delete book</button></a>
                        </td>";
                    echo "</tr>";
                } ?>
            </table>
            <hr>
        <?php
        } else if (mysqli_affected_rows($conn)) {
        ?>
            <table class="table table-striped">
                <tr>
                    <th>L.P</th>
                    <th>Book name</th>
                    <th>Book author</th>
                    <th>Book year</th>
                    <th>Book description</th>
                    <th>Book price</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
                <?php
                $sql = "SELECT * FROM Books";
                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>$row[0]</td>";
                    echo "<td>$row[1]</td>";
                    echo "<td>$row[2]</td>";
                    echo "<td>$row[3]</td>";
                    echo "<td>$row[5]</td>";
                    echo "<td width='600px'><img src='img/$row[6]' width='15%'></td>";
                    echo "<td>
                        <a href='update.php'><button type='button' class='btn btn-primary'>Update book</button></a>
                        <a href='delete.php'><button type='button' class='btn btn-danger'>Delete book</button></a>
                        </td>";
                    echo "</tr>";
                }
                ?>
            </table>
        <?php
        } else {
        ?>
            <tr>
                <td colspan="4">Not found record in database!!!</td>
            </tr>
        <?php
        }
    } else {
        ?>
        <table class="table table-striped">
            <tr>
                <th>L.P</th>
                <th>Book name</th>
                <th>Book author</th>
                <th>Book year</th>
                <th>Book description</th>
                <th>Book price</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        <?php
        $sql = "SELECT * FROM Books";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>$row[0]</td>";
            echo "<td>$row[1]</td>";
            echo "<td>$row[2]</td>";
            echo "<td>$row[3]</td>";
            echo "<td>$row[4]</td>";
            echo "<td>$row[5]</td>";
            echo "<td width='500px'><img src='img/$row[6]' width='15%'></td>";
            echo "<td>
                <a href='update.php'><button type='button' class='btn btn-primary'>Update book</button></a>
                <a href='delete.php'><button type='button' class='btn btn-danger'>Delete book</button></a>
                </td>";
            echo "</tr>";
        }
    }
        ?>
        </table>
        <div class="text-center">
            <a href='create.php'><button type='button' class='btn btn-success'>Create book</button></a> <br />
            <?php include('pages.php'); ?>
        </div>
        <footer class="bg-light text-center text-lg-start">
            <div class="text-center p-4">Bookshop &copy; 2021</div>
        </footer>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>