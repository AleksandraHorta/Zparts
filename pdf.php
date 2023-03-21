<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <link rel="stylesheet" href="css/timetable.css"> <!--For menu-panel style-->
    <script src="js/script.js"></script> <!--In script.js file is menu code-->
    <style>
        .block-right {
            position: fixed;
            right: 0;
            top: 0;
            width: 80%;
            height: 100%;
        }

        #d-users{
            margin-top: 100px;
            margin-left: 100px;
        }

        .block-left {
            position: fixed;
            right: -150px;
            top: 0;
            width: 50%;
            height: 70%;
        }
        #d-bill{
            margin-top: 100px;
            margin-right: 70px;
        }

    </style>

    
</head>
<body>

    <div class="nav" id="navbar">
        <div class="user_reg" style="text-align: center">
            <img src="images/favicon.png" width="100" height="95">
        </div>
        <a href="timetable.html">Timetable</a>
        <button class="dropdown-btn">DATABASES &#8595; </button>
        <div class="dropdown-container">
            <a href="#" onclick="maintnanceBase()">Maintnance History</a>
            <a href="#" onclick="carsBase()">Cars</a>
            <a href="db/usersBase.php">Users</a>
            <a href="db/servicesBase.php">Our Services</a>
            <a >Details</a>
        </div>
        <a class="active" href="pdf.html">PDF</a>
        <a href="statistics.html">Statistics</a>
        <button class="button" onclick="location.href='../php/exit.php';" id="log-out">LOG OUT</button>
    </div>



    <div class="block-right">
        <button class="button" id="d-users" onclick="location.href='../fpdf/download-users.php';">Download info about users</button>
    </div>


    <div class="block-left">
        <button class="button" id="d-bill" onclick="location.href='../fpdf/taxBill.php';">Download Tax Bill</button>
    </div>


    <div class="block-left2">
        <button class="button" id="d-exercise" onclick="location.href='../fpdf/workExercise.php';">Download work Exercise</button>
    </div>

    



</body>
</html>