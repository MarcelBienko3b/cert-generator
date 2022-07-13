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
            require ('./auth.php');

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
    
        <div class="main-container">
            <div class="database-container">
                <h2>Manage database</h2>

                <script language="JavaScript">

                    function toggleAll(source, column) {

                        checkboxes = document.getElementsByClassName(`checkbox-${column}`);

                        for (var i = 0; i < checkboxes.length; i++) {

                            checkboxes[i].checked = source.checked;

                        }

                    }

                </script>

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
                                </tr>
                                <tr>
                                    <td style="font-weight: bold; text-align: center">Select all -></td>
                                    <td><input type="checkbox" onClick="toggleAll(this, `generate`)" /></td>
                                    <td><input type="checkbox" onClick="toggleAll(this, `remove`)" /></td>
                                </tr>';
                    while ($rows = $result->fetch_all()) {
                        foreach ($rows as $row) {
                            $_SESSION['users_count']=$row[0];
                            echo '<tr>
                                    <td>[ '.$row[1].' ] '.$row[4].'</td>
                                    <td>
                                        <input type="hidden" name="flag'.$row[0].'" value="0_'.$row[0].'">
                                        <input class="checkbox-generate" type="checkbox" name="flag'.$row[0].'" value="1_'.$row[0].'"';
                                if ($row[7]) echo 'checked';
                                echo '></td>
                                    <td>
                                        <input class="checkbox-remove" type="checkbox" name="remove'.$row[0].'" value="1_'.$row[0].'">
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

            <div class="signup-container">
                <h2>Add new user manualy</h2>
                <form action="./scripts/sign-up.php" class="signup-form" method="POST">

                    <div class="signup-input--key">
                        <label for="key">Login</label>
                        <input type="text" name="key" id="key" placeholder="AB9-XYZ">
                    </div>

                    <div class="signup-input--fname">
                        <label for="fname">First name</label>
                        <input type="text" name="fname" id="fname">
                    </div>

                    <div class="signup-input--lname">
                        <label for="lname">Last name</label>
                        <input type="text" name="lname" id="lname">
                    </div>
                    
                    <div class="signup-input--email">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email">
                    </div>

                    <div class="signup-input--password">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password">
                    </div>

                    <div class="signup-input--submit">
                        <input type="submit" value="Add user">
                    </div>

                </form>
            </div>
        </div>
    
    </body>
</html>
