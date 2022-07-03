<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $user = new stdClass;
    $user->email = $_POST['email'];
    $user->password = md5($_POST['password']);

    require('./conn.php');
    require('./functions.php');

    $query = 'select key, email, password 
                    from users
                    where email = '.$user->{'email'}.';';

    

    if (checkIfEmailInDB($conn, $query)) echo 'jest';
    echo 'nie ma';

    //setcookie('user', json_encode($user), 0, '/');

    //header('Location: ../logged.php');

?>