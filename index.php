<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate Generator</title>
</head>
<body>

    <div class="table-container">

        <?php
        
            require('conn.php');

            $query = 'select * from users';
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                echo '<form action="set-flag.php" method="post">
                        <table>';
                while ($rows = $result->fetch_all()) {
                    foreach ($rows as $row) {
                        echo '<tr>
                                <td>'.$row[3]." ".$row[1]." ".$row[2].'</td>
                                <td><input type="hidden" name="flag'.$row[1].'" value="0_'.$row[1].'">
                                <input type="checkbox" name="flag'.$row[1].'" value="1_'.$row[1].'"';
                            if ($row[4]) echo 'checked></td>';
                        echo '</tr>';
                    }
                }
                echo '</table>
                    <input type="submit" value="Zatwierdź" class="btn-send">
                </form>';
            }

        ?>

    </div>

</body>
</html>