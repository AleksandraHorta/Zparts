<?php

    $mysql = new mysqli('localhost', 'root', '1program4*al', 'zparts');

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $terms = $_POST['terms'];


    if ($mysql->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    if(mb_strlen($password) < 6 || mb_strlen($password) > 17) {
        echo "Password is too short!";
        exit();
    }

    $password = md5($password."waalyelkasnad4312");


    $mysql->query("INSERT INTO users (name, surname, phone, email, password, terms) VALUES ('$name', '$surname', '$phone', '$email', '$password', '$terms')");

    $mysql->close();


    header('Location: /');  //return to '/' that means main page (index.html)

?>