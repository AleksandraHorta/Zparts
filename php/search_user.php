<?php

    $mysql = new mysqli('localhost', 'root', '1program4*al', 'zparts');

    if(!$mysql) {
        die("Error: " .mysqli_connect_error());
    }


    $search = $_POST['search'];

    $search = trim($search); 
    $search = htmlspecialchars($search);
         

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
        echo "<table><tr><th>ID</th><th>Name</th><th>Surname</th><th>Phone</th><th>Email</th><th>Role</th></tr>";
        foreach ($result as $row) {
            echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["surname"] . "</td>";
                echo "<td>" . $row["phone"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["role"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($result);
    } else {
        echo "Error: " . mysqli_error($mysql);
    }




$mysql->close();

?>
