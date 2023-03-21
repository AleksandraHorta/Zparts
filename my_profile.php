<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My profile</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <link rel="stylesheet" href="css/my_profile.css"> <!--For panel style-->
    <script src="js/user_script_my_profile.js"></script>
</head>
<body>

    <menu-panel></menu-panel>

    <h1>Hello, <?=$_COOKIE['cookie']?>!</h1>




    <div class="card">
        <div class="card_background_img"></div>
        <div class="card_profile_img"></div>
        <div class="user_details">
            <h3>Name Surname</h3>
            <p>ZPARTS.LV system user</p>
        </div>
        <div class="card_count">
            <div class="count">
                <div class="fans">
                    <h3>2</h3>
                    <p>cars</p>
                </div>
                <div class="following">
                    <h3>0</h3>
                    <p>appointments</p>
                </div>

            </div>
             <div class="btn">ADD car</div>
        </div>
    </div>

    <div class="field">

        <div class="your-cars">

        </div>

        <div class="your-appointments">

        </div>




        <div class="buttonHolder" style="text-align: center">
            <button class="button" onclick="location.href='../php/exit.php';"> LOG OUT </button>
        </div>

    </div>



    
</body>
</html>