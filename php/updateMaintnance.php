<?php
$mysql = new mysqli('localhost', 'root', '1program4*al', 'zparts');

if(!$mysql) {
    die("Error: " . mysqli_connect_error());
}

$updated = $_POST['update'];

$service_id = $_POST['service'];
$detail_id = $_POST['detail'];
$car_id = $_POST['car'];
$media = $_POST['media'];
$start = $_POST['start'];
$mileage = $_POST['mileage'];
$endDate = $_POST['end'];
$price = $_POST['price'];
$notes = $_POST['notes'];

$mysql->query("UPDATE maintnances SET service_id='$service_id',  car_id='$car_id', media='$media', 
    startDate='$start', mileage='$mileage', endDate='$endDate', totalPrice='$price', notes='$notes' WHERE id='$updated';");

$mysql->close();

header('Location: ../db/maintnancesBase.php');

$mysql->close();

?>