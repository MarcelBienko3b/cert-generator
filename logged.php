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

                session_start();
                require_once('./scripts/nav.php');

            ?>
        </nav>

        <?php 
        
            if (!$user->{'admin'}) {
            
                echo '<h3>Send request</h3>
                    <h6>( Function under construction )</h6>';

                echo '<h3>Your requests status and newsfeed</h3>
                    <h6>( Function under construction )</h6>';
                
                exit();
            
            } 
        
        ?>

            <div class="generator-container">
                <div class="generator-variables-container">
                    
                    <form action="./scripts/cert-generate.php" method="post">
                        
                        <label for="title">Certificate name (cannot contain '_')</label><br>
                        <input type="text" name="title" id="title" required><br><br>

                        <label for="font-size">Font size</label><br>
                        <input type="number" name="font-size" id="fs" required
                        value="<?php if(isset($_SESSION['font-size'])) echo $_SESSION['font-size'];  ?>"><br><br>

                        <label for="font-angle">Font angle</label><br>
                        <input type="number" name="font-angle" id="fa" required
                        value="<?php if(isset($_SESSION['font-angle'])) echo $_SESSION['font-angle'];  ?>"><br><br>

                        <label for="text-x">X coordinate</label><br>
                        <input type="number" name="text-x" id="tx" required
                        value="<?php if(isset($_SESSION['text-x'])) echo $_SESSION['text-x'];  ?>"><br><br>
                        <label for="text-y">Y coordinate</label><br>
                        <input type="number" name="text-y" id="ty" required
                        value="<?php if(isset($_SESSION['text-y'])) echo $_SESSION['text-y'];  ?>"><br><br>

                        <label for="color">Text color</label><br>
                        <input type="color" name="color" id="tc" default="#000000"
                        value="<?php if(isset($_SESSION['color'])) echo $_SESSION['color'];  ?>"><br><br>

                        <input type="submit" name="action" value="Preview">
                        <input type="submit" name="action" value="Generate">

                    </form>
                
                </div>
                
                <div class="generator-live-container">
                    <img src="./default-certificate.jpg" alt="Live edited certificate">
                </div>
            </div>

    </body>
</html>