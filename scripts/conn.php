<?php

    $dbserverName = "localhost";    
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "cert_gen_db";

    $conn = new mysqli($dbserverName, $dbUsername, $dbPassword, $dbName);

    if ($conn -> connect_error) die ("Connection failed: ".$conn->connect_error);

?>