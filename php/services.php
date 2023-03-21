<?php

    $mysql = new mysqli('localhost', 'root', '1program4*al', 'zparts');

    $service = $_POST['service'];
    $hours = $_POST['hours'];
    //$price = $_POST['price'];


    if ($mysql->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }



    $mysql->query("INSERT INTO services (serviceName, hours, avgPrice) VALUES ('$service', '$hours', '$hours'*35)");

    $mysql->close();

    header('Location: ../db/servicesBase.php'); 

?>