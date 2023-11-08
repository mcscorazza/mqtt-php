var mqtt = require('mqtt')

var options = {
    host: '53e69abd7b384d66a432943bf26f295f.s2.eu.hivemq.cloud',
    port: 8883,
    protocol: 'mqtts',
    username: 'gbdigital',
    password: '##Gbds9159##'
}

var client = mqtt.connect(options);

client.on('connect', function () {
    console.log('Connected');
});

client.on('error', function (error) {
    console.log(error);
});

client.on('message', function (topic, message) {
    console.log('Received message:', topic, message.toString());
});

client.subscribe('teste/teste');

client.publish('teste/teste', 'Hello');