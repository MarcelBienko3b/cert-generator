<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Certificate Generator</title>
</head>
<body>

    <div class="table-container">
        <h2>Change flag</h2>

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
                                <td>Data</td>
                                <td>To generate</td>
                                <td>Remove from database</td>
                            </tr>';
                while ($rows = $result->fetch_all()) {
                    foreach ($rows as $row) {
                        $_SESSION['users_count']=$row[0];
                        echo '<tr>
                                <td>'.$row[3]." ".$row[1]." ".$row[2].'</td>
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

    <div class="table-container">
        <h2>Add user</h2>

            <form action="./scripts/send-user.php" method="post">

                <label for="fname">First name</label><br>
                <input type="text" name="fname" default=""><br>

                <label for="lname">Last name</label><br>
                <input type="text" name="lname" default=""><br>

                <label for="sign">Sign</label><br>
                <input type="text" name="sign" required><br><br>

                <input type="submit" value="Submit">

            </form>

    </div>

    <div class="generator-container">
        <form action="./scripts/cert-generate.php" method="post">

            <div class="image-container">
                <p>Your certificate background:</p>
                <img src="cert-background.jpg" alt="Certificate background image">
            </div>

            <label for="font-size">Font size</label>
            <input type="number" name="font-size" default="18"><br>

            <label for="font-angle">Font angle</label>
            <input type="number" name="font-angle" default="0"><br>

            <label for="text-x">X coordinate</label>
            <input type="number" name="text-x" default="0" required><br>
            <label for="text-y">Y coordinate</label>
            <input type="number" name="text-y" default="0" required><br>

            <input type="submit" value="Generate">
        </form>
    </div>

</body>
</html>