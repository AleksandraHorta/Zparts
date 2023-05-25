<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/user_reg.css">
    <title>Registration</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <script src="js/log_in.js"></script>
    <style>
      body {
          background-image: url('images/user_reg.jpeg');
          background-repeat: no-repeat;
          background-size: cover;
      }
      .show{
        line-height: 35px;
        text-align: center;
        background: #1a2033;
        color: white;
        font-size: 15px;
        margin-top: 10px;
      }
      .message{
        margin:10px 0;
        width: 100%;
        border-radius: 5px;
        padding:10px;
        text-align: center;
        background-color: var(--red);
        color:var(--white);
        font-size: 20px;
      }
    </style>

    <!--For country code in phone number-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>


</head>
<body>


  <form action="php/reg.php" method="post">
    <div class="container">

      <div class="user_reg" style="text-align: center">
        <img src="images/favicon.png" width="100" height="95">
      </div>

      <?php

      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      

        <div class="box">
          <label for="firstName" class="fl fontLabel"> First Name: </label>
          <div class="fl icon"></div>  <!--Orange square-->
          <div class="input">
            <input type="text" name="name" placeholder="First Name" class="textBox" required="required">
          </div>        
        </div>
  
  
        <div class="box">
          <label for="secondName" class="fl fontLabel"> Last Name: </label>
          <div class="fl icon"></div>
          <div class="input">
            <input type="text" name="surname" placeholder="Last Name" class="textBox" required="required">
          </div>
        </div>
  
  
        <div class="box">
          <label for="phone" class="fl fontLabel"> Phone Number: </label>
          <div class="fl icon"></div>
          <div class="input">
            <input id="phone" type="tel" name="phone" maxlength="16" placeholder="+371 ..." class="textBox" required="required">
          </div>
        </div>


        <div class="box">
          <label for="email" class="fl fontLabel"> Email: </label>
          <div class="fl icon"></div>
          <div class="input">
            <input type="email" name="email" placeholder="Email" class="textBox" required="required">
          </div>
        </div>

  
        <div class="box">
          <label for="password" class="fl fontLabel"> Password: </label>
            <div class="fl icon"></div>
            <div class="input">
              <input type="Password" id="passw" name="password" placeholder="Password" class="textBox" required="required">
            </div>    
        </div>


        <div class="box">
          <label for="password" class="fl fontLabel"> Confirm: </label>
            <div class="fl icon"></div>
            <div class="input">
              <input type="Password" id="cpassw" name="cpassword" placeholder="Password" class="textBox" required="required">
            </div>    
        </div>


        <div class="box show">
          <input type="checkbox" onclick="showPassw()">&nbsp; Show password
        </div>
  
  
        <div class="box terms">
          <input type="checkbox" name="terms" required> &nbsp; I accept the terms and conditions
        </div>
              

        <div class="buttonHolder" style="text-align: center">
          <button class="button" type="submit" name="submit"> SUBMIT </button>
        </div>
              
    </div>

<!--onclick="alert('Pagaidām nav iespējams izveidot kontu!')"-->

  </form>

    
</body>

<script>
  /*
  const phoneInputField = document.querySelector("#phone");
  const phoneInput = window.intlTelInput(phoneInputField, {
    utilsScript:
      "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
  });
  // Get the selected country data and set the name attribute of the input field to the country code with a plus sign prefix
  const selectedCountryData = phoneInput.getSelectedCountryData();
  const countryCode = selectedCountryData.dialCode;
  phoneInputField.setAttribute("name", `+${countryCode}`);
  */
</script>

</html>