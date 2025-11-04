<?php

$posts = 0;
$rootbase = "/var/task/user/api/"
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Broom34</title>
        <?php echo `<link rel="stylesheet" href="`. $rootbase .`src/files/css/stylelink.css">`?>
    </head>

    <body>
        <div class="layout">
            <?php readfile($rootbase . "src/templates/topbar.html") ?>

            <div class="container">
                <div>
                    <?php echo `<img alt="Mascot" src=`. $rootbase . `"/src/files/img/Mascot.png"` ?>
                </div>
                <div>
                    <h2>Welcome to Broom34</h2>
                    <?php echo "Serving ". $posts ." posts!" ?>
                </div>
            </div>
        </div>
    </body>
</html>