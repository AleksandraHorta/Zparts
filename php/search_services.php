<?php

$mysql = new mysqli('localhost', 'root', '1program4*al', 'zparts');

    if(!$mysql) {
        die("Error: " .mysqli_connect_error());
    }


    $search = $_POST['search'];

    $search = trim($search); 
    $search = htmlspecialchars($search);



if ($result = $mysql->query("SELECT `id`, `serviceName`, `avgPrice`, `hours`
        FROM `services` WHERE `serviceName` LIKE '%$search%'
        OR `hours` LIKE '%$search%'")) {
        if (mysqli_num_rows($result) == 0) {
            echo "Nothing found";
            exit();
        }
        $rowsCount = mysqli_num_rows($result);
        echo "<p>Found: $rowsCount</p>";
        echo "<table><tr><th>ID</th><th>Service name</th><th>Price</th><th>Hours</th></tr>";
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["serviceName"] . "</td>";
            echo "<td>" . $row["avgPrice"] . "</td>";
            echo "<td>" . $row["hours"] . "</td>";
        echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($result);
    } else {
        echo "Error: " . mysqli_error($mysql);
    }


$mysql->close();



?>