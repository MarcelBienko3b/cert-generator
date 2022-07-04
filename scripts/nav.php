<?php

    require('./auth.php');

    $user = AuthUser();

    if (!$user) {
    
        echo '<h1>Authentication error!</h1>
                <a href="./index.html">Back to login</a>';
        exit();

    }

    if (!$user->{'admin'}) {

        echo '
            <ul class="nav-list">
                <a href="./logged.php" class="nav-list-item">
                    <li>Home</li>
                </a>
                <a href="./user-certificates.php" class="nav-list-item">
                    <li>Your certificates</li>
                </a>
                <a href="./scripts/logout.php" class="nav-list-item">
                    <li>Log out</li>
                </a>
            </ul>
        ';

    } else {

        echo '
            <ul class="nav-list">
                <a href="./logged.php" class="nav-list-item">
                    <li>Home</li>
                </a>
                <a href="./database.php" class="nav-list-item">
                    <li>Manage Database</li>
                </a>
                <a href="./user-certificates.php" class="nav-list-item">
                    <li>Your certificates</li>
                </a>
                <a href="./scripts/logout.php" class="nav-list-item">
                    <li>Log out</li>
                </a>
            </ul>
        ';  

    }

?>