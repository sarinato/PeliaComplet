<?php

/**
 * Description of server
 *
 * @author Amir <amirsanni@gmail.com>
 * @date 23-Dec-2016
 */

require '../vendor/autoload.php';

use Amir\Comm;

//set an array of origins allowed to connect to this server
$allowed_origins = ['localhost', '127.0.0.1', '1410inc.xyz', 'www.1410inc.xyz'];

// Run the server application through the WebSocket protocol on port 8080
$app = new Ratchet\App('localhost', 1337, '127.0.0.1');//App(hostname, port, 'whoCanConnectIP', '')

//create socket routes
//route(uri, classInstance, arrOfAllowedOrigins)
$app->route('/comm', new Comm, $allowed_origins);

//run websocket
$app->run();
