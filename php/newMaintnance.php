<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Maintnance</title>
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
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            margin: auto;
            padding: 30px 60px 60px 35px;
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
        
    </style>
</head>
<body>

    <h1 style="text-align: center;">New Maintnance</h1>
    <div class="container">
            <form action="../php/addMaintnance.php" method="post">
                    <div class="box">
                        <label>Service: </label>
                        <select name="service" type="text" placeholder="Service" required>
                        <?php 
                        $mysql = new mysqli('localhost', 'root', '1program4*al', 'zparts');
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
                        <?php 
                        $x = $mysql->query("SELECT COUNT(id) FROM `details`");
                        $count = strval($x->fetch_row()[0]);
                        if ($det = $mysql->query("SELECT id, detailName FROM `details` ORDER BY detailName")) {
                            if ($count != 0) {
                                echo "<label>Detail: </label>";
                                echo "<select name='detail' type='text' placeholder='Detail'>";
                                echo "<option value='' selected disabled hidden>Choose detail</option>";
                                foreach ($det as $row) {
                                    echo "<option>" . $row["detailName"] . "</option>";
                                }
                                mysqli_free_result($det);
                            }
                        } 
                        ?> 
                        </select>
                    </div>

                    <div class="box">
                        <label>Car: </label>
                        <select name="car" type="text" placeholder="Car" required>
                        <?php 
                        if ($car = $mysql->query("SELECT id, CONCAT(carBrand, ' ', model, ', ', countryNumber) as inf, carBrand, model, countryNumber FROM `cars` ORDER BY carBrand, model, countryNumber")) {
                            echo "<option value='' selected disabled hidden>Choose car</option>";
                            foreach ($car as $row) {
                                echo "<option value="  . $row["id"] . ">" . $row["inf"] . "</option>";
                            }
                            mysqli_free_result($car);
                        } 
                        ?> 
                        </select>
                    </div>
                    
                    <div class="box">
                        <label>Media: </label>
                        <input type="text" name="media" placeholder="Link">
                    </div>

                    <div class="box">
                        <label>Start date: </label>
                        <input type="date" name="start" required>
                    </div>

                    <div class="box">
                        <label>Mileage: </label>
                        <input type="number" name="mileage" placeholder="km">
                    </div>

                    <div class="box">
                        <label>End date: </label>
                        <input type="date" name="end" id="end" required>
                    </div>

                    <div class="box">
                        <label>Total price: </label>
                        <input type="number" name="price" id="price" placeholder="Price" required>
                    </div>

                    <div class="box">
                        <label>Notes: </label>
                        <input type="text" name="notes" id="notes" placeholder="Notes..." >
                    </div>

                    <button type="submit" class="btn">Submit</button>
                    <button type="button" class="btn cancel" onclick="location.href='../db/maintnancesBase.php';">Back</button>
            </form>
    </div>

</body>
</html>