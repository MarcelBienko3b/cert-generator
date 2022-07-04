<?php

    session_start();
    require('fpdf.php');

    $font_size = intval($_POST['font-size']);
    $font_angle = intval($_POST['font-angle']);
    $text_x_offset = intval($_POST['text-x']);
    $text_y_offset = intval($_POST['text-y']);
    $text_color = $_POST['color'];
    $cert_title = $_POST['title'];

    $_SESSION['font-size'] = $font_size;
    $_SESSION['font-angle'] = $font_angle;
    $_SESSION['text-x'] = $text_x_offset;
    $_SESSION['text-y'] = $text_y_offset;
    $_SESSION['color'] = $text_color;

    list($r, $g, $b) = sscanf($text_color, "#%02x%02x%02x");


    if ($_POST['action'] == 'Generate') {
        require('conn.php');

        $query = "select users.id, users.fname, users.lname, users.key, users.flag from users";
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

                    $text = $row['fname']." ".$row['lname']." [".$row['key']."]";

                    imagettftext($image,
                                $font_size,
                                $font_angle,
                                $text_x_offset,
                                $text_y_offset,
                                $color,
                                $font,
                                $text);

                    imagejpeg($image, "../Certificates/".$cert_title."_".$row['key'].".jpg");

                    $pdf = new FPDF('L', 'in', [11.7, 8.27]);
                    $pdf->AddPage();
                    $pdf->Image("../Certificates/".$cert_title."_".$row['key'].".jpg", 0, 0, 11.7, 8.27);
                    $pdf->Output("../Certificates/".$cert_title."_".$row['key'].".pdf", "F");

                    imagedestroy($image);
                    unlink("../Certificates/".$cert_title."_".$row['key'].".jpg");

                }

            }
        }

        $conn->close();

        header("Location: ../logged.php");
        exit();

    }

    $font = "../font.ttf";
    $image = imagecreatefromjpeg("../cert-background.jpg");
                    
    $color = imagecolorallocate($image,
                                $r,
                                $g,
                                $b);

    $name = "Jan Kowalski [ AB0-CDE ]";

    imagettftext($image,
                $font_size,
                $font_angle,
                $text_x_offset,
                $text_y_offset,
                $color,
                $font,
                $name);

    imagejpeg($image, "../default-certificate.jpg");
    imagedestroy($image);

    header("Location: ../logged.php");
    exit();

?>