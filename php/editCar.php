<?php 
    session_start();

    $mysql = new mysqli('localhost', 'root', '1program4*al', 'zparts');

    if(!$mysql) {
        die("Error: " .mysqli_connect_error());
    }



    if (isset($_POST['update'])) {

        $firstname = $_POST['firstname'];
        $user_id = $_POST['user_id'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $id = $_POST['user_id'];
        $phone = $_POST['phone']; 

        $result = $mysql->query("UPDATE `users` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`phone`='$phone' WHERE `id`='$user_id'");

        if ($result == true) {
            echo "Record updated successfully.";
        } else {
            echo "Error:";
        }

    } 

if (isset($_GET['id'])) {

    $user_id = $_GET['id']; 

    $result = $mysql->query("SELECT * FROM `users` WHERE `id`='$user_id'");


    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $first_name = $row['name'];
            $lastname = $row['surname'];
            $email = $row['email'];
            $phone = $row['phone'];
            $password  = $row['password'];
            $id = $row['id'];

        } 

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/user_reg.css">
    <title>Edit Car</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <style>
        body {
            background-image: url('images/car.jpeg');
            background-repeat: no-repeat;
            background-size: cover;
            font-family: calibri;
        }
        h2 {
            margin-bottom: 30px;
            text-align: center;
        }
        .back-holder{
            padding-left: 280px;
        }
        .button-back{
          background-color: red;
          padding: 6px;
          color: white;
          width: 80px;
          position: absolute;
          bottom: 41px;
          right: 30px;
          border: none;
          cursor: pointer;
        }
    </style>
</head>
<body>
    
</body>
</html>

<div class="container">
    <form action="" method="post">


        <h2 style="color: white">Update personal data: </h2>


        <input type="hidden" name="user_id" value="<?php echo $id; ?>">

        <div class="box">
          <label for="firstName" class="fl fontLabel"> First Name: </label>
          <div class="fl icon"></div>
          <div class="input">
            <input type="text" name="firstname" value="<?php echo $first_name; ?>" class="textBox" required="required">
          </div>        
        </div>
  
  
        <div class="box">
          <label for="secondName" class="fl fontLabel"> Last Name: </label>
          <div class="fl icon"></div>
          <div class="input">
            <input type="text" name="lastname" value="<?php echo $lastname; ?>" class="textBox" required="required">
          </div>
        </div>
  
  
        <div class="box">
          <label for="phone" class="fl fontLabel"> Phone Number: </label>
          <div class="fl icon"></div>
          <div class="input">
            <input id="phone" type="tel" name="phone" value="<?php echo $phone; ?>" maxlength="10" class="textBox" required="required">
          </div>
        </div>


        <div class="box">
          <label for="email" class="fl fontLabel"> Email: </label>
          <div class="fl icon"></div>
          <div class="input">
            <input type="email" name="email" value="<?php echo $email; ?>" class="textBox" required="required">
          </div>
        </div>

        <br>

        <div class="buttonHolder" style="text-align: center">
            <input class="button" type="submit" value="Update info" name="update">
        </div>
        <br>
    </form> 

        <hr style="border: 1px solid white">
        <br>
        <form action="" method="post">

          <div class="box">
            <label for="old-pass" class="fl fontLabel"> Old Password: </label>
            <div class="fl icon"></div>
            <div class="input">
              <input id="old-pass" type="password" name="old-pass" placeholder="Old password" class="textBox" required="required">
            </div>
          </div>


          <div class="box">
            <label for="new-pass" class="fl fontLabel"> New Password: </label>
            <div class="fl icon"></div>
            <div class="input">
              <input id="new-pass" type="password" name="new-pass" placeholder="New password" class="textBox" required="required">
            </div>
          </div>

          <br>

          <div class="buttonHolder" style="text-align: center">
              <input class="button" type="submit" value="Update password" name="update-pass">
          </div>

          <div class="back-holder" style="text-align: center">
              <input class="button-back" type="submit" value="Back" onclick='window.location.href="my_profile.php"' name="back">
          </div>


      <?php

      if(isset($_POST['update-pass'])){

          $opassword = $_POST['old-pass'];
          $npassword = $_POST['new-pass'];

          $npassword = md5($npassword."waalyelkasnad4312");
          $opassword = md5($opassword."waalyelkasnad4312");

          if ($password != $opassword) {


            echo '<script type="text/javascript">';
            echo 'alert("Old password is incorrect!")';
            echo '</script>';
            exit();
          }

          //$password = md5($password."waalyelkasnad4312");

          $x = $_SESSION['user']['email'];

          $mysql->query("UPDATE `users` SET `password` = '$npassword' WHERE `id` = '$x';");

          $mysql->close();


          //header('Location: my_profile.php');

      }
      ?>

      </form>



</div>


</body>

</html> 

    <?php

    } else{ 

        echo "Something went wrong!";

    } 

}

?> 