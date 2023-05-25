<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/timetable.css">
    <title>Timetable</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <style>

      body{
            font-family: 'Calibri';
      }

      .block-left {
            position: fixed;
            left: 0;
            top: 0;
            width: 72%;
            height: 100%;
            background: white;

        }

        .block-right {
            position: fixed;
            right: 0;
            top: 0;
            width: 80%;
            height: 100%;
            /*background: #D3D3D3;*/

        }

      </style>
      <script src="js/script.js"></script> <!--In script.js file is menu code-->

</head>
<body>

<div class="block-left">
  <div class="nav" id="navbar">

    <div class="user_reg" style="text-align: center">
        <img src="images/favicon.png" width="100" height="95">
    </div>

    <a class="active" href="#">Timetable</a>
    <a href="requests.php">Requests</a>

    <button class="dropdown-btn">DATABASES &#8595; </button>
    <div class="dropdown-container">
        <a onclick="location.href='../db/maintnancesBase.php';">Maintnance History</a>
        <a href="#" onclick="carsBase()">Cars</a>
        <a onclick="location.href='../db/usersBase.php';">Users</a>
        <a onclick="location.href='../db/servicesBase.php';">Our Services</a>
        <a onclick="location.href='../db/detailsBase.php';">Details</a>
    </div>
    <a href="pdf.php">PDF</a>
    <a href="statistics.html">Statistics</a>



    
    <button class="button" onclick="location.href='../php/exit.php';" id="log-out">LOG OUT</button>
    

  </div>
</div>

  <div class="block-right">
    
  </div>


  
  



</body>
</html>