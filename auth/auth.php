<?php

    function AuthUser($email, $password) {

        $isAdmin = false;

        $user = [$email, $password, $isAdmin];

        return $user;

    }

?>