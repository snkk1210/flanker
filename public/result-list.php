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

            foreach ($directories as $key => $directory) {
                $result_dir = str_replace($root_directory, '', $directory);
                $result_url = "http://" . $request_host . "/" . $result_dir;

                $pattern = '/\/(\d+)\/(\d+):/';
                preg_match($pattern, $result_dir, $matches);
                $timestamp = date('H:i:s', strtotime($matches[2]));

                $slash_count = substr_count($result_dir, '/');

                if ($slash_count >= 2) {
                    echo '<tr><td>' . $timestamp . '</td><td><a href="' . $result_url . '" target="_blank" rel="noopener noreferrer">' . $result_dir . '</a></td></tr>';
                } else {
                    if ($key != 0) {
                        echo "</table>";
                        echo "<br>";
                    }
                    echo '<strong><a href="' . $result_url . '" target="_blank" rel="noopener noreferrer">' . str_replace('/', '# ', $result_dir) . '</a></strong>';
                    echo "<table border='1'>";
                }
            }
        ?>
    </body>
</html>