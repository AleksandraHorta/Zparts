<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
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
            border: none;
            color: white;
            padding: 12px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;
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
        <a href="../statistics.html">Statistics</a>
        <button class="button" onclick="location.href='../php/exit.php';" id="log-out">LOG OUT</button>
    </div>


    <div class="b-back">
        <button onclick='window.location.href="../pdf.php"'>< &nbsp;Back</button>
    </div>


    <div class="block-right">
        
        <h2>Choose the details: </h2>
        <form id="tax-bill" action="../fpdf/download-invoice.php">
            <label for="description">Darījuma apraksts:  </label>
            <select name="description" id="description">
                <option value="maintnance">Autoremonts</option>
                <option value="diagnostics">Diagnostika</option>
                <option value="oil-change">Eļļas maiņa</option>
                <option value="level-check">Eļļas līmeņa pārbaude</option>
            </select>
            <br><br>
            <label for="car">Transporta līdzeklis:  </label>
            <select name="car" id="car">
                <option value="value">$info</option>

            </select>
            <br><br>
            <label for="description">Vadītājs:  </label>
            <select name="description" id="description">
                <option value="maintnance">Autoremonts</option>
                <option value="diagnostics">Diagnostika</option>
                <option value="oil-change">Eļļas maiņa</option>
                <option value="level-check">Eļļas līmeņa pārbaude</option>
            </select>
            <br><br>
            <label for="description">Izsniedza:  </label>
            <select name="description" id="description">
                <option value="aleksejs">Aleksejs Granovskis</option>
                <option value="sergejs">Sergejs Horts</option>
            </select>
            <br><br>
            <div class="button-holder">
                <button class="button" id="submit" onclick="location.href='../fpdf/download-invoice.php';">Create</button>
            </div>
        </form>
    </div>

    
</body>
</html>