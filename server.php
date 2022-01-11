<?php
    $conn = mysqli_connect('localhost', 'root', '');
    if(!$conn) {
        die('Connection failed with database!');
    }
    $selected = mysqli_select_db($conn, 'bookshop');
    if(!$selected) {
        $query = "CREATE DATABASE bookshop;";
        if(mysqli_query($conn, $query)) {
            echo "Database bookshop created succesfully! \n";
        } else {
            echo "Error creating database: ".mysqli_error($conn);
        }
    }
    $table1 = "CREATE TABLE User (
        id_user INT AUTO_INCREMENT,
        login VARCHAR(30) NOT NULL,
        password VARCHAR(30) NOT NULL,
        PRIMARY KEY(id_user)
    )";
    $table2 = "CREATE TABLE Client (
            id_client INT AUTO_INCREMENT,
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(30) NOT NULL,
            money INT,
            PRIMARY KEY(id_client)
    )";
    $table3 = "CREATE TABLE Books (
       id_book INT AUTO_INCREMENT,
       book_name VARCHAR(30) NOT NULL,
       book_author VARCHAR(30) NOT NULL,
       book_year INT NOT NULL,
       book_desc VARCHAR(200) NOT NULL,
       book_price INT NOT NULL,
       book_image VARCHAR(200) NULL,
       PRIMARY KEY(id_book) 
    )";

    if(mysqli_query($conn, $table1)) {
        echo "Table User created sucessfully! \n";
    }
    if(mysqli_query($conn, $table2)) {
        echo "Table Client created sucessfully! \n";
    }
    if(mysqli_query($conn, $table3)) {
        echo "Table Books created sucesfully! \n";
    }
?>