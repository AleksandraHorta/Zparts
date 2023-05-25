<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/timetable.css">
    <title>Requests</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
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

        form a {
            padding: 40px 1px 20px 10px;
            position: relative;
            left: 50%;
            text-decoration: none;
            color: black;

        }

        .block-left table {
            padding: 0px 0px 0px 320px;
        }


        .search{
            padding: 35px 10px 10px 75px;
        }

        .block-left {
            position: relative;
            left: 0;
            top: 0;
            width: 97%;
            height: 100%;
            /*overflow: auto;*/

        }


        .block-right table {
            padding: 0px 20px 0px 25px;
        }

        .open-button {
            background-color: #4CAF50;
            color: black;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            padding: 10px 19px;
            position: absolute;
            bottom: 37px;
            right: 53px;
            width: 170px;
            height: 43px;
            font-size: 15px;
        }

        .form-service2 {
            display: block; /*Hide by default*/
            position: absolute;
            bottom: -330px;
            right: 290px;
            border: 2px solid #c0c0c0;
        }

        .form-service3 {
            display: block; /*Hide by default*/
            position: absolute;
            bottom: -330px;
            right: 290px;
            border: 2px solid #c0c0c0;
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

        #decline{
            background-color: red;
            color: black;
            border: none;
            cursor: pointer;
            width: 60px;
            height: 30px;

        }

        #accept{
            background-color: #4CAF50;
            color: black;
            border: none;
            cursor: pointer;
            width: 60px;
            height: 30px;
        }

        #edit{
            background-color: yellow;
            color: black;
            border: none;
            cursor: pointer;
            width: 60px;
            height: 30px;

        }
        #details{
            background-color: #ADD8E6;
            color: black;
            border: none;
            cursor: pointer;
            width: 60px;
            height: 30px;
        }

    </style>
    <script src="js/script.js"></script> <!--In script.js file is menu code-->

</head>
<body>

  <div class="nav" id="navbar">

    <div class="user_reg" style="text-align: center">
        <img src="images/favicon.png" width="100" height="95">
    </div>

    <a href="timetable.php">Timetable</a>
    <a class="active" href="#">Requests</a>

    <button class="dropdown-btn">DATABASES &#8595; </button>
    <div class="dropdown-container">
        <a onclick="location.href='../db/maintnancesBase.php';">Maintnance History</a>
        <a onclick="location.href='../db/carsBase.php';">Cars</a>
        <a onclick="location.href='../db/usersBase.php';">Users</a>
        <a onclick="location.href='../db/servicesBase.php';">Our Services</a>
        <a onclick="location.href='../db/detailsBase.php';">Details</a>
    </div>
    <a href="pdf.php">PDF</a>
    <!--<a href="statistics.html">Statistics</a>-->
    <button class="button" onclick="location.href='../php/exit.php';" id="log-out">LOG OUT</button>
  </div>

  <div class="block-left"> 
  <?php

        $mysql = new mysqli('localhost', 'root', '1program4*al', 'zparts');

        if(!$mysql) {
            die("Error: " .mysqli_connect_error());
        }
    


        if ($result = $mysql->query("SELECT r.id, r.startDate, CONCAT(r.startDate, '  -  ', r.endDate) as dateTime, CONCAT(u.name, ' ', u.surname, ' - ', u.phone) as client, CONCAT(c.countryNumber, ' ', c.carBrand,' ',  c.model,' ',  YEAR(c.regDate)) as car, s.serviceName, r.comments
                                        FROM requests as r 
                                        INNER JOIN users as u ON r.user_id=u.id 
                                        INNER JOIN cars as c ON c.id=r.car_id 
                                        INNER JOIN services as s ON s.id=r.service_id 
                                        WHERE confirmation = 0 ORDER BY r.startDate DESC ")) {
            $rowsCount = mysqli_num_rows($result);
            if ($rowsCount != 0){
            echo "<form method='GET'>"; 
            echo "<p>New requests found: $rowsCount</p>";
            echo "<table><tr><th>Number</th><th>Date</th><th>Client</th><th>Car info</th><th>Service</th><th>Comments</th></tr>";
            foreach ($result as $row) {
                echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["dateTime"] . "</td>";
                    echo "<td>" . $row["client"] . "</td>";
                    echo "<td>" . $row["car"] . "</td>";
                    echo "<td>" . $row["serviceName"] . "</td>"; 
                    echo "<td>" . $row["comments"] . "</td>";
                    echo "<td><button type='submit' id='accept' value='".$row['id']."' name='accept'> Accept </button></td>";
                    echo "<td><button type='submit' id='details' value='".$row['id']."' name='details'> Details </button></td>"; 
                    echo "<td><button type='submit' id='edit' value='".$row['id']."' name='edit'> Edit</button></td>"; 
                    echo "<td><button type='submit' id='decline' value='".$row['id']."' name='decline'> Decline </button></td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</form>";
            mysqli_free_result($result);
            } else {
                echo "<p>New requests found: $rowsCount</p>";
            }
             
        } else {
            echo "Error: " . mysqli_error($mysql);
        }

        if(isset($_GET['decline'])){
            $deleted = $_GET['decline'];
            $mysql->query("DELETE FROM requests WHERE `id` = $deleted;");
        }
        

        if(isset($_GET['accept'])){
            $accepted = $_GET['accept'];
            $mysql->query("UPDATE requests SET confirmation = 1 WHERE id = $accepted;"); 
            
        }



        if(isset($_GET['details'])){
            $selected = $_GET['details'];
            $res = $mysql->query("SELECT * FROM requests WHERE `id` = $selected;");

            foreach($res as $row) {
            
?>
            <div class="form-service3" id="detailsReq">
                <form action="#" class="form-container">

                    <label>Start Date: </label>
                    <input type="date" id="startDate" name="startDate" value="<?php echo $row["startDate"] ?>" disabled>
                    <br>
                    <label>End Date: </label>
                    <input type="date" id="endDate" name="endDate" value="<?php echo $row["endDate"] ?>" disabled>
                    <br>
                    <label>Comments: </label>
                    <input type="text" id="comments" name="comments" value="<?php echo $row["comments"] ?>" disabled>

                    <button type="button" class="btn cancel" onclick="closeDetails()">Close</button>
                </form>
            </div>

    <?php    
        }
    }

    if(isset($_GET['edit'])){
        $edited = $_GET['edit'];
        $start = $_POST['startDate'] ?? '';
        $end = $_POST['endDate'] ?? '';
        $time = $_POST['time'] ?? '';
        $comments = $_POST['comments'] ?? '';
        $mysql->query("UPDATE requests SET startDate = '$start', endDate = '$end', time = '$time', comments = '$comments' WHERE id = $edited;"); 
        
    }


    if(isset($_GET['edit'])){
        $edit = $_GET['edit'];
        $result = $mysql->query("SELECT * FROM requests WHERE id = $edit");

        foreach($result as $row) {
            
    ?>

        <div class="form-service2" id="updateService">
        <form action="#" method="post" class="form-container">

                    <label>Start Date: </label>
                    <input type="date" id="startDate" name="startDate" value="<?php echo $row["startDate"] ?>">
                    <br>
                    <label>End Date: </label>
                    <input type="date" id="endDate" name="endDate" value="<?php echo $row["endDate"] ?>">
                    <br>
                    <label>Time: </label>
                    <input type="time" id="time" name="time" value="<?php echo $row["time"] ?>">
                    <br>
                    <label>Comments: </label>
                    <input type="text" id="comments" name="comments" value="<?php echo $row["comments"] ?>">

                    <button type="submit" name="edit" class="btn" onclick="hideForm()">Edit</button>
                    <button type="button" class="btn cancel" onclick="closeUpdate()">Close</button>
                </form>
    </div>

    <?php

        }
    }

    

    $mysql->close();
    //header('Location: ../requests.php'); 

?>
</div>





</body>
<script>

    function openUpdate() {
        document.getElementById("updateService").style.display = "block";
    }

    function closeUpdate() {
        document.getElementById("updateService").style.display = "none";
    }

    function openDetails() {
        document.getElementById("detailsReq").style.display = "block";
    }

    function closeDetails() {
        document.getElementById("detailsReq").style.display = "none";
    }
    function hideForm() {
        document.getElementById("updateService").style.display = "none";
    }

</script>
</html>