<?php
session_start();

//if(isset($_POST['submit'])){

    $mysql = new mysqli('localhost', 'root', '1program4*al', 'zparts');

    $regNumber = $_POST['regNumber'];
    $regDate = $_POST['regDate'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $vinNumber = $_POST['vin'];
    $engine = $_POST['engine'];
    $engine_capacity = $_POST['engine_capacity'];
    $drive = $_POST['drive'];


    if ($mysql->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    if(mysqli_num_rows($mysql->query("SELECT * FROM `cars` WHERE vinNumber = '$vinNumber'")) > 0){
        echo 'Car with this vin-Number is already added to Your profile!'; 
        exit();
    }

    $user = $_SESSION['user']['email'];

    $result = $mysql->query("SELECT id FROM users WHERE email = '$user';");

    while ($row = $result->fetch_assoc()) {
        $userId = $row['id'];
    }

    $mysql->query("INSERT INTO cars (user_id, vinNumber, countryNumber, carBrand, model, regDate, engine, engineCapacity, drive) 
                    VALUES ('$userId', '$vinNumber', '$regNumber', '$brand', '$model', '$regDate', '$engine', '$engine_capacity', '$drive')");

    header('Location: ../my_profile.php');

    $mysql->close();
//}


?>