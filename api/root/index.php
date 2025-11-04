<?php

$posts = 0;

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Broom34</title>
        <link rel="stylesheet" href="/src/files/css/stylelink.css">
    </head>

    <body>
        <div class="layout">
            <?php include "/src/files/templates/topbar.php" ?>

            <div class="container">
                <div>
                    <img alt="Mascot" src="/src/files/img/Mascot.png">
                </div>
                <div>
                    <h2>Welcome to Broom34</h2>
                    <?php echo "Serving ". $posts ." posts!" ?>
                </div>
            </div>
        </div>
    </body>
</html>