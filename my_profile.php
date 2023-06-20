<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My profile</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <link rel="stylesheet" href="css/my_profile.css">
    <style>
        .profile{
            color: gray;
        }

        .dropdown-links{
            position: relative;
            display: inline-block;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            z-index: 1;
            right: 0;
        }

        .show {
            display: block;
        }

        /* Dropdown links */
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Show dropdown content when button is clicked */
        .dropdown-links.active .dropdown-content {
            display: block;
        }

        .cardCar {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            width: 23%;
        }

        .cardCar:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }

        .cont {
            padding: 2px 16px;
        }

        .your-cars img{
            width: 15px;
            height: 115px;
        }

        .your-cars{
            margin-top: 30px;
            margin-left: 30px;
        }

        .bedit{
            background-color: #FFFC40;
            padding: 5px;
            border: none;
            outline: none;
            border-radius: 4px;
            color: black;
            cursor: pointer;
            text-align: center;
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
            left: 12%;
            text-decoration: none;
            margin-top: 2px;
            margin-bottom: 5px;
        }
        .bdelete{
            background-color: #FF3838;
            padding: 5px;
            border: none;
            outline: none;
            border-radius: 4px;
            color: #ffffff;
            cursor: pointer;
            text-align: center;
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
            left: 12%;
            text-decoration: none;
        }
        .btndelete{
            background-color: #FF3838;
            padding: 6px;
            border: none;
            outline: none;
            border-radius: 4px;
            color: #ffffff;
            cursor: pointer;
            text-align: center;
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
            /*left: 12%;*/
            text-decoration: none;
            margin-top: 4px;
            margin-bottom: 5px;
        }
        .appField{
            width: 350px;
            /*background-color: green;*/
            position: absolute;
            left: 52%;
            top: 25%;
        }
        .reqField{
            width: 350px;
            /*background-color: pink;*/
            position: absolute;
            left: 75%;
            top: 25%;
        }
        .your-appointments{
            
            /*padding-bottom: 6px;*/

        }
        .cardApp{
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            width: 77%;
        }

        .your-requests{
    
            /*padding-bottom: 66px;*/
            
        }

        .cardReq{
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            width: 77%;
        }


    </style>
</head>
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
        <li><a id="not-logo" href="appointment.php">Appointments  Calendar</a></li>
    </ul>
  
  </nav>

<?php 

$mysql = new mysqli('localhost', 'root', '1program4*al', 'zparts');

$x = $_SESSION['user']['email'];

$result = $mysql->query("SELECT * FROM users   
                        WHERE email = '$x';");

$result1 = $mysql->query("SELECT COUNT(c.id) as count FROM users as u 
                        INNER JOIN cars as c ON u.id = c.user_id  
                        WHERE u.email = '$x';");

$result3 = $mysql->query("SELECT COUNT(r.id) as count FROM requests as r 
                        INNER JOIN users as u ON u.id = r.user_id  
                        WHERE u.email = '$x' AND r.confirmation = 1;");

$appointmentsCount = strval($result3->fetch_row()[0]);

$carsCount = strval($result1->fetch_row()[0]);

while ($row = $result->fetch_assoc()) {

    //the user data
    $idU = $row['id'];
    $name = $row['name'];
    $surname = $row['surname'];
    $email = $row['email'];
    $phone = $row['phone'];
    $role = $row['role'];

}

?>


    <div class="card">
        <div class="card_background_img"></div>
        <div class="card_profile_img"></div>
        <div class="user_details">
            <h3><?php echo $surname . " " . $name; ?></h3>
            <p>ZPARTS.LV <?php echo $role; ?></p>
            <button class="buttonEdit" onclick="location.href='editProfile.php?id=<?php echo $idU; ?>'"><img class="edit" src="images/editButton.png"></button>
        </div>
        <div class="card_count">
            <div class="count">
                <div class="fans">
                    <h3><?php echo $carsCount; ?></h3>
                    <p>cars</p>
                </div>
                <div class="following">
                    <h3><?php echo $appointmentsCount; ?></h3>
                    <p>appointments</p>
                </div>
            </div> 
        </div>
    </div>


    <div class="buttonHolder" style="text-align: center">
        <button class="button" name="logout" onclick="location.href='php/exit.php';"> LOG OUT </button>
    </div>

    <div class="buttonHolderYoutube">
        <div class="dropdown-links">
            <button class="buttonY" onclick="location.href='youtube.php'"> Youtube Links > > </button>
        </div>  
    </div>

    <div class="field">
        <div class="btncar"><a class="btn" target="_blank" href="addCar.html" >ADD car</a></div>
        
            <?php

            if ($carsCount == 0){
                echo "<h3 style='padding-top: 50px; padding-left: 50px;'>You don't have added cars to your profile yet!</h3>";
            }

            echo "<div class='your-cars'>";
            if ($result2 = $mysql->query("SELECT c.id, c.countryNumber, CONCAT(c.carBrand, ' ', c.model, ', ', YEAR(c.regDate)) as inf FROM users as u INNER JOIN cars as c ON u.id = c.user_id WHERE u.email = '$x';")) {
               foreach($result2 as $row) {
                    echo "<form method='GET'>";
                    echo "<div class='cardCar'>";
                        echo "<img src='images/car_picture.jpg' alt='Avatar' style='width:100%'>";
                        echo "<div class='cont'>";
                        echo "<h4><b>" . $row["countryNumber"] . "</b></h4>";
                        echo "<p>" . $row["inf"] . "</p>";
                        echo "<button name='update' type='submit' formaction='../php/editCar.php' class='bedit' onclick=\"location.href='php/editCar.php'\" id='update' type='submit' value='".$row['id']."' name='update' > Edit </button> &nbsp"; 
                        echo "<button class='bdelete' onclick='return confirmDelete()' type='submit' id='delete' value='".$row['id']."' name='delete'>Delete</button>";
                        echo "</div>";
                    echo "</div>";
                    echo "<br>";
                } 
                echo "</form>";
                mysqli_free_result($result2);
                echo "</div>"; 
            } else {
                echo "Error: " . mysqli_error($mysql);
            }


            if(isset($_GET['delete'])){
                $deleted = $_GET['delete'];
                $mysql->query("DELETE FROM cars WHERE `id` = $deleted");
                echo "<script>window.location='http://http://zparts.local/my_profile.php';</script>";
            }
              
            ?>
            <script>
                function confirmDelete() {
                    return confirm("Are you sure you want to delete this car?");
                }
            </script>
    </div>

        <div class="appField">
        <?php
            echo "<div class='your-appointments'>";
            if ($result4 = $mysql->query("SELECT r.id, c.countryNumber, CONCAT(s.serviceName, ' (', r.startDate, ' - ', r.endDate, ') - ',  r.comments) as inf
            FROM requests as r
            INNER JOIN cars as c 
            ON r.car_id = c.id 
            INNER JOIN users as u
            ON u.id = r.user_id
            INNER JOIN services as s 
            ON s.id = r.service_id 
            WHERE u.email = '$x' AND r.confirmation = 1;")) {
               foreach($result4 as $row) {
                    echo "<form method='GET'>";
                    echo "<h3 style='margin-bottom: 15px; font-size: 24px;'>Your active appointments: </h3>";
                    echo "<div class='cardApp'>";
                        echo "<div class='cont'>";
                        echo "<h4><b>" . $row["countryNumber"] . "</b></h4>";
                        echo "<p>" . $row["inf"] . "</p>";
                        echo "&nbsp<button class='btndelete' onclick='return confirmDelete()' type='submit' id='delete' value='".$row['id']."' name='delete'>Delete</button>";
                        echo "</div>";
                    echo "</div>";
                    echo "<br>";
                } 
                echo "</form>";
                mysqli_free_result($result4);
                echo "</div>"; 
            } else {
                echo "Error: " . mysqli_error($mysql);
            }

            if(isset($_GET['delete'])){
                $deleted = $_GET['delete'];
                $mysql->query("DELETE FROM appointments WHERE id = $deleted;");
                echo "<script>window.location='http://http://zparts.local/my_profile.php';</script>";
            }
              
            ?>
            <script>
                function confirmDelete() {
                    return confirm("Are you sure you want to delete this appointment?");
                }
            </script>
        </div>



        <div class="reqField">
        <?php
            echo "<div class='your-requests'>";
            if ($result5 = $mysql->query("SELECT r.id, c.countryNumber, CONCAT(s.serviceName, ' (', r.startDate, ') - ',  r.comments) as inf
            FROM requests as r
            INNER JOIN cars as c 
            ON r.car_id = c.id 
            INNER JOIN users as u
            ON u.id = r.user_id
            INNER JOIN services as s
            ON s.id = r.service_id 
            WHERE u.email = '$x' AND r.confirmation = 0;")) {
                    foreach($result5 as $row) {
                        echo "<form method='GET'>";
                        echo "<h3 style='margin-bottom: 15px; font-size: 24px;'>Your appointments requests: </h3>";
                        echo "<div class='cardReq'>";
                            echo "<div class='cont'>";
                            echo "<h4><b>" . $row["countryNumber"] . "</b></h4>";
                            echo "<p>" . $row["inf"] . "</p>";
                            echo "&nbsp<button class='btndelete' type='submit' onclick='return confirmDelete()' id='delete' value='".$row['id']."' name='delete'>Delete</button>";
                            echo "</div>";
                        echo "</div>";
                        echo "<br>";
                    }
               
                echo "</form>";
                mysqli_free_result($result5);
                echo "</div>"; 
            } else {
                echo "Error: " . mysqli_error($mysql);
            }

            if(isset($_GET['delete'])){
                $deleted = $_GET['delete'];
                $mysql->query("DELETE FROM requests WHERE id = $deleted;");
                echo "<script>window.location='http://http://zparts.local/my_profile.php';</script>";
            }
              
            ?>

            <script>
                function confirmDelete() {
                    return confirm("Are you sure you want to delete this request?");
                }
            </script>

        </div>   
    

    <?php }

    $mysql->close()
    
    ?>

</body>
</html>