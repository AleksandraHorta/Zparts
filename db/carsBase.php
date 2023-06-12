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
            padding: 0px 20px 0px 315px;
        }


        .search{
            padding: 82px 10px 10px 100px;
        }

        .block-left {
            position: fixed;
            left: 0;
            top: 0;
            width: 70%;
            height: 100%;
            background: white;
            overflow: auto;

        }

        .block-right {
            position: fixed;
            right: 0;
            top: 0;
            width: 30%;
            height: 100%;
            background: #D3D3D3;

        }

        #details{
            background-color: #0096FF;
            color: black;
            border: none;
            cursor: pointer;
            width: 60px;
            height: 30px;
        }

        .block-right table {
            padding: 20px 15px 0px 35px;
        }

        .form-service3 {
            display: block; /*Hide by default*/
            position: absolute;
            bottom: 55px;
            right: 180px;
            border: 2px solid #c0c0c0;
        }

        .form-container {
            max-width: 280px;
            padding: 15px 20px;
            background-color: white;
        }

        .form-container input[type=text], .form-container input[type= number] {
            width: 89%;
            padding: 8px;
            margin: 3px 0 15px 0;
            border: none;
            background: #f1f1f1;
        }

        .form-container .btn {
            background-color: #4CAF50;
            color: white;
            padding: 14px;
            border: none;
            cursor: pointer;
            width: 60%;
            margin-bottom: 7px;
            opacity: 1;
	        font-size: 15px;
            margin-left: 58px;
        }

        .form-container .cancel {
            background-color: red;
        }

        .form-container .btn:hover, .open-button:hover {
            opacity: 0.85;  /*On cursor effect*/
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
                <a onclick="location.href='../db/detailsBase.php';">Details</a>
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

        if ($result = $mysql->query("SELECT *, c.id AS car_id, CONCAT(u.name, ' ', u.surname, ' (', u.phone, ')') as person, engine FROM cars as c
                                        INNER JOIN users as u ON u.id = c.user_id;")) {
            $rowsCount = mysqli_num_rows($result);
            echo "<form method='GET'>"; 
            echo "<p>Total count of cars in DB: $rowsCount</p>";
            echo "<table><tr><th>Country Number</th><th>Person</th><th>Brand & Model</th><th>Registration Date</th><th>Engine</th><th>Transmission</th></tr>";
            foreach ($result as $row) {
                echo "<tr>";
                    //echo "<td>" . $row["vinNumber"] . "</td>";
                    echo "<td>" . $row["countryNumber"] . "</td>";
                    echo "<td>" . $row["person"] . "</td>";
                    echo "<td>" . $row["carBrand"] . " " . $row["model"] . "</td>";
                    echo "<td>" . $row["regDate"] . "</td>";
                    echo "<td>" . $row["engine"] . "</td>";
                    echo "<td>" . $row["drive"] . "</td>";
                    echo "<td><button onclick='openDetails()' type='submit' id='details' value='".$row['car_id']."' name='details'> Details </button></td>"; 
                    //echo "<td><button onclick='openUpdate()' id='".$row['id']."' type='submit' value='".$row['id']."' name='update'> Edit </button></td>"; 
                    //echo "<td><button type='submit' id='delete' value='".$row['id']."' name='delete'> Delete </button></td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</form>";
            mysqli_free_result($result);
        } else {
            echo "Error: " . mysqli_error($mysql);
        }


        if(isset($_GET['details'])){
            $selected = $_GET['details'];
            $res = $mysql->query("SELECT * FROM cars WHERE `id` = $selected;");

            foreach($res as $row) {
            
        ?>
            <div class="form-service3" id="detailsCar">
                <form action="#" class="form-container" method="GET">

                    <label>VIN number: </label>
                    <input type="text" id="vinNumber" name="vinNumber" value="<?php echo $row["vinNumber"] ?>" disabled>

                    <label>Country number: </label>
                    <input type="text" id="countryNumber" name="serviceName" value="<?php echo $row["countryNumber"] ?>" disabled>

                    <label>Car Brand: </label>
                    <input type="text" id="carBrand" name="carBrand" value="<?php echo $row["carBrand"] ?>" disabled>

                    <label>Model: </label>
                    <input type="text" id="model" name="model" value="<?php echo $row["model"] ?>" disabled>

                    <label>Registration date: </label>
                    <input type="date" id="regDate" name="regDate" value="<?php echo $row["regDate"] ?>" disabled>

                    <label>Engine: </label>
                    <input type="text" id="engine" name="engine" value="<?php echo $row["engine"] ?>" disabled>

                    <label>Engine Capacity: </label>
                    <input type="number" id="engineCapacity" name="engineCapacity" value="<?php echo $row["engineCapacity"] ?>" disabled>

                    <label>Drive: </label>
                    <input type="text" id="drive" name="drive" value="<?php echo $row["drive"] ?>" disabled>

                    <button type="button" class="btn cancel" onclick="closeDetails()">Close</button>
                </form>
            </div>

            <?php
            }
        }
            ?>

    </div>

    <div class="block-right">


        <form class="search" method="post" action="">
            <input name="search" type="text" class="search-input" placeholder="Search" name="search">
            <button name="submitButton" type="submit" class="button">OK</button>
        </form>

        <?php

        if(isset($_POST['submitButton'])){ //check if form was submitted


            $search = $_POST['search'];  // get input text
            $search = trim($search); 
            $search = htmlspecialchars($search);

            if ($search == null) {  // if input is empty -> do nothing
                exit();
            }

                if ($result = $mysql->query("SELECT *
                FROM `cars` WHERE `vinNumber` LIKE '%$search%'
                OR `countryNumber` LIKE '%$search%'
                OR `carBrand` LIKE '%$search%'
                OR `model` LIKE '%$search%'
                OR `drive` LIKE '%$search%'")) {
                if (mysqli_num_rows($result) == 0) {
                    echo "<p1 style='padding-left: 150px;'>Nothing found!</p1>";
                    exit();
                }
                echo "<form method='GET'>";
                echo "<table><tr><th>Country Number</th><th>Brand & Model</th><th>Registration Date</th><th>Engine</th><th>Transmission</th></tr>";
                foreach ($result as $row) {
                    echo "<tr>";
                        //echo "<td>" . $row["vinNumber"] . "</td>";
                        echo "<td>" . $row["countryNumber"] . "</td>";
                        echo "<td>" . $row["carBrand"] . " " . $row["model"] . "</td>";
                        echo "<td>" . $row["regDate"] . "</td>";
                        //echo "<td>" . $row["engine"] . "</td>";
                        echo "<td>" . $row["drive"] . "</td>";
                        echo "<td><button onclick='openDetails()' id='details' type='submit' value='".$row['id']."' name='details'> Details </button></td>"; 
                        //echo "<td><button onclick='openUpdate()' id='".$row['id']."' type='submit' value='".$row['id']."' name='update'> Edit </button></td>"; 
                        //echo "<td><button type='submit' id='delete' value='".$row['id']."' name='delete'> Delete </button></td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "</form>";
                mysqli_free_result($result);
            } else {
                echo "Error: " . mysqli_error($mysql);
            }

            $mysql->close();

        } 
    
?>
        

    </div>


</body>
<script>
    function openDetails() {
        document.getElementById("detailsCar").style.display = "block";
    }
    function closeDetails() {
        document.getElementById("detailsCar").style.display = "none";
    }
</script>
</html>

<?php
} else {
    echo "<div style='margin-top: 290px;'>";
    echo "<h1 style='text-align: center; height: 50%';>Something went wrong! You don't have access to this page!</h1>";
    echo "</div>";
}
}

?>