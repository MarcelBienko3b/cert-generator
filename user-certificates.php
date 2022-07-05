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
        
            require ('./scripts/errors.php');
            require ('./auth.php');

            $user = AuthUser();

            if (!$user) {
    
                echo '<h1>Authentication error!</h1>
                        <a href="./index.html">Back to login</a>';
                exit();
        
            }

            $files = glob('./Certificates/*_'.$user->{'key'}.'.pdf');
            foreach($files as $file) {
                $cert_name = explode('_', explode('/', $file)[2])[0];
                $cert_name_userfriendly = explode('/', $file)[2];
                echo '<a class="cert-download-link" href=./Certificates/download-pdf.php?name='.$cert_name.'&user='.$user->{'key'}.'&auth='.$user->{'password'}.'&email='.$user->{'email'}.'>'.$cert_name_userfriendly.'</a>';
            }

        ?>
    
    </body>
</html>