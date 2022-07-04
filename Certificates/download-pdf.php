<?php

    require ('../scripts/errors.php');
    
    $file = $_GET['name'].'_'.$_GET['user'].'.pdf';

    require ('./auth.php');

    $user = AuthUser();

    if (!$user) {
    
        echo '<h1>Authentication error!</h1>
                <a href="./index.html">Back to login</a>';
        exit();

    }

    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=" . $file);   
    header("Content-Type: application/download");
    header("Content-Description: File Transfer");            
    header("Content-Length: " . filesize($file));
    
    flush();
    
    $fp = fopen($file, "r");
    while (!feof($fp)) {
        echo fread($fp, 65536);
        flush();
    }
    
    fclose($fp);

?>