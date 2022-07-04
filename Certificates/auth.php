<?php

    if (!function_exists('AuthUser')) {
        function AuthUser() {

            $user = json_decode($_COOKIE['user']);
            
            require('../scripts/conn.php');
            require('../scripts/functions.php');

            if (!isset($user->{'email'}) ||
                !isset($user->{'admin'}) ||
                !isset($user->{'key'}) ||
                !isset($user->{'password'})) {return false;}

            $query = 'select
                        users.key,
                        users.email,
                        users.password,
                        users.admin
                        from users
                        where email = "'.$user->{'email'}.'";';

            $checkEmail = checkIfEmailInDB($conn, $query);

            if (!$checkEmail) { return false; }
            if (!checkPass($checkEmail['password'], $user->{'password'})) { return false; }

            setcookie('user', json_encode($checkEmail), 0, '/');
            return ($user = json_decode($_COOKIE['user']));

        }
    }

?>