<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Flanker</title>
        <link rel="stylesheet" href="style.css?<?php echo date('YmdHis'); ?>" type="text/css">
    </head>
    <body>
        <div>
            <h1 class="title"><a href="/" rel="home">Flanker</a></h1>
        </div>
        <?php
            require('../lib/Common.php');

            $root_directory = '/var/www/html';
            $directories = Common::getDirectories($root_directory);

            foreach ($directories as $directory) {
                echo str_replace($root_directory, '', $directory) . "<br>";
            }
        ?>
    </body>
</html>