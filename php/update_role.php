<?php
$mysql = new mysqli('localhost', 'root', '1program4*al', 'zparts');

if(!$mysql) {
    die("Error: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $role = $_POST['role'];

    $update_query = "UPDATE users SET role = '$role' WHERE id = '$user_id'";
    if ($mysql->query($update_query)) {
        header('Location: ../db/usersBase.php');
    } else {
        echo "Error updating role: " . mysqli_error($mysql);
    }
}

$mysql->close();
?>

