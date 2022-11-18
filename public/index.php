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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (is_uploaded_file($_FILES['scenariofile']['tmp_name']) && pathinfo($_FILES['scenariofile']['name'], PATHINFO_EXTENSION) == "jmx") {
                $uploaddir = '../upload/';
                $uploadfile = $uploaddir . basename($_FILES['scenariofile']['name']) . ":" . date('Ymd-His');
                if (!move_uploaded_file($_FILES['scenariofile']['tmp_name'], $uploadfile)) {
                    echo "File upload has failed.\n";
                }
            } else {
                echo "Upload File must be jmx.\n";
            }
        }
        ?>

        <div>
            <form enctype="multipart/form-data" action="" method="POST">
                <input name="scenariofile" type="file" accept=".jmx" />
                <input type="submit" value="upload" />
            </form>
        </div>

        <div>
            <form action="run.php" method="GET">
                <td>
                    <select name="scenario" id="" class="">
                        <?php
                        $scenariolists = JMeter::getScenarioFileList();
                        foreach ( $scenariolists as $scenariolist ) {
                            echo '<option value="', $scenariolist, '">', $scenariolist, '</option>';
                        }
                        ?>
                    </select>
                    <input type="submit" value="run" onclick="loading()" id="run" />
                </td>
            </form>
        </div>
        <div class="spinner" id="spinner"></div>
        <script src="js/loading.js"></script>
    </body>
</html>