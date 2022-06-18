<?php

    session_start();

    for ($i = 1; $i <= $_SESSION['users_count']; $i++) {

        $arr[$i]['bool'] = intval(explode("_", $_POST["flag$i"])[0]);
        $arr[$i]['id'] = intval(explode("_", $_POST["flag$i"])[1]);

    }

    require('conn.php');

    $bool = 'bool';
    $id = 'id';

    for ($i = 1; $i <= $_SESSION['users_count']; $i++) {

        $query = 'update users
                set users.flag = '.$arr[$i][$bool].'
                where users.id = '.$arr[$i][$id].'';

        mysqli_query($conn, $query);

    }

    $conn->close();

    header("Location: ../index.php");
    exit();

?>