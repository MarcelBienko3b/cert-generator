<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


    require('./auth/auth.php');

    $user = AuthUser();

    if (!$user) {
    
        echo '<h1>Authentication error!</h1>
                <a href="./index.html">Back to log in</a>';

        exit();

    }

    if ($user->{'admin'}) {

        echo '
            <ul class="nav-list">
                <a href="./logged.php" class="nav-list-item">
                    <li>Home</li>
                </a>
                <a href="./database.php" class="nav-list-item">
                    <li>Manage Database</li>
                </a>
                <a href="./generator.php" class="nav-list-item">
                    <li>Generate certificates</li>
                </a>
                <a href="./scripts/logout.php" class="nav-list-item">
                    <li>Log out</li>
                </a>
            </ul>
        ';
        exit();

    }

    echo '
        <ul class="nav-list">
            <a href="./logged.php" class="nav-list-item">
                <li>Home</li>
            </a>
            <a href="./user-certificates.php" class="nav-list-item">
                <li>Your certificates</li>
            </a>
        </ul>
    ';

?>