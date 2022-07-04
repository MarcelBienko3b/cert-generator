<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Manage database</title>
        <link rel="stylesheet" href="main.css">
    </head>
    <body>

        <?php
        
            require ('./scripts/errors.php');
            require ('./auth/auth.php');

            $user = AuthUser();

            if (!$user) {
            
                echo '<h1>Authentication error!</h1>
                        <a href="./index.html">Back to login</a>';

            }

            if (!$user->{'admin'}) {

                echo '<h1>Authentication error!</h1>
                        <a href="./index.html">Back to login</a>';

            }

        ?>

        <nav class="nav-container">
            <?php
            
                require_once('./scripts/nav.php');

            ?>
        </nav>
    
        <div class="database-container">

        <?php

            session_start();

            require('./scripts/conn.php');

            $query = 'select * from users';
            $result = $conn->query($query);

            $_SESSION['users_count'] = 0;

            if ($result->num_rows > 0) {
                echo '<form action="./scripts/set-flag.php" method="post">
                        <table>
                            <tr>
                                <td style="font-weight: bold">User</td>
                                <td style="font-weight: bold">Generate</td>
                                <td style="font-weight: bold">Remove</td>
                            </tr>';
                while ($rows = $result->fetch_all()) {
                    foreach ($rows as $row) {
                        $_SESSION['users_count']=$row[0];
                        echo '<tr>
                                <td>[ '.$row[1].' ] '.$row[4].'</td>
                                <td>
                                    <input type="hidden" name="flag'.$row[0].'" value="0_'.$row[0].'">
                                    <input type="checkbox" name="flag'.$row[0].'" value="1_'.$row[0].'"';
                            if ($row[4]) echo 'checked';
                            echo '></td>
                                <td>
                                    <input type="checkbox" name="remove'.$row[0].'" value="1_'.$row[0].'">
                                </td>';
                        echo '</tr>';
                    }
                }
                echo    '</table><br>
                        <input type="submit" value="Submit" class="btn-send">
                    </form>';
            }

            ?>

        </div>

        <div class="newuser-container">
            <form action="./scripts/send-user.php" method="post">

            <label for="fname">First name</label><br>
            <input type="text" name="fname" default=""><br><br>

            <label for="lname">Last name</label><br>
            <input type="text" name="lname" default=""><br><br>

            <label for="sign">Sign</label><br>
            <input type="text" name="sign" required><br><br>

            <input type="submit" value="Submit">

            </form>
        </div>
    
    </body>
</html>