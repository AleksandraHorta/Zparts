<?php
session_start();

if(isset($_POST['submit'])){

    $mysql = new mysqli('localhost', 'root', '1program4*al', 'zparts');

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $terms = $_POST['terms'];


    if ($mysql->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    if(mb_strlen($password) < 6 || mb_strlen($password) > 17) {
        echo '<script type="text/javascript">';
        echo 'alert("Password is too short!")';
        echo '</script>';
        exit();
    }

    if($password != $cpassword) {
        echo '<script type="text/javascript">';
        echo 'alert("Confirm password not matched!")';
        echo '</script>';
        exit();
    }


    if(mysqli_num_rows($mysql->query("SELECT * FROM `users` WHERE email = '$email'")) > 0){
        echo '<script type="text/javascript">';
        echo 'alert("User with this email already exists!")';
        echo '</script>';
        exit();
    }


    $password = md5($password."waalyelkasnad4312");

    $_SESSION['user'] = ['email' => $email];

    $mysql->query("INSERT INTO users (name, surname, phone, email, password, terms) VALUES ('$name', '$surname', '$phone', '$email', '$password', '$terms')");

    $mysql->close();


    header('Location: /');  //return to '/' that means main page (index.html)

}
?>