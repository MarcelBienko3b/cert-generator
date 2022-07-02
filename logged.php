<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Management Panel</title>
    </head>
    <body>
    
        <nav class="nav-container">

            <?php
            
                $user = json_decode($_COOKIE['user']);

                require './auth/auth.php';
                echo 'Jestes zalogowany jako: '.$user->{'key'};

            ?>

        </nav>

    </body>
</html>