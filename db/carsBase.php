<?php
session_start();
if (isset($_SESSION['user'])) {
    
    $mysql = new mysqli('localhost', 'root', '1program4*al', 'zparts');

    $x = $_SESSION['user']['email'];

    $result = $mysql->query("SELECT role FROM users 
                                WHERE email = '$x';");

    while ($row = $result->fetch_assoc()) {
        $role = $row['role'];
    }

    if ($role == 'admin') {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/timetable.css">
    <title>Maintnances</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.png">
    <style>
        body{
            font-family: 'Calibri';
        }

        p{
            text-transform: uppercase;
            font-size: 25px;
            text-align: center; 
            font-weight: bold;
        }

        td, th {
            border: 1px solid black;
            padding: 4px;
            font-size: 14px;
        }

        th {
            padding-top: 8px;
            padding-left: 5px;
            padding-right: 5px;
            padding-bottom: 8px;
            text-align: center;
            background-color: #BCD3EE;
            color: black;
            border: 1px solid black;
            font-size: 14px;
        }

        table{
            padding: 0px 0px 0px 315px;
        }


        .search{
            padding: 82px 10px 10px 15px;
        }

        .block-left {
            position: fixed;
            left: 0;
            top: 0;
            width: 78%;
            height: 100%;
            background: white;
            overflow: auto;

        }

        .block-right {
            position: fixed;
            right: 0;
            top: 0;
            width: 22%;
            height: 100%;
            background: #D3D3D3;

        }


</style>
</head>
<body>

    <div class="block-left">    
        <div class="nav" id="navbar">

            <div class="user_reg" style="text-align: center">
                <img src="../images/favicon.png" width="100" height="95">
            </div>

            <a href="../timetable.php">Timetable</a>
            <a href="../requests.php">Requests</a>

            <button class="dropdown-btn">DATABASES &#8595; </button>
            <div class="dropdown-container">
                <a onclick="location.href='../db/maintnancesBase.php';">Maintnance History</a>
                <a class="active" onclick="location.href='../db/carsBase.php';">Cars</a>
                <a onclick="location.href='../db/usersBase.php';">Users</a>
                <a onclick="location.href='../db/servicesBase.php';">Our Services</a>
                <a href="#">Details</a>
            </div>
            <a href="../pdf.php">PDF</a>
            <!--<a href="statistics.html">Statistics</a>-->

            <button class="button" onclick="location.href='../php/exit.php';" id="log-out">LOG OUT</button>

        </div>


        <?php

        $mysql = new mysqli('localhost', 'root', '1program4*al', 'zparts');

        if(!$mysql) {
            die("Error: " .mysqli_connect_error());
        }

        if ($result = $mysql->query("SELECT *, CONCAT(u.name, ' ', u.surname, ' ', u.phone) as person, CONCAT(engine, ' ', engineCapacity) as engine FROM cars as c
                                        INNER JOIN users as u ON u.id = c.user_id;")) {
            $rowsCount = mysqli_num_rows($result);
            echo "<p>Total count of cars in DB: $rowsCount</p>";
            echo "<table><tr><th>VIN</th><th>Country Number</th><th>Person</th><th>Brand & Model</th><th>Registration Date</th><th>Engine</th><th>Transmission</th></tr>";
            foreach ($result as $row) {
                echo "<tr>";
                    echo "<td>" . $row["vinNumber"] . "</td>";
                    echo "<td>" . $row["countryNumber"] . "</td>";
                    echo "<td>" . $row["person"] . "</td>";
                    echo "<td>" . $row["carBrand"] . " " . $row["model"] . "</td>";
                    echo "<td>" . $row["regDate"] . "</td>";
                    echo "<td>" . $row["engine"] . "</td>";
                    echo "<td>" . $row["drive"] . "</td>";
                    echo "<td><button onclick='openDetails()' id='".$row['id']."' type='submit' value='".$row['id']."' name='details'> Details </button></td>"; 
                    echo "<td><button onclick='openUpdate()' id='".$row['id']."' type='submit' value='".$row['id']."' name='update'> Edit </button></td>"; 
                    //echo "<td><button type='submit' id='delete' value='".$row['id']."' name='delete'> Delete </button></td>";

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

    <div class="block-right">


        <form class="search" method="post" action="">
            <input name="search" type="text" class="search-input" placeholder="Search" name="search">
            <button type="submit" class="button">OK</button>
        </form>
        

    </div>


</body>
</html>

<?php
} else {
    echo "<div style='margin-top: 290px;'>";
    echo "<h1 style='text-align: center; height: 50%';>Something went wrong! You don't have access to this page!</h1>";
    echo "</div>";
}
}
?>