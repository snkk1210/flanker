<?php
require('../../lib/Common.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['result'])) {
    $dir = "/var/www/html/" . $_GET['result'];
    $zip = "/var/www/html/" . $_GET['result'] . ".zip";

    Common::archiveDir($dir, $zip);

    mb_http_output("pass");
    header("Content-Type: application/zip");
    header("Content-Transfer-Encoding: Binary");
    header("Content-Length: ".filesize($zip));
    header('Content-Disposition: attachment; filename*=UTF-8\'\'' . $zip);
    ob_end_clean();
    readfile($zip);

    unlink($zip);
}