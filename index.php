<?php

require('./vendor/bluerhinos/phpmqtt/phpMQTT.php');

$server = '53e69abd7b384d66a432943bf26f295f.s2.eu.hivemq.cloud';     // change if necessary
$port = 8883;                     // change if necessary
$username = 'gb_digital';                   // set your username
$password = 'Gbds9159';                   // set your password
$client_id = 'phpMQTT-subscribe-msg';

echo "Iniciando MQTT...";

$mqtt = new Bluerhinos\phpMQTT($server, $port, $client_id);
if(!$mqtt->connect(true, NULL, $username, $password)) {
    echo "ERRO!";
	exit(1);
}

echo $mqtt->subscribeAndWaitForMessage('teste/teste', 1);

$mqtt->close();