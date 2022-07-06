<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Management Panel</title>
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
    
        <nav class="nav-container">
            <?php

                require('./scripts/errors.php');

                session_start();
                require_once('./scripts/nav.php');

            ?>
        </nav>

        <?php
        
            if (!$user->{'admin'}) {
                
                echo '<div class="notifications-container">
                        <h3>Notifications</h3>
                        <h6>( Function under construction )</h6>
                    </div>';
            
                echo '<div class="requests-container">
                        <h3>Send request</h3>
                        <h6>( Function under construction )</h6>
                    </div>';

                exit();
            
            } 
        
        ?>

            <div class="generator-container">
                <div class="generator-variables-container">
                    <h2>Generator variables</h2>    

                    <form action="./scripts/cert-generate.php" method="post">
                        
                        <label for="title">Certificate name (cannot contain '_')</label>
                        <input type="text" name="title" id="title" required>

                        <label for="font-size">Font size</label>
                        <input type="number" name="font-size" id="fs" required
                        value="<?php if(isset($_SESSION['font-size'])) echo $_SESSION['font-size'];  ?>">

                        <label for="font-angle">Font angle</label>
                        <input type="number" name="font-angle" id="fa" required
                        value="<?php if(isset($_SESSION['font-angle'])) echo $_SESSION['font-angle'];  ?>">

                        <label for="text-x">X coordinate</label>
                        <input type="number" name="text-x" id="tx" required
                        value="<?php if(isset($_SESSION['text-x'])) echo $_SESSION['text-x'];  ?>">
                        <label for="text-y">Y coordinate</label>
                        <input type="number" name="text-y" id="ty" required
                        value="<?php if(isset($_SESSION['text-y'])) echo $_SESSION['text-y'];  ?>">

                        <label for="color">Text color</label>
                        <input type="color" name="color" id="tc" default="#000000"
                        value="<?php if(isset($_SESSION['color'])) echo $_SESSION['color'];  ?>">

                        <input type="submit" name="action" value="Preview">
                        <input type="submit" name="action" value="Generate">

                    </form>
                
                </div>
                
                <div class="generator-live-container">
                    <h2>Live preview</h2>
                    <img src="./default-certificate.jpg" alt="Live edited certificate">
                </div>
            </div>

    </body>
</html>