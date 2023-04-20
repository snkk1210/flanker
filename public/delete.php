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
        require('../lib/JMeter.php');

        JMeter::prohibitReload();
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['scenario'])) {
            $scenario = "../upload/" . $_GET['scenario'];
            $instance = new JMeter($scenario, true);
            $instance->delete();
            header('Location: /');
        }
        ?>
    </body>
</html>