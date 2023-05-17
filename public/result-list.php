<?php
require('../lib/Common.php');

$root_directory = '/var/www/html';
$directories = Common::getDirectories($root_directory);

foreach ($directories as $directory) {
    echo $directory . "<br>";
}