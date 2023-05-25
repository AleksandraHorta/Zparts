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
      body{
        overflow: auto;
      }
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
      .contact-us{
        border: none;
        color: white;
        padding: 17px 57px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        background-color: #2E64FE;
        margin-top: 55px;
	
      }
      .text{
        width: 600px;
        padding-left: 170px;
        padding-top: 100px;
      }
      footer{
        position: absolute;
        right: 0;
        bottom: 0;
        left: 0;
        padding: 1rem;
        text-align: center;
        color: #fff;
      }

      .c-white{
        position: absolute;
        margin-top: 200px;
        height: 500px;
        background-color: white;
      }

    </style>
</head>
<body>

  <nav class="nav">
  <?php
    session_start();
    if(isset($_SESSION['user']) == '') { 
  ?>
  <a class="active" href="index.php"><img src="images/Zparts_main2.png" width="290" height="65"></a>
    <ul>
        <li><a id="not-logo" href="log_in.php">Log in</a></li>
        <li><a id="not-logo" target="_blank" href="user_reg.php">Sign Up</a></li>
        <li><a id="not-logo" target="_blank" href="https://www.google.com/maps/dir//zparts.lv,+Augusta+Deglava+iela+102,+Latgales+priek%C5%A1pils%C4%93ta,+R%C4%ABga,+LV-1082/@56.9481517,24.1869895,15z/data=!4m8!4m7!1m0!1m5!1m1!1s0x46eecf2bf3b2f817:0x56ee5c2a21d55b88!2m2!1d24.1869895!2d56.9481517"> Augusta Deglava iela 102, Rīga </a></li>
        <!--<li><a target="_blank" href="https://www.youtube.com/channel/UC7bS924mRjV5cikECAmdbEQ/featured"> Follow us on Youtube</a></li>-->
    </ul>
  <?php } else { ?>
    <a class="active" href="index.php"><img src="images/Zparts_main2.png" width="290" height="65"></a>
    <ul>
        <li><a id="not-logo" href="my_profile.php">My profile</a></li>
        <!--<li><a href='../php/exit.php'>Log out</a></li>-->
        <li><a id="not-logo" href="appointment.php">Appointments  Calendar</a></li>
        <!--<li><a target="_blank" href="https://www.google.com/maps/dir//zparts.lv,+Augusta+Deglava+iela+102,+Latgales+priek%C5%A1pils%C4%93ta,+R%C4%ABga,+LV-1082/@56.9481517,24.1869895,15z/data=!4m8!4m7!1m0!1m5!1m1!1s0x46eecf2bf3b2f817:0x56ee5c2a21d55b88!2m2!1d24.1869895!2d56.9481517"> Augusta Deglava iela 102, Rīga </a></li>
        <li><a target="_blank" href="https://www.youtube.com/channel/UC7bS924mRjV5cikECAmdbEQ/featured"> Follow us on Youtube</a></li>-->
    </ul>
  <?php } ?>
  </nav>

  <div class="text">
    <h1 style="color: white; font-size: 60px; text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;">We offer primary transmission diagnostic FREE of CHARGE</h1>
    <br>
    <h4 style="color: white; font-weight: 100; font-size: 20px;">Our service advisor will provide more details</h4>
    <button target="_blank" onclick="window.open('https://api.whatsapp.com/send/?phone=37128888111&text=I+would+Iike+to+sign+up+for+the+FREE+of+CHARGE+primary+transmission+diagnostic&type=phone_number&app_absent=0','_blank')" class="contact-us">Contact us</button>
    <br>
    <br>
  </div>

  <div class="c-white">

  

  


  <footer>
    <div id="author">
      <p>&#169; zparts.lv<br></p>
    </div>
    
    <div id="pr-policy">
      <a href="privacypolicy.php">Privacy Policy</a>
    </div>

    <div class="links">
      <a href="#" class="fa fa-youtube"></a>
      <a href="#" class="fa fa-facebook"></a>
    </div>
    
  </footer>

  </div>  

</body>
</html>