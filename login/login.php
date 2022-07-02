<?php

    $user = new stdClass;
    $user->key=$_POST['key'];
    $user->password=md5($_POST['password']);

    require('./scripts/conn.php');

    setcookie('user', json_encode($user), 0, '/');

    header('Location: ../logged.php');

?>