<?php
    session_start();
    $mysql = new mysqli('localhost', 'root', '1program4*al', 'zparts');
    $x = $_SESSION['user']['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/appointment.css">
    <link rel="stylesheet" type="text/css" href="calendar/css/style.css">
    <title>Appointments</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />  -->
    <style>

        * {
            margin: 0;
            padding: 0;
            list-style-type: none;
            font-family: calibri;
        }

        body {
            background-image: url('images/car.jpeg');
            background-repeat: no-repeat;
            background-size: cover;
        }


        .nav {
            background-color: white;
        }

        .active{
            padding-left: 25px;
            padding-top: 5px;;
            display: flex;
            align-items: center;
            position: absolute;
            
        }


        ul{
            display: flex;
            align-items: right;
            justify-content: right;
            position: relative;
            /*width: 100%;*/
            height: 80px;
            /*margin: auto;*/
            /*justify-content: space-between;*/
            /*text-align: center;*/
        }

        ul a #not-logo{
            align-items: right;
        }

        li a{
            text-decoration: none;
            color: black;
            font-weight: bold;
        }


        li {
            /*padding: 1rem 2rem 1.15rem;*/
            text-transform: uppercase;
            cursor: pointer;
            color: #ffffff;
            margin-top: 28px;
            /*min-width: 80px;*/
            /*margin: auto;*/
            margin-top: 28px;
            margin-right: 50px;
            font-size: 18px;
        }


        li:hover {
            background-image: url('../images/background.png');
            background-size: 100% 100%;
            /*color: #27262c;*/
            /*animation: spring 300ms ease-out;*/
            text-shadow: 0 -1px 0 #FE642F;
        
        }


        li:active {
            transform: translateY(4px);
        }

        @keyframes spring {
        15% {
        -webkit-transform-origin: center center;
        -webkit-transform: scale(1.2, 1.1);
        }
        40% {
        -webkit-transform-origin: center center;
        -webkit-transform: scale(0.95, 0.95);
        }
        75% {
        -webkit-transform-origin: center center;
        -webkit-transform: scale(1.05, 1);
        }
        100% {
        -webkit-transform-origin: center center;
        -webkit-transform: scale(1, 1);
        }
        }

        .calendar-div{
            visibility: visible;
        }
        .calendar-input{
            visibility: visible;
            position: absolute;
            margin-top: 20px;
            padding-left: 30%;
        }
        .box #car{ 
            padding-left: 32%;
            margin-top: 20px;
        }

        .box #service{
            padding-left: 28%;
            margin-top: 50px;
        }
        .box select{
            width: 250px;
            height: 39px;
            font-size: 16px;
        }
        .box input{

            width: 250px;
            height: 39px;
            font-size: 16px;
        }
        .box #comments{
            padding-left: 24%;
            padding-top: 90px;
        }
        .box label{
            font-size: 22px;
            color: white;
            text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;
            background-color: black;
            padding: 8px;
            height: 39px;
            
        }
        .calendar-input label{
            font-size: 22px;
            color: white;
            text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;
            background-color: black;
            padding: 8px;
            margin-left: 5px;
        }

        .calendar-input input{
            width: 238px;
            height: 39px;
            font-size: 15px;
        }
        .container{
            background: transparent;
            width: 850px;
            height: 530px;
            margin-top: 30px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            /*margin: auto;
            padding: 45px 60px 45px 45px;*/
            border: 8px solid white;
        }
        .button{
            border: none;
            color: white;
            padding: 12px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;
            text-transform: uppercase;
            background-color: #2E64FE;
        }

        .buttonHolder{
            padding-top: 70px;
        }

        input, select{
            padding-left: 10px;
        }
        .current{
            color: gray;
        }
        .ui-datepicker-unselectable.ui-state-disabled span {
            background-color: #FE642F;
            color: black;
        } 


    </style>

</head>

<script src="js/appointment.js"></script>

<body>

<nav class="nav">
  <?php

    if(isset($_SESSION['user']) == '') { 
  ?>
  <a class="active" href="index.php"><img src="images/Zparts_main2.png" width="290" height="65"></a>
    <ul>
        <li><a id="not-logo" href="log_in.php">Log in</a></li>
        <li><a id="not-logo" target="_blank" href="user_reg.php">Sign Up</a></li>
        <li><a id="not-logo" target="_blank" href="https://www.google.com/maps/dir//zparts.lv,+Augusta+Deglava+iela+102,+Latgales+priek%C5%A1pils%C4%93ta,+R%C4%ABga,+LV-1082/@56.9481517,24.1869895,15z/data=!4m8!4m7!1m0!1m5!1m1!1s0x46eecf2bf3b2f817:0x56ee5c2a21d55b88!2m2!1d24.1869895!2d56.9481517"> Augusta Deglava iela 102, Rīga </a></li>
    </ul>
  <?php } else { ?>
    <a class="active" href="index.php"><img src="images/Zparts_main2.png" width="290" height="65"></a>
    <ul>
        <li><a class="profile" id="not-logo" href="my_profile.php" disabled>My profile</a></li>
        <li><a class="current" id="not-logo" href="appointment.php">Appointments  Calendar</a></li>
    </ul>
  
  </nav>


  <div class="container">
    <form action="php/createAppointment.php" method="post"> <!--target="_blank"-->
        <h1 style="text-align: center; color: white; padding-top: 30px; text-shadow: 0 2px 0 black;">Fill required fields</h1>
        <div class="box">
            <div id="service">
                <label>Service: </label> <!--onchange="if (this.selectedIndex) showCalendar();"-->
                <select name="service" type="text" placeholder="Service" required>
                <?php 
                    if ($serv = $mysql->query("SELECT id, serviceName FROM `services` ORDER BY serviceName")) {
                        echo "<option value='' selected disabled hidden>Choose service</option>";
                        foreach ($serv as $row) {
                            echo "<option onclick='showCalendar();' value=" . $row["id"] . ">" . $row["serviceName"] . "</option>";
                        } //onclick='showCalendar();'
                        mysqli_free_result($serv);
                    } 
                ?>
                </select>
            </div>
        </div>


            <div class="box" >
                <div id="car">
                <label>Car: </label> <!--onchange="if (this.selectedIndex) showCalendar();"-->
                <select name="car" type="text" placeholder="Service" required>
                <?php 
                    if ($cars = $mysql->query("SELECT c.id, CONCAT(carBrand, ' ', model, ', ', countryNumber) as inf FROM cars as c
                    INNER JOIN users as u ON u.id = c.user_id
                    WHERE u.email = '$x' ORDER BY inf;")) {
                        echo "<option value='' selected disabled hidden>Choose car</option>";
                        foreach ($cars as $row) {
                            echo "<option value=" . $row["id"] . ">" . $row["inf"] . "</option>";
                        } //onclick='showCalendar();'
                        mysqli_free_result($cars);
                    } 
                ?>
                </select>
                </div>
            </div>


            <!--<div class="calendar-div" id="calendar-div">
                <div class="calendar" id="calendar">
                    <button id="btnPrev" type="button">« Previous </button>
                    <button id="btnNext" type="button"> Next »</button>
                    <div id="divCal"></div>
                </div>
            </div>-->



            <div class="box" >
            <div class="calendar-input" id="calendar-input">
                    <label for="date">Date: </label>
                    <input name="date" id="datepicker" type="text">
            </div>
            </div>

            <?php

                $i = $mysql->query("SELECT id, startDate, endDate FROM requests");
                
                $res = $mysql->query("SELECT COUNT(id) FROM requests");
                $iCount = strval($res->fetch_row()[0]);


                    for ($x = 0; $x <= $iCount; $x++) {
                        while ($row = $i->fetch_assoc()) {
                            $disabledIntervals[] = array("start" => $row['startDate'], "end" => $row['endDate']);
                        }   
                    }
        
                // Convert the array/object to JSON format
                $disabledIntervalsJSON = json_encode($disabledIntervals);

                // Echo the JSON data
                echo '<script>var disabledIntervals = ' . $disabledIntervalsJSON . ';</script>';
            ?>



            <script>
                $(document).ready(function() {
                $("#datepicker").datepicker({
                    dateFormat: "yy-mm-dd",
                    beforeShowDay: function(date) {

                        var day = date.getDay();
                        if (day === 0 || day === 6) {
                            return [false];
                        }


                        var string = $.datepicker.formatDate('yy-mm-dd', date);  //jQuery.datapicker.formatDate
                        
                        for (var i = 0; i < disabledIntervals.length; i++) {
                            var startDate = new Date(disabledIntervals[i].start);
                            var endDate = new Date(disabledIntervals[i].end);

                            if (date >= startDate && date <= endDate) {
                            return [false];
                            }
                        }

                        return [true];

                    },
                    //beforeShowDay: $.datepicker.noWeekends,
                    defaultDate: "today",
                    firstDay: 1,
                    minDate: 0
                });
                });
            </script>



            <div class="box" >
                <div id="comments">
                <label>Comments: </label>
                <input type="text" name="comments" placeholder="Comments">
                </div>
            </div>


            <div class="buttonHolder" style="text-align: center">
                <button type="submit" class="button"> SUBMIT </button>
            </div>


        </form>
    </div>
    



<?php }?>

<!--<p>Your appointment has been submitted for review.</p>-->


    

    <script>
        //function showCalendar() {
            //document.getElementById("calendar-div").style.visibility = "visible";
            //document.getElementById("calendar-input").style.visibility = "visible";
        //}
    </script>
    
</body>
</html>