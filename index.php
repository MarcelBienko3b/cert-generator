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
        <h2>Zmien flage</h2>

        <?php

            session_start();
        
            require('conn.php');

            $query = 'select * from users';
            $result = $conn->query($query);

            $_SESSION['users_count'] = 0;

            if ($result->num_rows > 0) {
                echo '<form action="set-flag.php" method="post">
                        <table>';
                while ($rows = $result->fetch_all()) {
                    foreach ($rows as $row) {
                        $_SESSION['users_count']++;
                        echo '<tr>
                                <td>'.$row[3]." ".$row[1]." ".$row[2].'</td>
                                <td><input type="hidden" name="flag'.$row[0].'" value="0_'.$row[0].'">
                                <input type="checkbox" name="flag'.$row[0].'" value="1_'.$row[0].'"';
                            if ($row[4]) echo 'checked';
                            echo '></td>';
                        echo '</tr>';
                    }
                }
                echo    '</table><br>
                        <input type="submit" value="Zatwierdź" class="btn-send">
                    </form>';
            }

        ?>

    </div>

    <div class="table-container">
        <h2>Dodaj uzytkownika</h2>

            <form action="send-user.php" method="post">

                <label for="fname">Imie</label><br>
                <input type="text" name="fname"><br>

                <label for="lname">Nazwisko</label><br>
                <input type="text" name="lname"><br>

                <label for="sign">Znak</label><br>
                <input type="text" name="sign"><br><br>

                <input type="submit" value="Zatwierdź">

            </form>

    </div>

    <div class="generator-container">
        <form action="cert-generate.php" method="post">
            <input type="submit" value="Generuj certyfikaty">
        </form>
    </div>

</body>
</html>