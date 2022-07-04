<?php

    $newUser = new stdClass;
    $newUser->key = $_POST['key'];
    $newUser->fname = $_POST['fname'];
    $newUser->lname = $_POST['lname'];
    $newUser->email = $_POST['email'];
    $newUser->password = md5($_POST['password']);

    $newUser->admin = 0; //default
    $newUser->flag = 0; //default

    $checkEmailQuery = 'select 
                users.key,
                users.email,
                users.password,
                users.admin
                from users
                where email = "'.$user->{'email'}.'";';

    require ('./conn.php');
    require ('./errors.php');
    require ('./functions.php');

    if (checkIfEmailInDB($conn, $checkEmailQuery)) {

        echo '<h1>Your email already exists in database!</h1>
                <a href="../index.html">Back to login</a>';

    }

    $insertUserQuery = 'insert
                        into users(users.key,
                                users.lname,
                                users.fname,
                                users.email,
                                users.password,
                                users.admin,
                                users.flag)
                        values(?, ?, ?, ?, ?, ?, ?)';

    $stmt = $conn->prepare($insertUserQuery);
    $stmt->bind_param("sssssii",
                        $newUser->{'key'},
                        $newUser->{'lname'},
                        $newUser->{'fname'},
                        $newUser->{'email'},
                        $newUser->{'password'},
                        $newUser->{'admin'},
                        $newUser->{'flag'});
    
    $excaval = $stmt->execute();
    $stmt->close();
    $conn->close();

    echo '<h1>Successfully signed up!</h1>
            <a href="../index.html">Log in</a>'

?>