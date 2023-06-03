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
        *{
            font-family: 'Calibri';
        }
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
            padding: 6px;
            font-size: 14px;
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

        .new{
            background-color: white;
            border: 4px solid green;
            border-color: #4CAF50;
            color: black;
            padding: 16px 20px;
            cursor: pointer;
            padding: 5px 5px;
            position: absolute;
            top: 37px;
            right: 73px;
            width: 100px;
            height: 40px;
            font-size: 18px;
            font-weight: bold;
        }

        .form-container {
            max-width: 280px;
            padding: 15px 20px;
            background-color: white;
        }

        .form-container input[type=text], .form-container input[type= number] {
            width: 89%;
            padding: 15px;
            margin: 5px 0 22px 0;
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

        label{
            font-size: 18px;
        }

        #delete{
            background-color: red;
            color: black;
            border: none;
            cursor: pointer;
            width: 60px;
            height: 30px;

        }

        #details{
            background-color: #0096FF;
            color: black;
            border: none;
            cursor: pointer;
            width: 60px;
            height: 30px;
        }

        #update{
            background-color: yellow;
            color: black;
            border: none;
            cursor: pointer;
            width: 60px;
            height: 30px;
        }
        .box{
            margin-top: 6px;
        }
        .f-container .box{
            text-align: center;
        }
        .f-button{
            margin-left: 120px;
            margin-top: 30px;
            border: none;
            color: white;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            font-size: 12px;
            cursor: pointer;
            text-transform: uppercase;
            background-color: #2E64FE;
        }


</style>
</head>
<body>


    <div class="block-right">

        <div class="f-container">
            <form class="search" method="post" action=""> <!--../php/filterMaintnances.php-->
                <div class="box">
                    <label>Service: </label>
                    <select name="service" type="text" placeholder="Service" class="search-input">
                        <?php 
                        if ($serv = $mysql->query("SELECT id, serviceName FROM `services` ORDER BY serviceName")) {
                            echo "<option value='' selected disabled hidden>Choose service</option>";
                            foreach ($serv as $row) {
                                echo "<option value=" . $row["id"] . ">" . $row["serviceName"] . "</option>";
                            }
                            mysqli_free_result($serv);
                        } 
                        ?>
                        </select>
                </div>
                <div class="box">
                    <label>Car brand: </label>
                    <input name="brand" type="text" class="search-input" placeholder="Search" name="search">
                </div>
                <div class="box">
                    <label>Car model: </label>
                    <input name="model" type="text" class="search-input" placeholder="Search" name="search">
                </div>
                <div class="box">
                    <label>Start date: </label>
                    <input name="start" type="date" class="search-input" placeholder="Search" name="search">
                </div>
                <div class="box">
                    <label>End date: </label>
                    <input name="end" type="date" class="search-input" placeholder="Search" name="search">
                </div>
                <div class="box">
                    <label>Total price: </label>
                    <input name="price" type="number" class="search-input" placeholder="Search" name="search">
                </div>
                <div class="box">
                    <label>Notes: </label>
                    <input name="notes" type="text" class="search-input" placeholder="Search" name="search">
                </div>
                <button name="filter" type="submit" class="f-button">Filter</button>
            </form>
        </div>


        <?php

        //if(isset($_POST['filter'])) { //check if form was submitted

            /*$search = $_POST['search'];  // get input text
            $search = trim($search); 
            $search = htmlspecialchars($search);

            if ($search == null) {  // if input is empty -> do nothing
              */  
            ?> 

            <div class="block-left">    
                <div class="nav" id="navbar">

                    <div class="user_reg" style="text-align: center">
                        <img src="../images/favicon.png" width="100" height="95">
                    </div>

                    <a href="../timetable.php">Timetable</a>
                    <a href="../requests.php">Requests</a>

                    <button class="dropdown-btn">DATABASES &#8595; </button>
                    <div class="dropdown-container">
                        <a class="active" onclick="location.href='../db/maintnancesBase.php';">Maintnance History</a>
                        <a onclick="location.href='../db/carsBase.php';">Cars</a>
                        <a onclick="location.href='../db/usersBase.php';">Users</a>
                        <a onclick="location.href='../db/servicesBase.php';">Our Services</a>
                        <a href="#">Details</a>
                    </div>
                    <a href="../pdf.php">PDF</a>
                    <!--<a href="statistics.html">Statistics</a>-->

                    <button class="button" onclick="location.href='../php/exit.php';" id="log-out">LOG OUT</button>

                </div>


                <button class="new" onclick="location.href='../php/newMaintnance.php';">New</button>


        <?php
            //}

        if ($result = $mysql->query("SELECT m.id, s.serviceName, CONCAT(c.countryNumber, ' ', c.carBrand, '-', c.model, ', ', YEAR(c.regDate)) AS car, m.startDate, m.endDate, m.totalPrice
                                        FROM maintnances as m
                                        INNER JOIN services as s
                                        ON s.id = m.service_id
                                        INNER JOIN cars as c
                                        ON c.id = m.car_id;")) {
            $rowsCount = mysqli_num_rows($result);
            echo "<form method='GET'>"; 
            echo "<p>Total count of maintnances in DB: $rowsCount</p>";
            echo "<table><tr><th>ID</th><th>Service</th><th>Car</th><th>Start Date</th><th>End Date</th><th>Total Price</th></tr>";
            foreach ($result as $row) {
                echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["serviceName"] . "</td>";
                    echo "<td>" . $row["car"] . "</td>";
                    echo "<td>" . $row["startDate"] . "</td>";
                    echo "<td>" . $row["endDate"] . "</td>";
                    echo "<td>" . $row["totalPrice"] . "</td>";
                    echo "<td><button type='submit' id='details' value='".$row['id']."' name='details'> Details </button></td>"; 
                    echo "<td><button type='submit' id='update' value='".$row['id']."' name='update'> Edit </button></td>"; 
                    echo "<td><button type='submit' id='delete' value='".$row['id']."' name='delete'> Delete </button></td>";

                echo "</tr>";
            }
            echo "</table>";
            echo "</form>";
            mysqli_free_result($result);
        } else {
            echo "Error: " . mysqli_error($mysql);
        }


        if(isset($_GET['delete'])){
            $deleted = $_GET['delete'];
            $mysql->query("DELETE FROM maintnances WHERE `id` = $deleted;");

        }

        //$mysql->close();

        ?>

    <!--</div>-->

        <?php

        if(isset($_POST['filter'])) {
            
            $brand = $_POST['brand'];
            $brand = trim($brand); 
            $brand = htmlspecialchars($brand);

            $service = $_POST['service'];

            $model = $_POST['model'];
            $model = trim($model); 
            $model = htmlspecialchars($model);

            $start = $_POST['start'];

            $end = $_POST['end'];
            
            $price = $_POST['price'];

            $notes = $_POST['notes'];
            $notes = trim($notes); 
            $notes = htmlspecialchars($notes);


            if ($service == null && $brand == null && $model == null && $start == null && $end == null 
                    && $price == null && $notes == null) {
                exit();
            }
            //}
            // WHERE `serviceName` LIKE '%$search%' OR `hours` LIKE '%$search%'"

            if ($result = $mysql->query("SELECT m.id, s.serviceName, CONCAT(c.countryNumber, ', ', c.carBrand, '-', c.model, ' ', YEAR(c.regDate)) AS car, m.startDate, m.endDate, m.totalPrice
                                        FROM maintnances as m
                                        INNER JOIN services as s
                                        ON s.id = m.service_id
                                        INNER JOIN cars as c
                                        ON c.id = m.car_id
                                        WHERE c.carBrand LIKE '%$brand%'
                                        OR s.serviceName LIKE '%$service%'
                                        OR c.model LIKE '%$model%'
                                        OR m.startDate LIKE '%$start%'
                                        OR m.endDate LIKE '%$end%'
                                        OR m.totalPrice LIKE '%$price%'
                                        OR m.notes LIKE '%$notes%'")) {
            $rowsCount = mysqli_num_rows($result);
            echo "<p>Total count of maintnances in DB: $rowsCount</p>";
            echo "<table><tr><th>ID</th><th>Service</th><th>Car</th><th>Start Date</th><th>End Date</th><th>TotalPrice</th></tr>";
            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["serviceName"] . "</td>";
                echo "<td>" . $row["car"] . "</td>";
                echo "<td>" . $row["startDate"] . "</td>";
                echo "<td>" . $row["endDate"] . "</td>";
                echo "<td>" . $row["totalPrice"] . "</td>";
                echo "<td><button onclick='openDetails()' id='".$row['id']."' type='submit' value='".$row['id']."' name='details'> Details </button></td>"; 
                echo "<td><button onclick='openUpdate()' id='".$row['id']."' type='submit' value='".$row['id']."' name='update'> Edit </button></td>"; 
                echo "<td><button type='submit' id='delete' value='".$row['id']."' name='delete'> Delete </button></td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($result);
        } else {
            echo "Error: " . mysqli_error($mysql);
        }
        }

?>
        
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