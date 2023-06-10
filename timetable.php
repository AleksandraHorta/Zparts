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
    <link rel="stylesheet" href="css/timetable.css">
    <title>Timetable</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <style>

      * {
            margin: 0;
            padding: 0;
            list-style-type: none;
            
      }

      body{
        font-family: 'Calibri';
      }

      .block-left {
        position: fixed;
        left: 0;
        top: 0;
        width: 72%;
        height: 100%;
        background: white;

      }

      .block-right {
          position: fixed;
          right: 0;
          top: 0;
          width: 80%;
          height: 100%;

      }

        .calendar{
          position: absolute;
          right: 3%;
          top: 65%;
        }

        .current{
            color: gray;
        }
        
        .ui-datepicker-unselectable.ui-state-disabled span {
            background-color: #FE642F;
            color: black;
        }

        .column-container {
          padding-top: 20px;
          display: flex;
          padding-left: 30px;
        }

        .column {
          flex: 1;
          padding: 10px;
        }

        .column #n2{
          flex: 1;
          padding: 7px;
        }

        .column #n3{
          flex: 1;
          padding: 12px;
        }

        .column4 {
          position: absolute;
          padding-top: 430px;
          padding-left: 16px;
        }

        .cardApp{
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            width: 70%;
        }

        .appointments{
          top: 50%;
          right: 50%;
        }

        .nextweek{
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            padding-right: 58px;
        }
        .buttonHolder{
          padding-top: 30px;
        }


      </style>
      
      
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
      <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

</head>
<body>

<div class="block-left">
  <div class="nav" id="navbar">

    <div class="user_reg" style="text-align: center">
        <img src="images/favicon.png" width="100" height="95">
    </div>

    <a class="active" href="#">Timetable</a>
    <a href="requests.php">Requests</a>

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
</div>

  <div class="block-right">

    <div class="calendar" id="calendar-r"></div>

            <?php

                $i = $mysql->query("SELECT id, startDate, endDate FROM requests WHERE confirmation=1");
                
                $res = $mysql->query("SELECT COUNT(id) FROM requests WHERE confirmation=1");
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
            $("#calendar-r").datepicker({
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
              
                defaultDate: "today",
                firstDay: 1,
                minDate: 0
            });
            });

      </script>


      <div class="column-container">
        <div class="column">
          <h1>Today:</h1>
          <div class="appField">
          <?php
          $today = new DateTime();
          $todayDate = $today->format('Y-m-d');

            echo "<div class='appointments'>";
            if ($result1 = $mysql->query("SELECT CONCAT(countryNumber, ', ', carBrand, ' ', model) as car, CONCAT(r.startDate, ' - ' , r.endDate) as dates, CONCAT(name, ' ', surname, ' (', phone, ')') as user, s.serviceName
                                          FROM requests as r
                                          INNER JOIN cars as c ON r.car_id = c.id
                                          INNER JOIN users as u ON r.user_id = u.id
                                          INNER JOIN services as s ON s.id = r.service_id
                                          WHERE r.startDate <= '$todayDate' AND r.confirmation = 1 AND r.car_id IS NOT NULL;")) {
              foreach($result1 as $row) {
                echo "<br>";
                    echo "<form method='GET'>";
                    echo "<div class='cardApp'>";
                        echo "<div class='cont'>";
                        echo "<br>";
                        echo "<h4 style='text-align: left;'><b>&nbsp;&nbsp;" . $row["car"] . "</b></h4>";
                        echo "<br>";
                        echo "<p style='text-align: left;'><b>&nbsp;&nbsp;" . $row["serviceName"] . "</b></p>";
                        echo "<p style='text-align: left;'>&nbsp;&nbsp;" . $row["dates"] . "</p>";
                        echo "<p style='text-align: left;'>&nbsp;&nbsp;" . $row["user"] . "</p>";
                        echo "<br>";
                        echo "</div>";
                    echo "</div>";    
              } 
              echo "</form>";
              mysqli_free_result($result1);
              echo "</div>"; 
            } else {
              echo "Error: " . mysqli_error($mysql);
            }
          ?>
          </div>
        </div>
        <div class="column">
          <h2 id="n2">Tomorrow:</h2>
          <div class="appField">
          <?php
          $today = new DateTime();
          $todayDate = $today->format('Y-m-d');

          $todayDate = strtotime($todayDate . ' + 1 days');
          $todayDate = date('Y-m-d', $todayDate);

            echo "<div class='appointments'>";
            if ($result2 = $mysql->query("SELECT CONCAT(countryNumber, ', ', carBrand, ' ', model) as car, CONCAT(r.startDate, ' - ' , r.endDate) as dates, CONCAT(name, ' ', surname, ' (', phone, ')') as user, s.serviceName
                                          FROM requests as r
                                          INNER JOIN cars as c ON r.car_id = c.id
                                          INNER JOIN users as u ON r.user_id = u.id
                                          INNER JOIN services as s ON s.id = r.service_id
                                          WHERE r.startDate <= '$todayDate' AND r.confirmation = 1 AND r.car_id IS NOT NULL;")) {
              foreach($result2 as $row) {
                echo "<br>";
                    echo "<form method='GET'>";
                    echo "<div class='cardApp'>";
                        echo "<div class='cont'>";
                        echo "<br>";
                        echo "<h4 style='text-align: left;'><b>&nbsp;&nbsp;" . $row["car"] . "</b></h4>";
                        echo "<br>";
                        echo "<p style='text-align: left;'><b>&nbsp;&nbsp;" . $row["serviceName"] . "</b></p>";
                        echo "<p style='text-align: left;'>&nbsp;&nbsp;" . $row["dates"] . "</p>";
                        echo "<p style='text-align: left;'>&nbsp;&nbsp;" . $row["user"] . "</p>";
                        echo "<br>";
                        echo "</div>";
                    echo "</div>";    
              }
              echo "</form>";
              mysqli_free_result($result2);
              echo "</div>"; 
            } else {
              echo "Error: " . mysqli_error($mysql);
            }
          ?>
          </div>
        </div>
        <div class="column">
          <h3 id="n3">The day after Tomorrow:</h3>
          <div class="appField">
          <?php
          $today = new DateTime();
          $todayDate = $today->format('Y-m-d');

          $todayDate = strtotime($todayDate . ' + 2 days');
          $todayDate = date('Y-m-d', $todayDate);

            echo "<div class='appointments'>";
            if ($result2 = $mysql->query("SELECT CONCAT(countryNumber, ', ', carBrand, ' ', model) as car, CONCAT(r.startDate, ' - ' , r.endDate) as dates, CONCAT(name, ' ', surname, ' (', phone, ')') as user, s.serviceName
                                          FROM requests as r
                                          INNER JOIN cars as c ON r.car_id = c.id
                                          INNER JOIN users as u ON r.user_id = u.id
                                          INNER JOIN services as s ON s.id = r.service_id
                                          WHERE r.startDate <= '$todayDate' AND r.confirmation = 1 AND r.car_id IS NOT NULL;")) {
              foreach($result2 as $row) {
                echo "<br>";
                    echo "<form method='GET'>";
                    echo "<div class='cardApp'>";
                        echo "<div class='cont'>";
                        echo "<br>";
                        echo "<h4 style='text-align: left;'><b>&nbsp;&nbsp;" . $row["car"] . "</b></h4>";
                        echo "<br>";
                        echo "<p style='text-align: left;'><b>&nbsp;&nbsp;" . $row["serviceName"] . "</b></p>";
                        echo "<p style='text-align: left;'>&nbsp;&nbsp;" . $row["dates"] . "</p>";
                        echo "<p style='text-align: left;'>&nbsp;&nbsp;" . $row["user"] . "</p>";
                        echo "<br>";
                        echo "</div>";
                    echo "</div>";    
              }
              echo "</form>";
              mysqli_free_result($result2);
              echo "</div>"; 
            } else {
              echo "Error: " . mysqli_error($mysql);
            }
          ?>
          </div>
        </div>




        <!--<div class="column4">
          <h4>Next week:</h4>
          <div class="appField">-->
          <?php
          /*
          $today = new DateTime();
          $todayDate = $today->format('Y-m-d');

          $todayDate = strtotime($todayDate . ' + 7 days');
          $todayDate = date('Y-m-d', $todayDate);

            echo "<div class='appointments'>";
            if ($result2 = $mysql->query("SELECT CONCAT(countryNumber, ', ', carBrand, ' ', model) as car, CONCAT(r.startDate, ' - ' , r.endDate) as dates, CONCAT(name, ' ', surname, ' (', phone, ')') as user, s.serviceName
                                          FROM requests as r
                                          INNER JOIN cars as c ON r.car_id = c.id
                                          INNER JOIN users as u ON r.user_id = u.id
                                          INNER JOIN services as s ON s.id = r.service_id
                                          WHERE r.startDate >= '$todayDate' AND r.confirmation = 1;")) {
              foreach($result2 as $row) {
                echo "<br>";
                    echo "<form method='GET'>";
                    echo "<div class='nextweek'>";
                        echo "<div class='cont'>";
                        echo "<br>";
                        echo "<h4 style='text-align: left;'><b>&nbsp;&nbsp;" . $row["car"] . "</b></h4>";
                        echo "<br>";
                        echo "<p style='text-align: left;'><b>&nbsp;&nbsp;" . $row["serviceName"] . "</b></p>";
                        echo "<p style='text-align: left;'>&nbsp;&nbsp;" . $row["dates"] . "</p>";
                        echo "<p style='text-align: left;'>&nbsp;&nbsp;" . $row["user"] . "</p>";
                        echo "<br>";
                        echo "</div>";
                    echo "</div>";    
              }
              echo "</form>";
              mysqli_free_result($result2);
              echo "</div>"; 
            } else {
              echo "Error: " . mysqli_error($mysql);
            }
            */
          ?>
          <!--</div>
        </div>
    </div>-->

    
    <div class="column4">
      <form action="php/disableDate.php" method="post">
        <p>Disable dates: </p>
        <br>
        <div class="calendar-input" id="calendar-input">
            <label for="date">Date: </label>
            <input name="date" id="datepicker" type="text">
        </div>

    <?php

                $disabledIntervals = array();

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

            <div class="buttonHolder" style="text-align: center">
                <button type="submit" class="button"> SUBMIT </button>
            </div>

            </form>
    </div>

    
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