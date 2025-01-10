var express =   require('express'),
    http =      require('http'),
    server =    http.createServer(app);
 
var app = express();

 
const io = require('socket.io').listen(3000);
const redis = require('redis');
const redisClient = redis.createClient();
io.sockets.on('connection', function (socket) {
    socket.on('subscribe', function(d) {
        redisClient.subscribe(d.channel);
        console.log('Connected to user '+d.channel);
    });
});

redisClient.on('message', function(channel, message) {
io.sockets.emit(channel, message);
});