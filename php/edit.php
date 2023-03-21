<?php
//<input type="hidden" name="service_id" value=<?php echo $_GET['service_id'];>
    $mysql = new mysqli('localhost', 'root', '1program4*al', 'zparts');


    if ($mysql->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }



    /*if(isset($_GET['update'])){
        $updated = $_GET['update'];
        $rez = $mysql->query("UPDATE services SET service_name = '.$name.', s_price = '.$price.' WHERE service_id = $updated;");
        $product = mysqli_fetch_array($rez);
    }



    if(isset($_GET['update'])){
        $id = $_GET['update'];
        $records = $mysql->query("SELECT * FROM services WHERE service_id = $id");

        if (mysqli_num_rows($records) == 1 ) {
            $n = mysqli_fetch_array($records);
            $service = $n['service_name'];
            $price = $n['s_price'];
        }

    }


    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['service'];
        $address = $_POST['price'];
    
        $mysql->query("UPDATE services SET `service_name` = $service, `s_price` = $price WHERE `service_id` = $id"); 
        header('Location: ../db/servicesBase.php');
    }*/
 

?>





<!--../php/edit.php-->
<!-- value="isset($_GET['update'])-->
        <div class="form-service2" id="updateService">
            <form action="../php/edit.php" method="post" class="form-container">

                <label>Service name: </label>
                <input type="text" id="service" name="service" value="<?php echo $row['serviceName']; ?>">

                <label>Hours: </label>
                <input type="number" id="hours" name="hours" value="<?php echo $row['hours']; ?>">

                <label>Average price: </label>
                <input type="number" min="1.00" max="10000.00" step="0.10" id="price" name="price" value="<?php echo $row['avgPrice']; ?>">

                <button type="submit" class="btn">Update</button>
                <button type="button" class="btn cancel" onclick="closeUpdate()">Close</button>
            </form>
        </div>






<?php 


if(count($_POST)>0) { "UPDATE services SET `serviceName` = '" . $_POST['service_name'] . "', `s_price` = $price WHERE `service_id` = $id"
    $mysql->query("UPDATE employee set userid='" . $_POST['userid'] . "', first_name='" . $_POST['first_name'] . "', last_name='" . $_POST['last_name'] . "', city_name='" . $_POST['city_name'] . "' ,email='" . $_POST['email'] . "' WHERE userid='" . $_POST['userid'] . "'");
    $message = "Record Modified Successfully";
    }
    $result = $mysql->query("SELECT * FROM services WHERE service_id='" . $_GET['service_id'] . "'");
    $row= mysqli_fetch_array($result);
    ?>
    <html>
    <head>
    <title>Update Employee Data</title>
    </head>
    <body>
    <form name="frmUser" method="post" action="">
    <div><?php if(isset($message)) { echo $message; } ?>
    </div>

    Username: <br>
    <input type="hidden" name="service_id" class="txtField" value="<?php echo $row['service_id']; ?>">
    <input type="text" name="service_id"  value="<?php echo $row['service_id']; ?>">
    <br>
    First Name: <br>
    <input type="text" name="service_name" class="txtField" value="<?php echo $row['service_name']; ?>">
    <br>
    Last Name :<br>
    <input type="text" name="s_price" class="txtField" value="<?php echo $row['s_price']; ?>">
    <br>

    <input type="submit" name="submit" value="Submit" class="buttom">
    
    </form>
    </body>
    </html>




<?php

    $mysql = new mysqli('localhost', 'root', '1program4*al', 'zparts');


    if ($mysql->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    if (isset($_POST['update'])) {

        $service = $_POST['service'];

        $price = $_POST['price'];


        $result = $mysql->query("UPDATE services SET `service_name` = $service, `s_price` = $price WHERE `service_id` = $id"); 

        if ($result == TRUE) {

            echo "Record updated successfully.";

        }else{

            echo "Error:" . $conn->error;

        }

    } 

if (isset($_GET['update'])) {

    $id = $_GET['update']; 

    $result = $mysql->query("SELECT * FROM `services` WHERE `service_id`='$id'"); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $service = $row['service'];

            $price = $row['price'];

            $id = $row['update'];

        } 

    ?>



    <?php

    } else{ 

        $mysql->close();

        header('Location: ../db/servicesBase.php'); 



    } 

}

?> 