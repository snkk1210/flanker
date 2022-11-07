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
        require('../lib/jmeter.php');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (is_uploaded_file($_FILES['scenariofile']['tmp_name'])) {
                $uploaddir = '../upload/';
                $uploadfile = $uploaddir . basename($_FILES['scenariofile']['name']);
                if (!move_uploaded_file($_FILES['scenariofile']['tmp_name'], $uploadfile)) {
                    echo "File upload has failed.\n";
                }
            } else {
                //
            }
        }
        ?>

        <div>;
            <form enctype="multipart/form-data" action="" method="POST">;
                <input name="scenariofile" type="file" />;
                <input type="submit" value="upload" />";
            </form>;
        </div>;   

    </body>
</html>