<?php
session_start();
$mysql = new mysqli('localhost', 'root', '1program4*al', 'zparts');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work Order</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.png">
    <link rel="stylesheet" href="../css/timetable.css"> <!--For menu-panel style-->
    <style>
        body{
            font-family: calibri;
        }

        .block-right {
            font-family: calibri;
            position: fixed;
            right: 14px;
            top: 85px;
            width: 75%;
            height: 100%;

        }


        #description, #car {
            font-family: calibri;
            left: 25%;
            top: 10%;
            width: 20%;
            font-size: 16px;
        }

        label {
            font-size: 17px;
        }

        .b-back button {
            font-family: calibri;
            border: none;
            color: white;
            padding: 12px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 15px;
            margin: 4px 2px;
            cursor: pointer;
            text-transform: uppercase;
            background-color: #2E64FE;
            top: 3%;
            left: 24%;
            position: absolute;
        }


    </style>
</head>
<body>
    <div class="nav" id="navbar">
        <div class="user_reg" style="text-align: center">
            <img src="../images/favicon.png" width="100" height="95">
        </div>
        <a href="timetable.php">Timetable</a>
        <button class="dropdown-btn">DATABASES &#8595; </button>
        <div class="dropdown-container">
            <a onclick="location.href='../db/maintnancesBase.php';">Maintnance History</a>
            <a href="#" onclick="carsBase()">Cars</a>
            <a href="../db/usersBase.php">Users</a>
            <a href="../db/servicesBase.php">Our Services</a>
            <a >Details</a>
        </div>
        <a class="active" href="pdf.html">PDF</a>
        <!--<a href="../statistics.html">Statistics</a>-->
        <button class="button" onclick="location.href='../php/exit.php';" id="log-out">LOG OUT</button>
    </div>


    <div class="b-back">
        <button onclick='window.location.href="../pdf.php"'>< &nbsp;Back</button>
    </div>


    <div class="block-right">
        
        <h2>Choose the details: </h2>
        <form id="tax-bill" action="download-workorder.php" method="post">

            <div class="box">
                <label for="client">Client:  </label>
                <input name="client" type="text" placeholder="Klients">
            </div>

            <br><br>
            <div class="box">
                <label for="address">Address:  </label>
                <input name="address" type="text" placeholder="Izk.adrese">
            </div>


            <br><br>
            <div class="box">
                    <label>Service: </label>
                    <select name="service" type="text" placeholder="Pieprasījums" required>
                    <?php 
                    if ($car = $mysql->query("SELECT id, serviceName FROM `services` ORDER BY serviceName")) {
                        echo "<option value='' selected disabled hidden>Pieprasījums</option>";
                        foreach ($car as $row) {
                            echo "<option value="  . $row["serviceName"] . ">" . $row["serviceName"] . "</option>";
                        }
                        mysqli_free_result($car);
                    } 
                            ?> 
                            </select>
            </div>
                
                <br><br>
                <div class="box">
                    <label>Driver: </label>
                    <select name="driver" type="text" placeholder="Vadītājs" required>
                    <?php 
                    if ($car = $mysql->query("SELECT id, CONCAT(name, ' ', surname) as ns, CONCAT(name, ' ', surname, ' &nbsp;&nbsp;&nbsp; (', phone, ')') as usr FROM `users` ORDER BY name, surname")) {
                        echo "<option value='' selected disabled hidden>Vadītājs</option>";
                        foreach ($car as $row) {
                            echo "<option value="  . $row["ns"] . ">" . $row["usr"] . "</option>";
                        }
                        mysqli_free_result($car);
                    } 
                            ?> 
                            </select>
                </div>
                <br><br>
                <div class="box">
                    <label>Car: </label>
                    <select name="car" type="text" placeholder="Tr.līdzeklis" required>
                    <?php 
                    if ($car = $mysql->query("SELECT id, countryNumber, CONCAT(carBrand, ' ', model, ', ', countryNumber) as inf, carBrand, model, countryNumber FROM `cars` ORDER BY carBrand, model, countryNumber")) {
                        echo "<option value='' selected disabled hidden>Tr.līdzeklis</option>";
                        foreach ($car as $row) {
                            echo "<option value="  . $row["countryNumber"] . ">" . $row["inf"] . "</option>";
                        }
                        mysqli_free_result($car);
                    } 
                    ?> 
                    </select>
                </div>

                <br><br>
                <div class="box">
                    <label for="notes">Notes:  </label>
                    <input name="notes" type="text" placeholder="Piezīmes">
                </div>

                <br><br>
                <div class="box">
                    <label for="mechanician">Izsniedza: </label>
                    <select name="mechanician" id="description">
                        <option value="Aleksejs Granovskis">Aleksejs Granovskis</option>
                        <option value="Sergejs Horts">Sergejs Horts</option>
                    </select>
                </div>
                <br><br>

                <div class="button-holder">
                    <button class="button" type="submit" id="submit" onclick="location.href='../fpdf/download-invoice.php';">Create</button>
                </div>
        </form>
    </div>

    
</body>
</html>