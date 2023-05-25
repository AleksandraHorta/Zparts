<?php
    session_start();
    $mysql = new mysqli('localhost', 'root', '1program4*al', 'zparts');
    $x = $_SESSION['user']['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/appointment.css">
    <link rel="stylesheet" type="text/css" href="calendar/css/style.css">
    <title>Appointments</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />  -->
    <style>

        * {
            margin: 0;
            padding: 0;
            list-style-type: none;
            font-family: calibri;
        }

        body {
            background-image: url('images/car.jpeg');
            background-repeat: no-repeat;
            background-size: cover;
        }


        .nav {
            background-color: white;
        }

        .active{
            padding-left: 25px;
            padding-top: 5px;;
            display: flex;
            align-items: center;
            position: absolute;
            
        }


        ul{
            display: flex;
            align-items: right;
            justify-content: right;
            position: relative;
            /*width: 100%;*/
            height: 80px;
            /*margin: auto;*/
            /*justify-content: space-between;*/
            /*text-align: center;*/
        }

        ul a #not-logo{
            align-items: right;
        }

        li a{
            text-decoration: none;
            color: black;
            font-weight: bold;
        }


        li {
            /*padding: 1rem 2rem 1.15rem;*/
            text-transform: uppercase;
            cursor: pointer;
            color: #ffffff;
            margin-top: 28px;
            /*min-width: 80px;*/
            /*margin: auto;*/
            margin-top: 28px;
            margin-right: 50px;
            font-size: 18px;
        }


        li:hover {
            background-image: url('../images/background.png');
            background-size: 100% 100%;
            /*color: #27262c;*/
            /*animation: spring 300ms ease-out;*/
            text-shadow: 0 -1px 0 #FE642F;
        
        }


        li:active {
            transform: translateY(4px);
        }

        @keyframes spring {
        15% {
        -webkit-transform-origin: center center;
        -webkit-transform: scale(1.2, 1.1);
        }
        40% {
        -webkit-transform-origin: center center;
        -webkit-transform: scale(0.95, 0.95);
        }
        75% {
        -webkit-transform-origin: center center;
        -webkit-transform: scale(1.05, 1);
        }
        100% {
        -webkit-transform-origin: center center;
        -webkit-transform: scale(1, 1);
        }
        }


        .container{
            background: transparent;
            width: 850px;
            height: 530px;
            padding-top: 190px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            /*margin: auto;
            padding: 45px 60px 45px 45px;*/
            text-align: center;
            
        }
        .button{
            border: none;
            color: white;
            padding: 12px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;
            text-transform: uppercase;
            background-color: #2E64FE;
        }
        .buttonHolder{
            padding-top: 70px;
            
        }

       

    </style>

</head>

<script src="js/appointment.js"></script>

<body>

<nav class="nav">
  <?php

    if(isset($_SESSION['user']) == '') { 
  ?>
  <a class="active" href="index.php"><img src="images/Zparts_main2.png" width="290" height="65"></a>
    <ul>
        <li><a id="not-logo" href="log_in.php">Log in</a></li>
        <li><a id="not-logo" target="_blank" href="user_reg.php">Sign Up</a></li>
        <li><a id="not-logo" target="_blank" href="https://www.google.com/maps/dir//zparts.lv,+Augusta+Deglava+iela+102,+Latgales+priek%C5%A1pils%C4%93ta,+R%C4%ABga,+LV-1082/@56.9481517,24.1869895,15z/data=!4m8!4m7!1m0!1m5!1m1!1s0x46eecf2bf3b2f817:0x56ee5c2a21d55b88!2m2!1d24.1869895!2d56.9481517"> Augusta Deglava iela 102, Rīga </a></li>
    </ul>
  <?php } else { ?>
    <a class="active" href="index.php"><img src="images/Zparts_main2.png" width="290" height="65"></a>
    <ul>
        <li><a class="profile" id="not-logo" href="my_profile.php" disabled>My profile</a></li>
        <li><a class="current" id="not-logo" href="appointment.php">Appointments  Calendar</a></li>
    </ul>
  
  </nav>


  <div class="container">
        <h1 style="color: white; text-shadow: 0 5px 0 black;">Your appointment request was submitted!</h1>
        <h3 style="color: white; text-shadow: 0 5px 0 black;">Please, wait the acceptation. Thank you!</h3>
    
        <div class="buttonHolder">
            <button class="button" onclick='window.location.href="my_profile.php"'>Back to my profile</button>
        </div>

    </div>



  <?php } ?>
    
</body>
</html>