<?php

    $font_size = intval($_POST['font-size']);
    $font_angle = intval($_POST['font-angle']);
    $text_x_offset = intval($_POST['text-x']);
    $text_y_offset = intval($_POST['text-y']);
    $text_color = $_POST['color'];

    list($r, $g, $b) = sscanf($text_color, "#%02x%02x%02x");

    require('conn.php');

    $query = "select users.id, users.fname, users.lname, users.sign, users.flag from users";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            if ($row['flag'] == '1') {
                
                $font = "../font.ttf";
                $image = imagecreatefromjpeg("../cert-background.jpg");
                
                $color = imagecolorallocate($image,
                                            $r,
                                            $g,
                                            $b);

                $name = $row['fname']." ".$row['lname']." [".$row['sign']."]";

                imagettftext($image,
                            $font_size,
                            $font_angle,
                            $text_x_offset,
                            $text_y_offset,
                            $color,
                            $font,
                            $name);

                imagejpeg($image, "../Certificates/".$row['lname'].$row['fname'].".jpg");
                imagedestroy($image);

            } else echo "Not generated for ".$row['lname']." ".$row['fname']." ".$row['sign'].'<br>';

        }
    }

    $conn->close();

    header("Location: ../index.php");
    exit();

?>