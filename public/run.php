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

            $today = date('Ymd');
            $optime = date('Ymd-His');
            $logdir = "/var/www/html/$today";
            if (!is_dir($logdir)){mkdir("$logdir", 0700);};

            $instance = new JMeter($scenario, true, $optime);
            $opt = $instance->run($today, $optime, $logdir);

            $result_url = "http://" . $_SERVER[ "SERVER_ADDR" ] .  "/" . $today . "/" . $optime;
        }
        ?>
        <textarea readonly><?php print_r($opt) ?></textarea>
        <input type="button" value="Show Results" id="showResults">

        <script>
            let showResults = document.getElementById('showResults');
            showResults.addEventListener('click', () => {
                open('<?php echo $result_url; ?>');
            });
        </script>

    </body>
</html>