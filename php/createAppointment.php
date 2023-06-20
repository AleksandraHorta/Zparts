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

    $service_id = $_POST['service'];
    $car_id = $_POST['car'];
    $startDate = $_POST['date'];

    $res = $mysql->query("SELECT hours FROM services WHERE id = '$service_id';");
    $x = $res->fetch_row();
    $hours = (int) $x[0];

    if ($hours > 8) {
        $days = ($hours / 8);
        $endDate = strtotime($startDate . ' + '. $days . ' days');
        $endDate = date('Y-m-d', $endDate);
    } else if ($hours < 8) {
        $endDate = $_POST['date'];
    } else {
        echo "Something went wrong!";
    }


    $comments = $_POST['comments'];



    if ($comments == '') {
        $mysql->query("INSERT INTO requests (user_id, service_id, car_id, startDate, endDate, confirmation) 
                        VALUES ('$user_id','$service_id', '$car_id', '$startDate', '$endDate', 0)");
    }
    

    $mysql->query("INSERT INTO requests (user_id, service_id, car_id, startDate, endDate, confirmation, comments) 
                    VALUES ('$user_id','$service_id', '$car_id', '$startDate', '$endDate', 0, '$comments');");


        $to = 'localhost.aleksandra.horta@gmail.com'; //$to = 'localhost.' $x; //aleksandra.horta@gmail.com
        $subject = 'Request';
        $message = 'Request was created successfully!';
        $headers = 'From: info@zparts.lv';  //info@zparts.lv

        $mailSent = mail($to, $subject, $message, $headers);

        if ($mailSent) {
            header('Location: ../successPage.php');
        } else {
            echo '<h1 style="color: black;">Form submitted successfully, but there was an error sending the email.</h1>';
            echo '<a style="color: black;" href="../appointment.php">Go back</a>';
        }

    $mysql->close();


?>