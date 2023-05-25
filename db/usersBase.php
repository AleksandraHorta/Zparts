<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/timetable.css">
    <title>Users</title>
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

        table{
            padding: 0px 0px 0px 320px;
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
                <a onclick="location.href='../db/carsBase.php';">Cars</a>
                <a class="active" onclick="location.href='../db/usersBase.php';">Users</a>
                <a onclick="location.href='../db/servicesBase.php';">Our Services</a>
                <a >Details</a>
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

        if ($result = $mysql->query("SELECT * FROM users")) {
            $rowsCount = mysqli_num_rows($result);
            echo "<p>Total count of users in DB: $rowsCount</p>";
            echo "<table><tr><th>ID</th><th>Name</th><th>Surname</th><th>Phone</th><th>Email</th><th>Terms</th><th>Role</th><th>Change role</th></tr>";
            foreach ($result as $row) {
                echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["surname"] . "</td>";
                    echo "<td>" . $row["phone"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    //echo "<td>" . $row["password"] . "</td>";
                    echo "<td>" . $row["terms"] . "</td>";
                    echo "<td>" . $row["role"] . "</td>";
                    echo "<td><label for='role'></label><select id='role'><option value='' selected disabled hidden>". $row["role"] ."</option><option value='user'>user</option><option value='admin'>admin</option></select></td>";
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


        <form class="search" method="post" action="../php/search_user.php">
            <input name="search" type="text" class="search-input" placeholder="Search" name="search">
            <button type="submit" class="button">OK</button>
        </form>
        

    </div>


</body>
</html>


