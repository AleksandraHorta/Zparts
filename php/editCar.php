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
    <link rel="stylesheet" href="../css/add_car.css">
    <title>Edit your car</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.png">
    <style>
        body{
            background-image: url('../images/car.jpeg');
            background-repeat: no-repeat;
            background-size: cover;
            font-family: calibri;
        }
        .lain1{
            padding-left: 72px;
        }
        .lain2{
            padding-left: 9px;
        }
        .lain3{
            padding-left: 55px;
        }
        #engine_capacity{
            width: 173px;
        }
        p{
            color: white;
            text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;
            margin-left: 86px;
            /*margin-top: -10px;*/
            font-size: 16px;
        }
    </style>
</head>
<body>

<?php
        $update = $_GET['update'];
        $result = $mysql->query("SELECT * FROM cars WHERE id = $update");

        foreach($result as $row) {

          ?>
    <form action="updateCar.php" method="post">
        <h1 class="glow">Fill in required fields: </h1>

        <input name="update" type='hidden' value="<?php echo $row["id"] ?>">

        <p style="margin-top: 93px;">Enter the registration number: </p>
        <p style="margin-top: -12px; margin-left: 108px;">Enter the registration date: </p>
        <p style="margin-top: 25px; margin-left: 153px;">Enter the car brand: </p>
        <p style="margin-top: -14px; margin-left: 149px;">Enter the car model: </p>
        <p style="margin-top: -14px; margin-left: 134px;">Enter the VIN-number: </p>

        <div class="container">

            <div class="input1">
                <input id="reg_number" type="text" name="regNumber" class="textBox" value="<?php echo $row["countryNumber"] ?>" required="required">
            </div>
            <div class="input2">
                <input id="reg_date" type="date" name="regDate" class="textBox" value="<?php echo $row["regDate"] ?>" required="required">
            </div>
            <div class="input3">
                <input id="brand" type="text" name="brand" class="textBox" value="<?php echo $row["carBrand"] ?>" required="required">
            </div>
            <div class="input4">
                <input id="model" type="text" name="model" class="textBox" value="<?php echo $row["model"] ?>" required="required">
            </div>
            <div class="input5">
                <input id="vin" type="text" name="vin" class="textBox" value="<?php echo $row["vinNumber"] ?>" required="required">
            </div>
        </div>


        <div class="form">
            <div class="lain1">
                <label for="engine" class="label"> Engine: </label>
                <select class="input" id="engine" name="engine">
                  <option value="select" <?php if ($row["engine"] == 'select') echo 'selected'; ?>>Select engine</option>
                  <option value="diesel" <?php if ($row["engine"] == 'diesel') echo 'selected'; ?>>Diesel</option>
                  <option value="gasoline" <?php if ($row["engine"] == 'gasoline') echo 'selected'; ?>>Gasoline</option>
                  <option value="gas" <?php if ($row["engine"] == 'gas') echo 'selected'; ?>>Gasoline/Gas</option>
                  <option value="hybrid" <?php if ($row["engine"] == 'hybrid') echo 'selected'; ?>>Hybrid</option>
                  <option value="electric" <?php if ($row["engine"] == 'electric') echo 'selected'; ?>>Electric</option>
                </select>
            </div>
            <br>

            <div class="lain2">
                <label for="engine_capacity" class="label"> Engine capacity: </label>
                <input id="engine_capacity" type="text" name="engine_capacity" class="input" value="<?php echo $row["engineCapacity"] ?>">
            </div>

            <br>

            <div class="lain3">
              <label for="gear_box" class="label"> Gear box: </label>
              <select class="input" id="gear_box" name="drive">
                  <option value="select" <?php if ($row["drive"] == 'select') echo 'selected'; ?>>Select gear box</option>
                  <option value="automatic" <?php if ($row["drive"] == 'automatic') echo 'selected'; ?>>Automatic</option>
                  <option value="manual" <?php if ($row["drive"] == 'manual') echo 'selected'; ?>>Manual</option>
              </select>
          </div>

            <div class="buttonHolder" style="text-align: center">
                <button type="submit" class="button"> SUBMIT </button>
            </div>

        </div>

    </form>

    <?php

        }

        ?>

</body>
</html>