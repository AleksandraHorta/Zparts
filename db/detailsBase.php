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
    <title>Details</title>
    <link rel="stylesheet" href="../css/timetable.css">
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
            padding: 85px 10px 10px 150px;
        }

        .block-left {
            position: fixed;
            left: 0;
            top: 0;
            width: 65%;
            height: 100%;
            background: white;
            overflow: auto;

        }

        .block-right {
            position: fixed;
            right: 0;
            top: 0;
            width: 35%;
            height: 100%;
            background: #D3D3D3;

        }

        .block-right table {
            padding: 0px 20px 0px 55px;
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

        .form-service {
            display: none; /*Hide by default*/
            position: absolute;
            bottom: 15px;
            right: 20px;
            border: 2px solid #c0c0c0;
        }

        .form-service2 {
            display: block; /*Hide by default*/
            position: absolute;
            bottom: 155px;
            right: 190px;
            border: 2px solid #c0c0c0;
        }

        .form-service3 {
            display: block; /*Hide by default*/
            position: absolute;
            bottom: 155px;
            right: 190px;
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

        #delete{
            background-color: #F5292F;
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

        #update{
            background-color: #FFEF00;
            color: black;
            border: none;
            cursor: pointer;
            width: 60px;
            height: 30px;

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
                    <a onclick="location.href='../db/carsBase.php';">Cars</a>
                    <a onclick="location.href='../db/usersBase.php';">Users</a>
                    <a onclick="location.href='../db/servicesBase.php';">Our Services</a>
                    <a class="active">Details</a>
                </div>
                <a href="../pdf.php">PDF</a>
                <button class="button" onclick="location.href='../php/exit.php';" id="log-out">LOG OUT</button>   
        </div>


        <button class="open-button" onclick="openAdd()">Add new Detail</button>

        <div class="form-service" id="addDetail">
            <form action="../php/details.php" method="post" class="form-container">
                <label>Detail name: </label>
                <input type="text" placeholder="Detail" name="detail" required>
                <label>Price: </label>
                <input type="number" min="1.00" max="10000.00" step="0.10" placeholder="Price" name="price">
                <button type="submit" class="btn">Add</button>
                <button type="button" class="btn cancel" onclick="closeAdd()">Close</button>
            </form>
        </div>


<?php

        $mysql = new mysqli('localhost', 'root', '1program4*al', 'zparts');

        if(!$mysql) {
            die("Error: " .mysqli_connect_error());
        }
    
        if ($result = $mysql->query("SELECT * FROM details")) {
            $rowsCount = mysqli_num_rows($result);
            echo "<form method='GET'>"; 
            echo "<p>Total count of details in DB: $rowsCount</p>";
            echo "<table><tr><th>Code</th><th>Detail</th><th>Price</th></tr>";
            foreach ($result as $row) {
                echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["detailName"] . "</td>";
                    echo "<td>" . $row["price"] . "</td>";
                    echo "<td><button onclick='openDetails()' type='submit' id='details' value='".$row['id']."' name='details'> Details </button></td>"; 
                    echo "<td><button type='submit' id='update' value='".$row['id']."' name='update'> Edit </button></td>"; 
                    echo "<td><button type='submit' onclick='return confirmDelete()' id='delete' value='".$row['id']."' name='delete'> Delete </button></td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "<br>";
            $a = $rowsCount/3;
            $a = round($a, 0);
            for ($b=0;$b<=$a;) {
                $b+=1;
                echo "<a id='page' href='detailsBase.php?page=".$b."'>$b</a>";
            }

            echo "</form>";
            mysqli_free_result($result);
             
        } else {
            echo "Error: " . mysqli_error($mysql);
        }

        if(isset($_GET['delete'])){
            $deleted = $_GET['delete'];
            $mysql->query("DELETE FROM details WHERE `id` = $deleted;");
            echo "<script>window.location='http://zparts.local/db/detailsBase.php';</script>";
        }
        ?>

        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete this detail?");
            }
        </script>

        <?php

        if(isset($_GET['details'])){
            $selected = $_GET['details'];
            $res = $mysql->query("SELECT * FROM details WHERE `id` = $selected;");

            foreach($res as $row) {
            
?>
            <div class="form-service3" id="detailsLog">
                <form action="#" class="form-container" method="GET">

                    <label>ID: </label>
                    <input type="text" id="id" name="id" value="<?php echo $row["id"] ?>" disabled>

                    <label>Service name: </label>
                    <input type="text" id="serviceName" name="serviceName" value="<?php echo $row["detailName"] ?>" disabled>

                    <label>Hours: </label>
                    <input type="number" id="hours" name="hours" value="<?php echo $row["price"] ?>" disabled>

                    <button type="button" class="btn cancel" onclick="closeDetails()">Close</button>
                </form>
            </div>

    <?php    
        }
    }

    if(isset($_POST['update'])){
        $id = $_GET['update'];
        $detailName = $_POST['detailName'] ?? '';
        $price = $_POST['price'] ?? '';
        
        $mysql->query("UPDATE details SET detailName = '$detailName', price = '$price' WHERE id = '$id';");
        echo "<script>window.location='http://zparts.local/db/detailsBase.php';</script>";
    }


    if(isset($_GET['update'])){
        $updated = $_GET['update'];
        $result = $mysql->query("SELECT * FROM details WHERE id = $updated");

        foreach($result as $row) {
            
    ?>

        <div class="form-service2" id="updateDetail">
        <form action="#" method="post" class="form-container">
        
            <label>Detail name: </label>
            <input type="text" id="detailName" name="detailName" value="<?php echo $row["detailName"] ?>">

            <label>Price: </label>
            <input type="number" id="price" name="price" value="<?php echo $row["price"] ?>">

            <button type="submit" name="update" class="btn">Update</button>
            <button type="button" class="btn cancel" onclick="closeUpdate()">Close</button>
        </form>
    </div>

    <?php
        }
    }


?>

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

                if ($result = $mysql->query("SELECT `id`, `detailName`, `price`
                FROM `details` WHERE `detailName` LIKE '%$search%'
                OR `price` LIKE '%$search%'")) {
                if (mysqli_num_rows($result) == 0) {
                    echo "<p1 style='padding-left: 150px;'>Nothing found!</p1>";
                    exit();
                }
                $rowsCount = mysqli_num_rows($result);
                echo "<form method='GET'>"; 
                echo "<table><tr><th>Code</th><th>Detail name</th><th>Price</th></tr>";
                foreach ($result as $row) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["detailName"] . "</td>";
                    echo "<td>" . $row["price"] . "</td>";
                    echo "<td><button onclick='openDetails()' type='submit' id='details' value='".$row['id']."' name='details'> Details </button></td>"; 
                    echo "<td><button type='submit' id='update' value='".$row['id']."' name='update'> Edit </button></td>"; 
                    echo "<td><button type='submit' onclick='return confirmDelete()' id='delete' value='".$row['id']."' name='delete'> Delete </button></td>";
                echo "</tr>";
                }
                echo "</table>";
                echo "</form>";
                mysqli_free_result($result);
            } else {
                echo "Error: " . mysqli_error($mysql);
            }

            //$mysql->close();

            if(isset($_GET['delete'])){
                $deleted = $_GET['delete'];
                $mysql->query("DELETE FROM details WHERE `id` = $deleted;");
                echo "<script>window.location='http://zparts.local/db/detailsBase.php';</script>";
            }
            ?>
        
            <script>
                function confirmDelete() {
                    return confirm("Are you sure you want to delete this detail?");
                }
            </script>
            <?php
    } 
    
?>
        
    </div>


</body>
<script>

    function openAdd() {
        document.getElementById("addDetail").style.display = "block";
    }

    function closeAdd() {
        document.getElementById("addDetail").style.display = "none";
    }

    function openUpdate() {
        document.getElementById("updateDetail").style.display = "block";
    }

    function closeUpdate() {
        document.getElementById("updateDetail").style.display = "none";
    }

    function openDetails() {
        document.getElementById("detailsLog").style.display = "block";
    }

    function closeDetails() {
        document.getElementById("detailsLog").style.display = "none";
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