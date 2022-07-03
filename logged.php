<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Management Panel</title>
    </head>
    <body>
    
        <nav class="nav-container">

            <?php
            
                require_once('./scripts/nav.php');

                require './auth/auth.php';
                echo 'Jestes zalogowany jako: '.$user->{'key'};

            ?>

        </nav>

    </body>
</html>