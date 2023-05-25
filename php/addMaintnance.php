<?php
session_start();

    $mysql = new mysqli('localhost', 'root', '1program4*al', 'zparts');

    $service_id = $_POST['service'];
    $detail_id = $_POST['detail'];
    $car_id = $_POST['car'];
    $media = $_POST['media'];
    $start = $_POST['start'];
    $mileage = $_POST['mileage'];
    $endDate = $_POST['end'];
    $price = $_POST['price'];
    $notes = $_POST['notes'];


    if ($mysql->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($detail_id == '') {
        $mysql->query("INSERT INTO maintnances (service_id, car_id, media, startDate, mileage, endDate, totalPrice, notes) 
                    VALUES ('$service_id', '$car_id', '$media', '$start', '$mileage', '$endDate', '$price', '$notes')");
    }
    

    $mysql->query("INSERT INTO maintnances (service_id, detail_id, car_id, media, startDate, mileage, endDate, totalPrice, notes) 
                    VALUES ('$service_id', '$detail_id', '$car_id', '$media', '$start', '$mileage', '$endDate', '$price', '$notes')");

    header('Location: ../db/maintnancesBase.php');

    $mysql->close();


?>