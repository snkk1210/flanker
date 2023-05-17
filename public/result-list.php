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
            $request_host = $_SERVER['SERVER_ADDR'];

            $root_directory = '/var/www/html';
            $directories = Common::getDirectories($root_directory);

            foreach ($directories as $directory) {
                $result_dir = str_replace($root_directory, '', $directory);
                $result_url = "http://" . $request_host . "/" . $result_dir;

                $slash_count = substr_count($result_dir, '/');

                if ($slash_count >= 2) {
                    echo '<a href="' . $result_url . '" rel="result">' . $result_dir . '</a>' . "<br>";
                } else {
                    echo '<strong><a href="' . $result_url . '" rel="result">' . str_replace('/', '# ', $result_dir) . '</a>' . "<br></strong>";
                }
            }
        ?>
    </body>
</html>