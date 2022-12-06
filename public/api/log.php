<?php

$opt = file_get_contents(__DIR__ . '/../../log/jmeter.log');
$opt = str_replace(["\r\n", "\r", "\n"], '&#13;', $opt);
$json = ['output' => $opt];
echo json_encode($json);