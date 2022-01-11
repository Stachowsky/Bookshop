<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Pages</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php
    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }
    $no_of_records_per_page = 10;
    $offset = ($pageno - 1) * $no_of_records_per_page;

    $total_pages_sql = "SELECT COUNT(*) FROM Books";
    $result = mysqli_query($conn, $total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);
    $sql = "SELECT * FROM Books LIMIT $offset, $no_of_records_per_page";
    $res_data = mysqli_query($conn, $sql);
    // while ($row = mysqli_fetch_array($res_data)) {
    //     echo "<tr>";
    //     echo "<td>$row[0] </td>";
    //     echo "<td>$row[1] </td>";
    //     echo "<td>$row[2] </td>";
    //     echo "<td>$row[3] </td>";
    //     echo "<td>$row[5]</td>";
    //     echo "<td width='600px'><img src='img/$row[6]' width='15%'></td>";
    //     echo "<td>
    //         <a href='update.php'><button type='button' class='btn btn-primary'>Update book</button></a>
    //         <a href='delete.php'><button type='button' class='btn btn-danger'>Delete book</button></a>
    //         </td>";
    //     echo "</tr>";
    // }
    ?>
    <br />
    <div class="container-fluid bg-light">
        <div class="text-center">
            <button class="btn btn-primary m-2"><a class="text-white" href="?pageno=1">Strona główna</a></button>
            <button class="btn btn-primary m-2 <?php if ($pageno <= 1) {
                                                    echo 'disabled';
                                                } ?>"><a class="text-white" href="<?php if ($pageno <= 1) {
                                                                                        echo '#';
                                                                                    } else {
                                                                                        echo "?pageno=" . ($pageno - 1);
                                                                                    } ?>">Poprzednia</a></button>
            <button class="btn btn-primary m-2 <?php if ($pageno >= $total_pages) {
                                                    echo 'disabled';
                                                } ?>">
                <a class="text-white" href="<?php if ($pageno >= $total_pages) {
                                                echo '#';
                                            } else {
                                                echo "?pageno=" . ($pageno + 1);
                                            } ?>">Następna</a>
            </button>
            <button class="btn btn-primary m-2"><a class="text-white" href="?pageno=<?php echo $total_pages; ?>">Poprzednia</a></button>
        </div>
        <br>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>