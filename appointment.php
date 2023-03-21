<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/appointment.css">
    <title>Appointments</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">

    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />  -->


    <style>

        * {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }

        body {
            background-image: url('images/car.jpeg');
            background-repeat: no-repeat;
            background-size: cover;
            font-family: calibri;
        }

        .nav {
            background-color: white;
        }

        .active{
            padding-left: 25px;
            display: flex;
            align-items: center;
        }


        ul{
            display: flex;
            /*width: 100%;*/
            height: 80px;
            /*margin: auto;*/
            /*justify-content: space-between;*/
            text-align: center;
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
            /*min-width: 80px;*/
            margin: auto;
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

    </style>

</head>

<script src="js/appointment.js"></script>

<body>

    <nav class="nav">

        <?php
          if(isset($_COOKIE['cookie']) == ''): 
        ?>
      
          <ul>
              <a class="active" href="index.php"><img src="images/Zparts_main2.png" width="290" height="65"></a>
              <li><a href="log_in.html">Log in</a></li>
              <li><a target="_blank" href="user_reg.html">Sign Up</a></li>
              <li><a href="appointment.php">Appointments</a></li>
              <li><a target="_blank" href="https://www.google.com/maps/dir//zparts.lv,+Augusta+Deglava+iela+102,+Latgales+priek%C5%A1pils%C4%93ta,+R%C4%ABga,+LV-1082/@56.9481517,24.1869895,15z/data=!4m8!4m7!1m0!1m5!1m1!1s0x46eecf2bf3b2f817:0x56ee5c2a21d55b88!2m2!1d24.1869895!2d56.9481517"> Augusta Deglava iela 102, Rīga </a></li>
              <li><a target="_blank" href="https://www.youtube.com/channel/UC7bS924mRjV5cikECAmdbEQ/featured"> Follow us on Youtube</a></li>
          </ul>

        <?php else: ?>
      
          <ul>
              <a class="active" href="index.php"><img src="images/Zparts_main2.png" width="290" height="65"></a>
              <li><a href="my_profile.php">My profile</a></li>
              <li><a href='../php/exit.php'>Log out</a></li>
              <li><a href="appointment.php">Appointments</a></li>
              <li><a target="_blank" href="https://www.google.com/maps/dir//zparts.lv,+Augusta+Deglava+iela+102,+Latgales+priek%C5%A1pils%C4%93ta,+R%C4%ABga,+LV-1082/@56.9481517,24.1869895,15z/data=!4m8!4m7!1m0!1m5!1m1!1s0x46eecf2bf3b2f817:0x56ee5c2a21d55b88!2m2!1d24.1869895!2d56.9481517"> Augusta Deglava iela 102, Rīga </a></li>
              <li><a target="_blank" href="https://www.youtube.com/channel/UC7bS924mRjV5cikECAmdbEQ/featured"> Follow us on Youtube</a></li>
          </ul>
      
      
        <?php endif; ?>
      
        </nav>


    <div class="calendar">
        <button id="btnPrev" type="button">« Previous </button>
        <button id="btnNext" type="button"> Next »</button>
    <div id="divCal"></div>
    </div>




    <!--<button id="submit">SUBMIT</button>


    <div id="myModal" class="modal">

    <div class="modal-content">
        <span class="close">×</span>
        <p>Your appointment has been submitted for review.</p>
    </div>

    </div>-->
    
</body>
</html>