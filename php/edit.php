<?php

    $mysql = new mysqli('localhost', 'root', '1program4*al', 'zparts');

    if ($mysql->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $id = $_GET['update'];
    $serviceName = $_POST['serviceName'];
    $hours = $_POST['hours'];
    $avgPrice = $_POST['avgPrice'];
    
    $mysql->query("UPDATE services SET serviceName = '$serviceName', hours = '$hours', avgPrice = '$avgPrice' WHERE id = '$id';"); 

    $mysql->close();

    header('Location: ../db/servicesBase.php'); 

    
