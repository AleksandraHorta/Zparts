<?php
$mysql = new mysqli('localhost', 'root', '1program4*al', 'zparts');

if(!$mysql) {
    die("Error: " . mysqli_connect_error());
}

$updated = $_POST['update'];

$regNumber = $_POST['regNumber'];
$regDate = $_POST['regDate'];
$brand = $_POST['brand'];
$model = $_POST['model'];
$vinNumber = $_POST['vin'];
$engine = $_POST['engine'];
$engine_capacity = $_POST['engine_capacity'];
$drive = $_POST['drive'];


$mysql->query("UPDATE cars SET vinNumber = '$vinNumber', countryNumber = '$regNumber', carBrand = '$brand', model = '$model', 
                regDate = '$regDate', engine = '$engine', engineCapacity = '$engine_capacity', drive = '$drive' WHERE id = $updated;"); 


header('Location: ../my_profile.php');

$mysql->close();

?>