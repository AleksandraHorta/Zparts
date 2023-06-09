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
    <title>Users</title>
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

        table{
            padding: 0px 0px 0px 330px;
        }


        .search{
            padding: 82px 10px 2px 115px;
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
            width: 31%;
            height: 100%;
            background: #D3D3D3;

        }

        .block-right table {
            padding: 0px 20px 0px 35px;
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
                <a class="active" onclick="location.href='../db/usersBase.php';">Users</a>
                <a onclick="location.href='../db/servicesBase.php';">Our Services</a>
                <a onclick="location.href='../db/detailsBase.php';">Details</a>
            </div>
            <a href="../pdf.php">PDF</a>
            <!--<a href="statistics.html">Statistics</a>-->

            <button class="button" onclick="location.href='../php/exit.php';" id="log-out">LOG OUT</button>

        </div>


        <?php

        $mysql = new mysqli('localhost', 'root', '1program4*al', 'zparts');

        if(!$mysql) {
            die("Error: " .mysqli_connect_error());
        }

        if ($result = $mysql->query("SELECT * FROM users")) {
            $rowsCount = mysqli_num_rows($result);
            echo "<p>Total count of users in DB: $rowsCount</p>";
            echo "<table><tr><th>Name</th><th>Surname</th><th>Phone</th><th>Email</th><th>Terms</th><th>Role</th><th>Change role</th></tr>";
            foreach ($result as $row) {
                echo "<tr>";
                    //echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["surname"] . "</td>";
                    echo "<td>" . $row["phone"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    //echo "<td>" . $row["password"] . "</td>";
                    echo "<td>" . $row["terms"] . "</td>";
                    echo "<td>" . $row["role"] . "</td>";
                    echo "<td>
                        <form method='post' action='../php/update_role.php'>
                            <input type='hidden' name='user_id' value='" . $row["id"] . "'>
                            <select name='role' onchange='this.form.submit()'>
                                <option value='user' " . ($row["role"] == 'user' ? 'selected' : '') . ">user</option>
                                <option value='admin' " . ($row["role"] == 'admin' ? 'selected' : '') . ">admin</option>
                            </select>
                        </form>
                    </td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($result);
        } else {
            echo "Error: " . mysqli_error($mysql);
        }


        

        ?>

    </div>

    <div class="block-right">


        <form class="search" method="post" action="#"><!--../php/search_user.php-->
            <input name="search" type="text" class="search-input" placeholder="Search" name="search">
            <button type="submit" class="button">OK</button>
        </form>

        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['search'])) {
                $search = $_POST['search'];
                $search = trim($search); 
                $search = htmlspecialchars($search);

                if ($search == null){
                    exit();
                }
                    

                if ($result = $mysql->query("SELECT `id`, `name`, `surname`, `phone`, `email`, `role`
                            FROM `users` WHERE `name` LIKE '%$search%'
                            OR `surname` LIKE '%$search%' OR `phone` LIKE '%$search%'
                            OR `email` LIKE '%$search%'")) {
                    if (mysqli_num_rows($result) == 0) {
                        echo "Nothing found";
                        exit();
                    }
                    $rowsCount = mysqli_num_rows($result);
                    echo "<p>Found: $rowsCount</p>";
                    echo "<table><tr><th>Name</th><th>Surname</th><th>Phone</th><th>Email</th><th>Role</th></tr>";
                    foreach ($result as $row) {
                        echo "<tr>";
                            //echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . $row["surname"] . "</td>";
                            echo "<td>" . $row["phone"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>
                                <form method='post' action='../php/update_role.php'>
                                    <input type='hidden' name='user_id' value='" . $row["id"] . "'>
                                    <select name='role' onchange='this.form.submit()'>
                                        <option value='user' " . ($row["role"] == 'user' ? 'selected' : '') . ">user</option>
                                        <option value='admin' " . ($row["role"] == 'admin' ? 'selected' : '') . ">admin</option>
                                    </select>
                                </form>
                            </td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    mysqli_free_result($result);
                } else {
                    echo "Error: " . mysqli_error($mysql);
                }
            }
        }

        $mysql->close();

        ?>
        

    </div>


</body>
</html>

<?php
} else {
    echo "<div style='margin-top: 290px;'>";
    echo "<h1 style='text-align: center; height: 50%';>Something went wrong! You don't have access to this page!</h1>";
    echo "<p style='text-align: center;'><a href='../index.php'>To main page</a></p>";
    echo "</div>";
}
}
?>

