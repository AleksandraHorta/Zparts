<?php
session_start();
if (isset($_SESSION['user'])) {

    $mysql = new mysqli('localhost', 'root', '1program4*al', 'zparts');

    $x = $_SESSION['user']['email'];

    $result = $mysql->query("SELECT m.media, u.email FROM users as u 
                                LEFT OUTER JOIN cars as c ON u.id = c.user_id  
                                LEFT OUTER JOIN maintnances as m ON m.car_id = c.id
                                WHERE u.email = '$x';");

    $result1 = $mysql->query("SELECT COUNT(m.media) FROM users as u 
                                INNER JOIN cars as c ON u.id = c.user_id  
                                INNER JOIN maintnances as m ON m.car_id = c.id
                                WHERE u.email = '$x';");


    $videoCount = strval($result1->fetch_row()[0]);

    while ($row = $result->fetch_assoc()) {
            $email = $row['email'];
    }

    if ($x == $email) {

    ?>

    <!DOCTYPE html>
    <html lang="eng">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Youtube Library</title>
        <link rel="icon" type="image/x-icon" href="images/favicon.png">
    </head>
    <body>

    <h2>Your Library: </h2>

    <?php

        if($videoCount <= 0) {
            echo "<h3>Sorry, but you don't have any video this time.</h3>";
        } elseif ($videoCount > 0) {
            echo "<h3>In your library is " . $videoCount . " video.</h3>";
            if ($result) {
                foreach($result as $row) {
                    echo "<div class='object'>";
                        echo "<iframe width='560' height='315'" . $row["media"] . "title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen></iframe>";
                    echo "</div>";
                    echo "<br>";
                } 
                mysqli_free_result($result);
            } else {
                echo "Error: " . mysqli_error($mysql);
            }

        } else {
            echo "<h3>Something went wrong!</h3>";
        }



        //<iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/FALu6SjWQis" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

        // copy only scr="..." from share -> Embed Video

        ?>

    </body>
    </html>


    <?php
    }
} else {
    echo "<div style='margin-top: 290px;'>";
    echo "<h1 style='text-align: center; height: 50%';>Something went wrong! You don't have access to this page!</h1>";
    echo "</div>";
}
?>
