<?php
    session_start();

    $mysql = new mysqli('localhost', 'root', '1program4*al', 'zparts');

    $username = $_POST['username'];
    $password = $_POST['password'];

    //$name = $mysql->query("SELECT name FROM `users` WHERE email = '$username' AND password = '$password'");
    //$surname = $mysql->query("SELECT surname FROM `users` WHERE email = '$username' AND password = '$password'");
    //$phone = $mysql->query("SELECT phone FROM `users` WHERE email = '$username' AND password = '$password'");

    $password = md5($password."waalyelkasnad4312");


    if($result = $mysql->query("SELECT * FROM `users` WHERE email = '{$username}' AND password = '$password'")){
        
        while ($user = $result->fetch_assoc()) {

            //setcookie('cookie', $user['email'], time() + 3600*3, "/");  //3600 = one hour (3600 * 3 = 3 hours)
            $_SESSION['user'] = ['email' => $username];

            $redirect = getRedirect($user['role']);
            if ($redirect) {
                header("Location: $redirect");
                exit;
            }
        }

        if (mysqli_num_rows($result = $mysql->query("SELECT * FROM `users` WHERE email = '$username' AND password = '$password'")) == 0) {
            echo '<script type="text/javascript">';
            echo 'alert("Incorrect email or password!")';
            echo '</script>';
            
        }
        
    }


    function getRedirect($role) {
        switch ($role) {
            case 'admin': return '../timetable.php';
            case 'moderator': return '../statistics.html';
            default: return '/';
        }
    }



    $mysql->close();


?>