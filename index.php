<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>zparts.lv - Automātisko ātrumkārbu remonts un apkope</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      .fa-youtube {
        background: #bb0000;
        color: white;
        padding: 10px;
        font-size: 27px;
        width: 50px;
        text-align: center;
        text-decoration: none;
      }

      .fa-facebook {
        background: #3B5998;
        color: white;
      }

    </style>
</head>
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





  <footer>
    <div id="author">
      <p>&#169; zparts.lv<br></p>
    </div>
    
    <div id="pr-policy">
      <a href="privacy">Privacy Policy</a>
    </div>

    <div class="links">
      <a href="#" class="fa fa-youtube"></a>
      <a href="#" class="fa fa-facebook"></a>
    </div>
    
  </footer>

</body>
</html>