<?php

    $file = '../Certificates/'.$_GET['name'].'_'.$_GET['user'].'.pdf';

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