<?php

require('./phpMQTT.php');

$server = '53e69abd7b384d66a432943bf26f295f.s2.eu.hivemq.cloud';     // change if necessary
$port = 8883;                     // change if necessary
$username = 'gbdigital';                   // set your username
$password = '##Gbds9159##';                   // set your password
$client_id = 'phpMQTT-publisher'; // make sure this is unique for connecting to sever - you could use uniqid()
$cafile = 'isrgrootx1.pem'; // HiveMQ Cloud CA

$mqtt = new Bluerhinos\phpMQTT($server, $port, $client_id, $cafile);

echo "Iniciando...</br>";

echo "Verificando se está conectado... ";

if(!$mqtt->connect(true, NULL, $username, $password)) {
	echo "Erro de conexão!";
    exit(1);
}

echo "OK!<br><br>";

$mqtt->debug = true;
$topics['teste/teste'] = array('qos' => 1, 'function' => 'procMsg');
$mqtt->subscribe($topics, 1);

while($mqtt->proc()) {

}

$mqtt->close();

function procMsg($topic, $msg){
		echo 'Msg Recieved: ' . date('r') . "\n";
		echo "Topic: {$topic}\n\n";
		echo "\t$msg\n\n";
}