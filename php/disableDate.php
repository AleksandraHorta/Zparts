<?php
session_start();

    $mysql = new mysqli('localhost', 'root', '1program4*al', 'zparts');

    if ($mysql->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $x = $_SESSION['user']['email'];

    $result = $mysql->query("SELECT id FROM users WHERE email = '$x';");
    
    while ($row = $result->fetch_assoc()) {
        $user_id = $row['id'];
    }
    

    $endDate = $_POST['date'];

    $startDate = strtotime($endDate . ' -1 days');
    $startDate = date('Y-m-d', $startDate);
    

    $mysql->query("INSERT INTO requests (user_id, startDate, endDate, confirmation) 
                    VALUES ('$user_id', '$startDate', '$endDate', 1);");

    header('Location: ../timetable.php');

    $mysql->close();

?>