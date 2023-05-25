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
            font-family: 'Calibri';
        }


        td, th {
            border: 1px solid black;
            padding: 8px;
            font-size: 15px;
        }

        th {
            padding-top: 10px;
            padding-left: 8px;
            padding-right: 8px;
            padding-bottom: 10px;
            text-align: center;
            background-color: #BCD3EE;
            color: black;
            border: 1px solid black;
            font-size: 15px;
        }

        .block-left table {
            padding: 70px 0px 0px 320px;
        }


        .block-right {
            position: fixed;
            left: 0;
            top: 0;
            width: 72%;
            height: 100%;
            background: white;
            overflow: auto;

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
        <a href="timetable.html">Timetable</a>
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





    <div class="block-left">
        <div class="b-back">
            <button onclick='window.location.href="../pdf.php"'>< &nbsp;Back</button>
        </div>
    
        
    <?php

        $mysql = new mysqli('localhost', 'root', '1program4*al', 'zparts');

        if(!$mysql) {
            die("Error: " .mysqli_connect_error());
        }

        if ($result = $mysql->query("SELECT w.id, w.file as wfile, i.file as ifile, w.date as wdate, i.date as idate FROM pdfinvoices as i INNER JOIN pdfworkorder as w ON i.id = w.id ORDER BY w.date DESC")) {
            $rowsCount = mysqli_num_rows($result);
            echo "<table><tr><th>ID</th><th>Work Order</th><th>Invoice</th><th>Work Order Date</th><th>Invoice Date</th></tr>";
            foreach ($result as $row) {
                echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["wfile"] . "</td>";
                    echo "<td>" . $row["ifile"] . "</td>";
                    echo "<td>" . $row["wdate"] . "</td>";
                    echo "<td>" . $row["idate"] . "</td>";
                    echo "<td><button onclick='openDetails()' id='".$row['id']."' type='submit' value='".$row['id']."' name='details'> Details </button></td>"; 
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($result);
        } else {
            echo "Error: " . mysqli_error($mysql);
        }


        $mysql->close();

    ?>


    </div>
    
</body>
</html>