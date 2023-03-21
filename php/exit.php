<?php

    setcookie('cookie', $user['email'], time() - 3600*3, "/");
    header('Location: /');

?>