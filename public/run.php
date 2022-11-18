<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Flanker</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>
        <div>
            <h1 class="title"><a href="/" rel="home">Flanker</a></h1>
        </div>

        <?php
        require('../lib/JMeter.php');

        session_start();
        if(isset($_SESSION['loadflag'])){
            header('Location: /');
            session_unset();
            exit;
          }else{
            $_SESSION['loadflag'] = "true";
          }

        if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['scenario'])) {
            $scenario = "../upload/" . $_GET['scenario'];

            $request_referer = parse_url($_SERVER['HTTP_REFERER']);
            $request_host = $request_referer["host"];
            

            $today = date('Ymd');
            $optime = date('His') . ":" . $_GET['scenario'];
            $logdir = "/var/www/html/$today";
            if (!is_dir($logdir)){mkdir("$logdir", 0700);};

            $instance = new JMeter($scenario, true);
            $opt = $instance->run($today, $optime, $logdir);

            $result_url = "http://" . $request_host .  "/" . $today . "/" . $optime;
        }
        ?>
        <textarea class="results" readonly><?php print_r($opt) ?></textarea>
        <input type="button" value="Show Results" id="showResults">

        <script>
            let showResults = document.getElementById('showResults');
            showResults.addEventListener('click', () => {
                open('<?php echo $result_url; ?>');
            });
        </script>
        <script src="js/results.js"></script>
    </body>
</html>