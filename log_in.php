<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/log_in.css">
    <title>Log in</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <script src="js/log_in.js"></script>
    <style>
        body {
            background-image: url('images/user_reg.jpeg');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>


</head>
<body>


    <form action="php/log_in.php" method="post">
        <div class="container">
            
            <div class="user_reg" style="text-align: center">
                <img src="images/favicon.png" width="100" height="95">
            </div>

            <div class="form">
                <div class="box">
                    <label for="email" class="fl fontLabel"> Email: </label>
                    <div class="fl icon"></div> <!--Orange square-->
                    <div class="input">
                        <input type="email" name="username" placeholder="Email" class="textBox" required="required">
                    </div>
                        
                </div>
            
            
                <div class="box">
                    <label for="password" class="fl fontLabel"> Password: </label>
                    <div class="fl icon"></div>
                    <div class="input">
                        <input type="password" name="password" placeholder="Password" class="textBox" id="passw" required="required">
                    </div> 
                </div>


                <div class="box show">
                    <input type="checkbox" onclick="showPassw()">&nbsp; Show password
                </div>
                
<!--
                <div class="box remember">
                    <input type="checkbox" name="remember"> &nbsp; Remember me
                </div>
-->

                <div class="buttonHolder" style="text-align: center">
                    <button class="button"> LOG IN </button>
                </div>
        
            </div>

        </div>

    </form>
    
</body>

</html>