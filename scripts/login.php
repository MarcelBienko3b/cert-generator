<?php

    $user = new stdClass;
    $user->email = $_POST['email'];
    $user->password = md5($_POST['password']);

    require('./conn.php');
    require('./functions.php');

    $query = 'select 
                users.key,
                users.email,
                users.password,
                users.admin
                from users
                where email = "'.$user->{'email'}.'";';

    $checkEmail = checkIfEmailInDB($conn, $query);

    if (!$checkEmail) {
        header('Location: ../index.html');
        exit();
    }

    if (!checkPass($checkEmail['password'], $user->{'password'})) {
        header('Location: ../index.html');
        exit();
    }
    
    setcookie('user', json_encode($checkEmail), 0, '/');
    header('Location: ../logged.php');

?>