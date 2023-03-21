<?php

    $mysql = new mysqli('localhost', 'root', '1program4*al', 'zparts');

    $username = $_POST['username'];
    $password = $_POST['password'];


    $password = md5($password."waalyelkasnad4312");

    //$result = $mysql->query("SELECT * FROM `users` WHERE `username`= '$username' AND `password`= '$password'");

    //$user = $result->fetch_assoc();


    if($result = $mysql->query("SELECT * FROM `users` WHERE email = '$username' AND password = '$password'")){
        while ($user = $result->fetch_assoc()) {
            //print_r($user);
            setcookie('cookie', $user['email'], time() + 3600*3, "/");  //3600 = one hour (3600 * 3 = 3 hours)
            //  "/" means working on all pages

            $redirect = getRedirect($user['role']);
            if ($redirect) {
                header("Location: $redirect");
                exit;
            }
        }
        if (mysqli_num_rows($result = $mysql->query("SELECT * FROM `users` WHERE email = '$username' AND password = '$password'")) == 0) {
            echo "User not found!";
            exit();
        }
        
    }




    function getRedirect($role) {
        switch ($role) {
            case 'admin': return '../timetable.html';
            case 'moderator': return '../statistics.html';
            default: return '/';
        }
    }



    $mysql->close();


?>