<?php

    if (!function_exists('checkIfEmailInDB')) {
        function checkIfEmailInDB($conn, $query) {

            $result = mysqli_fetch_array(mysqli_query($conn, $query), MYSQLI_ASSOC);

            if (!$result) return false;
            return $result;

        }
    }

    if (!function_exists('checkPass')) {
        function checkPass($fromDB, $fromPOST) {

            if ($fromDB != $fromPOST) { return false; }
            return true;

        }
    }

    if (!function_exists('isAdmin')) {
        function isAdmin($conn, $email) {

            $query = 'select admin from users
                        where email = '.$email.';';

            $result = mysqli_fetch_array(mysqli_query($conn, $query), MYSQLI_ASSOC);

            if (!$result['admin']) return false;
            return true;

        }
    }

?>