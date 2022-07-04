<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Your certificates</title>
        <link rel="stylesheet" href="./main.css">
    </head>
    <body>
    
        <nav class="nav-container">
            <?php

                session_start();
                require_once('./scripts/nav.php');

            ?>
        </nav>

        <h1>Your certificates</h1>

        <?php
        
            require ('./scripts/conn.php');
            require ('./scripts/errors.php');
            require ('./scripts/functions.php');
            require ('./auth/auth.php');

            $user = AuthUser();

            $files = glob('./Certificates/*_'.$user->{'key'}.'.pdf');
            foreach($files as $file) {
                $cert_name = explode('_', explode('/', $file)[2])[0];
                echo '<a class="cert-download-link" href=./scripts/download-pdf.php?name='.$cert_name.'&user='.$user->{'key'}.'>Download: '.$cert_name.'</a>';
            }

        ?>
    
    </body>
</html>