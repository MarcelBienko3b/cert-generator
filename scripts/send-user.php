<?php

    require('conn.php');

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $sign = $_POST['sign'];
    $flag = 0; // default

    $query = 'insert into users(fname, lname, sign, flag) values (?, ?, ?, ?)';
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssi", $fname, $lname, $sign, $flag);
    $excaval = $stmt->execute();
    $stmt->close();
    $conn->close();

    header("Location: ../index.php");
    exit();

?>