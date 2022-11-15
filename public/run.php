<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Flanker</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>

        <?php
        require('../lib/JMeter.php');
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['scenario'])) {
            $scenario = "../upload/" . $_GET['scenario'];

            $optime = date('Ymd-His');
            $instance = new JMeter($scenario, true, $optime);
            $opt = $instance->run();
            print_r($opt);
            echo $optime;
        }
        ?>

    </body>
</html>