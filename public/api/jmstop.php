<?php
require('../../lib/JMeter.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $res = JMeter::stopJMeter();
    echo $res;
}