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

        <div>
            <form enctype="multipart/form-data" action="" method="POST">
                <?php
                require('../lib/JMeter.php');
                $remote_hosts_csv = JMeter::getRemoteHostRaw();
                ?>
                <textarea name="remote_hosts"><?php echo $remote_hosts_csv ?></textarea>
                <input type="submit" value="update" />
            </form>
        </div>

    </body>
</html>