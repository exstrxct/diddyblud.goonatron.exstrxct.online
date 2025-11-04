<?php

$posts = 0;
$rootbase = "/var/task/user/api/"

?>
<!DOCTYPE html>
<html>
    <?php readfile($rootbase . "templates/standardhead.html") ?>

    <body>
        <div class="layout">
            <?php readfile($rootbase . "templates/topbar.html") ?>

            <div class="container">
                <div>
                   <img alt="Mascot" src="/src/files/img/Mascot.png">
                </div>
                <div>
                    <h2>Welcome to Broom34</h2>
                    <p>Serving <?= htmlspecialchars($posts) ?> posts!</p>
                </div>
            </div>
        </div>
    </body>
</html>