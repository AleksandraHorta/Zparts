<?php

    $mysql = new mysqli('localhost', 'root', '1program4*al', 'zparts');

    $detail = $_POST['detail'];
    $price = $_POST['price'];


    if ($mysql->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }



    $mysql->query("INSERT INTO details (detailName, price) VALUES ('$detail', '$price')");

    $mysql->close();

    header('Location: ../db/detailsBase.php'); 

?>