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
            width: 50%;
            height: 100%;
        }

        #d-users{
            position: absolute;
            top: 15%;
            left: -38%;


        }

        .block-left {
            position: fixed;
            right: 0px;
            top: 0;
            width: 50%;
            height: 100%;
        }
        #d-invoice{
            position: absolute;
            top: 25%;
            right: 48%;
        }
        #d-order {
            position: absolute;
            top: 15%;
            right: 45%;
        }

    </style>

    
</head>
<body>

    <div class="nav" id="navbar">
        <div class="user_reg" style="text-align: center">
            <img src="images/favicon.png" width="100" height="95">
        </div>
        <a href="timetable.php">Timetable</a>
        <a href="requests.php">Requests</a>
        <button class="dropdown-btn">DATABASES &#8595; </button>
        <div class="dropdown-container">
            <a onclick="location.href='../db/maintnancesBase.php';">Maintnance History</a>
            <a onclick="location.href='../db/carsBase.php';">Cars</a>
            <a href="db/usersBase.php">Users</a>
            <a href="db/servicesBase.php">Our Services</a>
            <a >Details</a>
        </div>
        <a class="active" href="pdf.html">PDF</a>
        <!--<a href="statistics.html">Statistics</a>-->
        <button class="button" onclick="location.href='../php/exit.php';" id="log-out">LOG OUT</button>
    </div>



    <div class="block-right">
        <button class="button" id="d-users" onclick="location.href='../fpdf/latestDoc.php';">View latest Documents</button>
    </div>


    <div class="block-left">
        <button class="button" id="d-order" onclick="location.href='../fpdf/workOrder.php';">Create Work order</button>
        <button class="button" id="d-invoice" onclick="location.href='../fpdf/invoice.php';">Create Invoice</button>
    </div>


    



</body>
</html>