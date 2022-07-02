<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Certificate Generator</title>
</head>
<body>

    <div class="table-container">
        <h2>[ Change flag ]</h2>

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
                                <td style="font-weight: bold">Data</td>
                                <td style="font-weight: bold">To generate</td>
                                <td style="font-weight: bold">Remove from database</td>
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

    <div class="user-container">
        <h2>[ Add user ]</h2>

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

    <div class="image-container">
        <h2>[ Your certificate background ]</h2>
        <img src="cert-background.jpg" alt="Certificate background image">
    </div>


    <div class="generator-container">
        <h2>[ Generator ]</h2>
        <form action="./scripts/cert-generate.php" method="post">
    
            <label for="font-size">Font size</label><br>
            <input type="number" name="font-size" require><br><br>

            <label for="font-angle">Font angle</label><br>
            <input type="number" name="font-angle" required><br><br>

            <label for="text-x">X coordinate</label><br>
            <input type="number" name="text-x" required><br><br>
            <label for="text-y">Y coordinate</label><br>
            <input type="number" name="text-y" required><br><br>

            <label for="color">Text color</label><br>
            <input type="color" name="color" default="#000000"><br><br>

            <input type="submit" value="Generate">

        </form>
    </div>

</body>
</html>