<?php
session_start();
  
$mysql = new mysqli('localhost', 'root', '1program4*al', 'zparts');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Maintnance</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.png">
    <style>
        *{
            font-family: 'Calibri';
        }
        .container{
            border: 3px solid #1a2033;
            width: 550px;
            height: 450px;
            /*padding-bottom: 20px;*/
            position: absolute;
            top: 46%;
            left: 50%;
            transform: translate(-50%, -50%);
            margin: auto;
            padding: 30px 60px 30px 35px;
            text-align: center;
            font-size: 18px;
        }
        .box{
            margin-top: 18px;
        }
        .btn{
            border: none;
            color: white;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
            text-transform: uppercase;
            background-color: #2E64FE;
        }

        .cancel{
            margin-top: 70px;
            background-color: red;
        }

        #notes{
            height: 100px;
            width: 350px;
        }

        .box input[type="text"]::placeholder{
            vertical-align: top;
        }
    </style>
</head>
<body>

<div class="container">

<?php
        $update = $_GET['update'];
        $result = $mysql->query("SELECT * FROM maintnances as m 
                                    INNER JOIN cars as c ON c.id=m.car_id 
                                    INNER JOIN services as s ON m.service_id=s.id 
                                    WHERE m.id = $update");

        foreach($result as $row) {

          ?>
    <form action="updateMaintnance.php" method="post">
                    <div class="box">
                        <label>Service: </label>
                        <select name="service" type="text" required>
                        <?php 
                        if ($serv = $mysql->query("SELECT id, serviceName FROM services ORDER BY serviceName")) {
                            echo "<option value='' selected disabled hidden>Choose service</option>";
                            foreach ($serv as $serviceRow) {
                                $selected = ($row['service_id'] == $serviceRow['id']) ? 'selected' : '';
                                echo "<option value='" . $serviceRow['id'] . "' " . $selected . ">" . $serviceRow['serviceName'] . "</option>";
                            }
                            mysqli_free_result($serv);
                        }
                        ?>
                        </select>
                    </div>

                    <div class="box">
                    <?php
                    $x = $mysql->query("SELECT COUNT(id) FROM details");
                    $count = strval($x->fetch_row()[0]);
                    if ($det = $mysql->query("SELECT id, detailName FROM details ORDER BY detailName")) {
                        if ($count != 0) {
                            echo "<label>Detail: </label>";
                            echo "<select name='detail'>";
                            echo "<option value='' selected disabled hidden>Choose detail</option>";
                            foreach ($det as $detailRow) {
                                $selected = ($row['detail_id'] == $detailRow['id']) ? 'selected' : '';
                                echo "<option value='" . $detailRow['id'] . "' " . $selected . ">" . $detailRow['detailName'] . "</option>";
                            }
                            mysqli_free_result($det);
                        }
                    }
                    ?>
                                </select>
                    </div>

                    <div class="box">
                        <label>Car: </label>
                        <select name="car" required>
                            <?php
                            if ($car = $mysql->query("SELECT id, CONCAT(carBrand, ' ', model, ', ', countryNumber) AS inf FROM cars ORDER BY carBrand, model, countryNumber")) {
                                echo "<option value='' selected disabled hidden>Choose car</option>";
                                foreach ($car as $carRow) {
                                    $selected = ($row['car_id'] == $carRow['id']) ? 'selected' : '';
                                    echo "<option value='" . $carRow['id'] . "' " . $selected . ">" . $carRow['inf'] . "</option>";
                                }
                                mysqli_free_result($car);
                            }
                            ?>
                        </select>
                    </div>
                    
                    <div class="box">
                        <label>Media: </label>
                        <input type="text" name="media" value="<?php echo $row["media"] ?>">
                    </div>

                    <div class="box">
                        <label>Start date: </label>
                        <input type="date" name="start" required value="<?php echo $row["startDate"] ?>">
                    </div>

                    <div class="box">
                        <label>Mileage: </label>
                        <input type="number" name="mileage" value="<?php echo $row["mileage"] ?>">
                    </div>

                    <div class="box">
                        <label>End date: </label>
                        <input type="date" name="end" id="end" required value="<?php echo $row["endDate"] ?>">
                    </div>

                    <div class="box">
                        <label>Total price: </label>
                        <input type="number" name="price" id="price" required value="<?php echo $row["totalPrice"] ?>">
                    </div>

                    <div class="box">
                        <label id="notes">Notes: </label>
                        <input type="text" name="notes" id="notes" value="<?php echo $row["notes"] ?>">
                    </div>

                    <button type="submit" class="btn">Submit</button>
                    <button type="button" class="btn cancel" onclick="location.href='../db/maintnancesBase.php';">Back</button>

    </form>

    <?php

        }

        ?>

    </div>
</body>
</html>