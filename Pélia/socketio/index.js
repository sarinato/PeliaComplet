// var app = require('express')();
// var http = require('http').Server(app);
// var io = require('socket.io')(http);
// var port = process.env.PORT || 1337;

// app.get('/', function(req, res){
//   res.sendFile(__dirname + '/index.html');
// });

// io.on('connection', function(socket){
//   socket.on('chat message', function(msg){
//     io.emit('chat message', msg);
//   });
// });

// http.listen(port, function(){
//   console.log('listening on *:' + port);
// });
var socket = require( 'socket.io' );
var express = require( 'express' );
var http = require( 'http' );

var app = express();
var server = http.createServer( app );

var io = socket.listen( server );

io.sockets.on( 'connection', function( client ) {
    console.log( "New client !" );

    client.on( 'message', function( data ) {
        console.log( 'Message received ' + data.name + ":" + data.message );

        io.sockets.emit( 'message', { name: data.name, message: data.message } );
    });
});

server.listen( 8080 );